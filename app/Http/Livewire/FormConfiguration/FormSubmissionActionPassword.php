<?php

namespace App\Http\Livewire\FormConfiguration;

use Livewire\Component;
use App\Models\Form;

class FormSubmissionActionPassword extends Component
{
    public Form $form;
    public bool $updated = false;
    public $submission_failed = 'default';
    public $failed_redirect_url;

    public $submission_succeeded = 'default';
    public $success_redirect_url;
    public $success_message_title = 'Thanks for your submission!';

    public $branding_option_1 = '#235D8C';
    public $branding_option_2 = '#92AFD0';
    public $branding_option_3 = '#FDD835';
    public $branding_option_4 = '#235D8C';

    public function mount($form)
    {
        $this->form = $form;
        if ($this->form) {
            // error url
            $this->submission_failed = $this->form->submission_failed ?? $this->submission_failed;
            $this->failed_redirect_url = $this->form->failed_redirect_url ?? NULL;

            // success url
            $this->submission_succeeded = $this->form->submission_succeeded ?? $this->submission_succeeded;
            $this->success_redirect_url = $this->form->success_redirect_url  ?? NULL;
            $this->success_message_title = $this->form->success_message_title  ?? 'Thanks for your submission!';

            $this->branding_option_1 = $this->form->branding_option_1 ?? $this->branding_option_1 ?? NULL;
            $this->branding_option_2 = $this->form->branding_option_2 ?? $this->branding_option_2 ?? NULL;
            $this->branding_option_3 = $this->form->branding_option_3 ?? $this->branding_option_3 ?? NULL;
            $this->branding_option_4 = $this->form->branding_option_4 ?? $this->branding_option_4 ?? NULL;
        }
    }
    public function render()
    {
        return view('livewire.form-configuration.form-submission-action-password');
    }

    public function update()
    {
        $this->validate([
            'submission_failed' => 'required|in:default,redirect2',
            'failed_redirect_url' => [
                'required_if:submission_failed,redirect2',
                'nullable',
                'url',
            ],

            'submission_succeeded' => 'required|in:default,redirect,branded',
            'success_redirect_url' => [
                'required_if:submission_succeeded,redirect',
                'nullable',
                'url',
            ],
            'success_message_title' => [
                'required_if:submission_succeeded,branded',
                'nullable',
                'string',
            ],

            'branding_option_1' => [
                'required_if:submission_succeeded,branded',
                'nullable',
            ],
            'branding_option_2' => [
                'required_if:submission_succeeded,branded',
                'nullable',
            ],
            'branding_option_3' => [
                'required_if:submission_succeeded,branded',
                'nullable',
            ],
            'branding_option_4' => [
                'required_if:submission_succeeded,branded',
                'nullable',
            ],
        ]);

        $this->form->update([
            'submission_failed' => $this->submission_failed,
            'failed_redirect_url' => in_array($this->submission_failed, ['default']) ? NULL : $this->failed_redirect_url,

            'submission_succeeded' => $this->submission_succeeded,
            'success_redirect_url' => in_array($this->submission_succeeded, ['default']) ? NULL : $this->success_redirect_url,
            'success_message_title' => $this->success_message_title,

            'branding_option_1' => $this->branding_option_1,
            'branding_option_2' => $this->branding_option_2,
            'branding_option_3' => $this->branding_option_3,
            'branding_option_4' => $this->branding_option_4,
        ]);

        $this->updated = true;
    }
}
