<?php

namespace App\Http\Livewire\FormConfiguration;

use Livewire\Component;
use App\Models\Form;

class Recaptcha extends Component
{
    public Form $form;
    public bool $updated = false;
    public $recaptcha;
    public $recaptcha_secret;
    public function mount($form)
    {
        $this->form = $form;
        if ($this->form) {
            $this->recaptcha = $this->form->recaptcha;
            $this->recaptcha_secret = $this->form->recaptcha_secret;
        }

    }
    public function render()
    {
        return view('livewire.form-configuration.recaptcha');
    }

    public function update()
    {
        $this->recaptcha = $this->recaptcha == true ? 1 : 0;
        $this->validate([
            'recaptcha' => 'required|in:0,1',
            'recaptcha_secret' => [
                'required_if:allowed_domains,1',
                'nullable',
            ],
        ]);

        $this->form->update([
            'recaptcha' => $this->recaptcha,
            'recaptcha_secret' => $this->recaptcha_secret
        ]);

        $this->updated = true;
    }
}
