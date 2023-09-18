<?php

namespace App\Http\Livewire\FormConfiguration;

use Livewire\Component;
use App\Models\Form;

class HoneyPotStart extends Component
{
    public Form $form;
    public bool $updated = false;
    public $honey_pot;

    public function mount($form)
    {
        $this->form = $form;
        if ($this->form) {
            $this->honey_pot = $this->form->honey_pot;
        }

    }
    public function render()
    {
        return view('livewire.form-configuration.honey-pot-start');
    }

    public function update()
    {
        $this->validate([
            'honey_pot' => 'required|string',
        ]);

        $this->form->update([
            'honey_pot' => $this->honey_pot,
        ]);

        $this->updated = true;

    }
}
