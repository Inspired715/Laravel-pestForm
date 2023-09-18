<?php

namespace App\Http\Livewire\FormConfiguration;

use Livewire\Component;
use App\Models\Form;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class FileUpload extends Component
{
    public Form $form;
    public bool $updated = false;

    public $file_upload;
    public $s3_file_upload;
    public $access_key_id;
    public $access_secret;
    public $region;
    public $bucket;
    public $directory;

    // local
    public $max_upload_size = 5000;
    public $allowed_mimes = "pdf,png,jpeg";

    // s3
    public $s3_max_upload_size;
    public $s3_allowed_mimes;

    public function mount($form)
    {
        $this->form = $form;
        if ($this->form) {
            $this->file_upload = $this->form->file_upload;

            if($this->form->file_upload){
                $localFile = $this->form->local_file;
            }

            if($this->form->s3_file_upload){
                $s3 = $this->form->s3;
                $this->s3_file_upload = $this->form->s3_file_upload;
                $this->access_key_id = $s3['access_key_id'];
                $this->access_secret = $s3['access_secret'];
                $this->region = $s3['region'];
                $this->bucket = $s3['bucket'];
                $this->directory = $s3['directory'];
                $this->s3_allowed_mimes = $s3['s3_allowed_mimes'];
                $this->s3_max_upload_size = $s3['s3_max_upload_size'];
            }

        }
    }
    public function render()
    {
        return view('livewire.form-configuration.file-upload');
    }

    public function update()
    {
        $this->file_upload = $this->file_upload == true ? 1 : 0;
        $this->s3_file_upload = $this->s3_file_upload == true ? 1 : 0;

        $validated = $this->validate([
            'file_upload' => 'required|in:0,1',
            's3_file_upload' => 'required|in:0,1',
            'access_key_id' => [
                'required_if:s3_file_upload,1',
                'nullable',
            ],
            'access_secret' => [
                'required_if:s3_file_upload,1',
                'nullable',
            ],
            'region' => [
                'required_if:s3_file_upload,1',
                'nullable',
            ],
            'bucket' => [
                'required_if:s3_file_upload,1',
                'nullable',
            ],
            'directory' => [
                'required_if:s3_file_upload,1',
                'nullable',
            ],
            'allowed_mimes' => [
                'required_if:file_upload,1',
                'nullable',
            ],
            'max_upload_size' => [
                'required_if:file_upload,1',
                'nullable','integer','min:1',
            ],
            's3_max_upload_size' => [
                'required_if:s3_file_upload,1',
                'nullable',
            ],
            's3_allowed_mimes' => [
                'required_if:s3_file_upload,1',
                'nullable',
            ],

        ]);
        if (!$this->s3_file_upload) {
            $this->form->update([
                's3' => null,
                'local_file' => [
                    'allowed_mimes' => $this->allowed_mimes,
                    'max_upload_size' => $this->max_upload_size
                ],
                'file_upload' => $this->file_upload,
                's3_file_upload' => $this->s3_file_upload,
            ]);

            $this->resetForm();

            $this->emit('updateFormEndpoint', $this->form->id);

            return session()->flash('S3Updated', 'Settings updated successfully.');
        }

        $disk = Storage::build([
            ...$validated,
            'driver' => 's3',
        ]);

        if (!$disk->put('pestform', 'Verification Success')) {
            session()->flash('s3', 'Could not write to S3');
        }

        $this->form->update([
            'file_upload' => $this->file_upload,
            's3_file_upload' => $this->s3_file_upload,
            's3' => [
                "access_key_id"=> $this->access_key_id,
                "access_secret"=>$this->access_secret,
                "region"=>$this->region,
                "bucket"=>$this->bucket,
                "directory"=>$this->directory,
                "s3_max_upload_size"=>$this->s3_max_upload_size,
                "s3_allowed_mimes"=>$this->s3_allowed_mimes
            ],
            'local_file' => null,
        ]);

        $this->updated = true;

        $this->emit('updateFormEndpoint', $this->form->id);
    }

    public function updatedS3FileUpload(){
        $this->file_upload = false;
    }

    public function updatedFileUpload(){
        $this->s3_file_upload = false;
    }

    public function resetForm()
    {
        $this->access_key_id =
        $this->access_secret =
        $this->region =
        $this->bucket =
        $this->s3_allowed_mimes =
        $this->s3_max_upload_size =
        $this->directory ="";
    }
}
