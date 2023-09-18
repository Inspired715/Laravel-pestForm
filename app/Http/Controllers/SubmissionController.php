<?php

namespace App\Http\Controllers;

use App\Mail\NewSubmission;
use App\Models\{
    Form,
    FormLog,
    Submission,
};
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

class SubmissionController extends Controller
{
    public function submit(Request $request, $slug)
    {
        try {
            $form = Form::where('slug', $slug)->firstOrFail();
            $owner = $form->owner()->firstOrFail();

            $activeForms = $owner->forms()
                ->orderBy('created_at', 'desc')
                ->take($owner->max_forms())
                ->pluck('slug');

            if (!$activeForms->contains($slug)) {
                abort(403, 'Form is not active.');
            }


            $uploadedFiles = $request->file();
            if ($uploadedFiles) {

                if ($form->file_upload || $form->s3_file_upload) {
                    $fileKeys = array_keys($uploadedFiles);
                    if ($form->file_upload) {
                        $allowedMimes   = $form->local_file['allowed_mimes'];
                        $maxUploadSize = $form->local_file['max_upload_size'];

                    } elseif ($form->s3_file_upload){
                        $allowedMimes   = $form->s3['s3_allowed_mimes'];
                        $maxUploadSize = $form->s3['s3_max_upload_size'];
                    }

                    foreach ($fileKeys as $fileKey) {
                        $checkSingleorMultiple = $uploadedFiles[$fileKey];
                        if ( ! is_array($checkSingleorMultiple) && $checkSingleorMultiple->getClientOriginalName()) {
                            $rules = [
                                "$fileKey" => "required|mimes:" . preg_replace('/[!*\s]+$/', '', $allowedMimes) . "|max:" . $maxUploadSize, // Example MIME types
                            ];
                        } else {
                            $rules = [
                                "$fileKey.*" => "required|mimes:" . preg_replace('/[!*\s]+$/', '', $allowedMimes) . "|max:" . $maxUploadSize, // Example MIME types
                            ];
                        }
                    }

                    $validator = Validator::make($request->all(), $rules);

                    if ($validator->fails()) {

                        if ($form->submission_failed == 'redirect2') {
                            return redirect()->to($form->failed_redirect_url);
                        }

                        return redirect(route('form.error',['slug'=>$form->slug]))->withErrors($validator);
                    }

                } else {
                    $errors = new MessageBag();
                    $errors->add('file_upload', 'File Upload is not allowed in this form');

                    if ($form->submission_failed == 'redirect2') {
                        return redirect()->to($form->failed_redirect_url);
                    }

                    return redirect(route('form.error',['slug'=>$form->slug]))->withErrors($errors);
                }
            }


            $request->validate([
                'form_name' => 'string|nullable',
            ]);

            // Prepare data for submission
            $data = collect($request->except('form_name'))
                ->filter(fn($value) => is_string($value)) // Filter out non-string values
                ->map(function ($value, $key) {
                    return [
                        'name' => $key,
                        'value' => $value,
                        'type' => 'text',
                    ];
                })
                ->all();

            $submission = Submission::create([
                'form_id' => $form->id,
                'name' => $request->input('form_name'),
                'data' => $data,
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);

            if($uploadedFiles) {
                $attachments=[];
                foreach ($uploadedFiles as $fileInputName => $file) {

                    if ( ! is_array($file) && $file->getClientOriginalName()) {
                        $attachments[] = $this->uploadFile($file, $form, $submission, $slug);
                    } else {
                        foreach ($file as $fileList) {
                            $attachments[] = $this->uploadFile($fileList, $form, $submission, $slug);
                        }
                    }
                }
                $submission->update(['attachments'=>$attachments]);
            }

            foreach ($form->forward_to as $recipient) {
                Mail::to($recipient)
                    ->send(new NewSubmission($submission));
            }

            FormLog::create([
                'form_id' => $form->id,
                'last_checkin' => Carbon::now()
            ]);

            if ($form->submission_succeeded == 'redirect') {
                return redirect()->to($form->success_redirect_url);
            }

            return redirect()->route('form.thank-you', $slug);

            // return view('forms.form-submission-success', compact('form', 'route'));

        } catch (\Exception $exception) {

             // dd($exception->getMessage());

            if ($form->submission_failed == 'redirect2') {
                return redirect()->to($form->failed_redirect_url);
            }

            return redirect(route('form.error',['slug'=>$form->slug]))->withErrors($exception->getMessage());
        }
    }

    protected function uploadFile($file, $form, $submission, $slug)
    {
        $storageDisk = $baseUrl = "";

        if ($form->file_upload) {
            $storageDisk = 'public';
            $baseUrl     =  config('app.url');

        } elseif ($form->s3_file_upload) {
            $storageDisk = 's3';
            $baseUrl     = 'https://' . $form->s3['bucket'] . '.s3.amazonaws.com';
        }

        $originalName = $file->getClientOriginalName();
        $hashName = $file->hashName();

        $basePath = "";
        $filePath = "/forms/$slug/submissions/$submission->id/$originalName";

        if ($form->file_upload) {

            $disk = Storage::disk('public');
            $basePath = "storage";

        } elseif ($form->s3_file_upload) {

            $filePath = $form->s3['directory'] . $filePath;
            $accessKey = $form->s3['access_key_id'];
            $secretKey = $form->s3['access_secret'];
            $region = $form->s3['region'];
            $bucket = $form->s3['bucket'];

            $disk = Storage::createS3Driver([
                'driver' => 's3',
                'key' => "$accessKey",
                'secret' => "$secretKey",
                'region' => "$region",
                'bucket' => "$bucket"
            ]);
        }

        $disk->put($filePath, file_get_contents($file), "public");

        return [
            'directory' => $storageDisk,
            'base_url'  => $baseUrl,
            'file_path' => $basePath."/".str_replace(':/','://', trim(preg_replace('/\/+/', '/', $filePath), '/')),
            'file_name' => $originalName,
            'hash_name' => $hashName,
        ];
    }
}
