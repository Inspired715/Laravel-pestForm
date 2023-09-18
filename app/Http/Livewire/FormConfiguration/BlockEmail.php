<?php

namespace App\Http\Livewire\FormConfiguration;

use Livewire\Component;
use App\Models\Form;

class BlockEmail extends Component
{
    public Form $form;
    public bool $updated = false;
    public $blocked_emails;

    public function mount($form)
    {
        $this->form = $form;
        if($this->form){
            $this->blocked_emails = $this->form->blocked_emails;
        }

    }
    public function render()
    {
        return view('livewire.form-configuration.block-email');
    }

    public function update()
    {

        $this->validate([
            'blocked_emails' => 'required',
        ]);


        $this->form->update([
            'blocked_emails' => $this->blocked_emails
        ]);

        $this->updated = true;
    }

}
