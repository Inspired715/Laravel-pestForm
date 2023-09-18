<?php

namespace App\Http\Livewire\FormConfiguration;

use Livewire\Component;
use App\Models\Form;

class FormEndPoint extends Component
{
    public Form $form;
    public bool $updated = false;

    protected $listeners = ['updateFormEndpoint' => 'refreshForm'];

    public function mount($form)
    {
        $this->form = $form;
    }

    public function refreshForm($id)
    {
        $this->form = $this->form->where('id',$id)->first();
    }

    public function render()
    {
        return view('livewire.form-configuration.form-end-point');
    }
}
