<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class FormController extends Controller
{

    /* Pages */

    public function index(Request $request)
    {
        /**
         * @var \App\Models\User $user
         */
        $user = auth()->user();

        $forms = $user->forms()->latest()->take($user->max_forms())->get();

        return view('forms.index', compact('forms'));
    }

    public function inbox(Request $request, string $slug)
    {

        /**
         * @var \App\Models\User $user
         */
        $user = auth()->user();

        $form = $user->forms()->where('slug', $slug)->firstOrFail();

        $submissions = $form->submissions()->where([
            ['spam', false],
            ['archived', false],
        ])->latest()
            ->get();

        return view('forms.id.index', compact('form', 'submissions'));
    }

    public function archive(Request $request, string $slug)
    {
        /**
         * @var \App\Models\User $user
         */
        $user = auth()->user();

        $form = $user->forms()->where('slug', $slug)->firstOrFail();

        $submissions = $form->submissions()
            ->where([
                ['archived', true],
                ['spam', false],
            ])->get()
            ->reverse()
            ->values();

        return view('forms.id.archive', compact('form', 'submissions'));
    }

    public function spam(Request $request, string $slug)
    {
        /**
         * @var \App\Models\User $user
         */
        $user = auth()->user();

        $form = $user->forms()->where('slug', $slug)->firstOrFail();

        $submissions = $form->submissions()
            ->where('spam', true)
            ->get()
            ->reverse()
            ->values();

        return view('forms.id.spam', compact('form', 'submissions'));
    }

    public function configuration(Request $request, string $slug)
    {
        /**
         * @var \App\Models\User $user
         */
        $user = auth()->user();

        $form = $user->forms()->where('slug', $slug)->firstOrFail();

        return view('forms.id.configuration', compact('form'));
    }

    public function analytics(Request $request, string $slug)
    {
        /**
         * @var \App\Models\User $user
         */
        $user = auth()->user();

        $form = $user->forms()->where('slug', $slug)->firstOrFail();

        return view('forms.id.analytics', compact('form'));
    }

    public function logs(Request $request, string $slug)
    {
        /**
         * @var \App\Models\User $user
         */
        $user = auth()->user();

        $form = $user->forms()->where('slug', $slug)->firstOrFail();

        return view('forms.id.logs', compact('form'));
    }

    /* Actions */

    public function delete(Request $request, string $slug)
    {
        /**
         * @var \App\Models\User $user
         */
        $user = auth()->user();

        $form = $user->forms()->where('slug', $slug)->firstOrFail();

        $form->delete();

        return redirect()->route('forms.index');
    }

    public function updateS3Config(Request $request, string $slug)
    {
        /**
         * @var \App\Models\User $user
         */
        $user = auth()->user();

        $form = $user->forms()->where('slug', $slug)->firstOrFail();

        if (!$request->has('enabled')) {
            $form->update([
                's3' => null,
            ]);

            Session::flash('S3Updated');
            return redirect()->back();
        }

        $s3Config = $request->validate([
            'key' => ['required', 'string'],
            'secret' => ['required', 'string'],
            'region' => ['required', 'string'],
            'bucket' => ['required', 'string'],
            'path' => ['nullable', 'string'],
            'mimes' => ['nullable', 'string'],
            'max_size' => ['nullable', 'integer', 'min:1'],
        ]);

        $disk = Storage::build([
            ...$s3Config,
            'driver' => 's3',
        ]);

        if (!$disk->put('pestform', 'Verification Success')) {
            return redirect()->back()->withErrors(['s3' => 'Could not write to S3'])->withInput();
        }

        $form->update([
            's3' => $s3Config,
        ]);

        Session::flash('S3Updated');
        return redirect()->back();
    }

    public function previewCustomBrandedThankYou(string $slug)
    {
        /**
         * @var \App\Models\User $user
         */
        $user = auth()->user();

        $form = $user->forms()->where('slug', $slug)->firstOrFail();

        return view('forms.id.preview-thank-you')->with([
            'form' => $form,
        ]);
    }

    public function thankYou(string $slug)
    {

        $form = Form::where('slug', $slug)->firstOrFail();

        return view('default.thank-you')->with([
            'form' => $form,
        ]);
    }

    public function error(string $slug)
    {
        $form = Form::where('slug', $slug)->firstOrFail();
        return view('default.error')->with([
            'form' => $form,
        ]);
    }
}
