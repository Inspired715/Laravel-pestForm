<?php

namespace App\Http\Livewire\FormConfiguration;

use Livewire\Component;
use App\Models\Form;

class DeleteForm extends Component
{
    public Form $form;
    public bool $updated = false;
    public function mount($form)
    {
        $this->form = $form;

    }
    public function render()
    {
        return view('livewire.form-configuration.delete-form');
    }
}
