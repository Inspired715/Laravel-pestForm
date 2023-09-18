<?php

namespace App\Http\Livewire\FormConfiguration;

use Livewire\Component;
use App\Models\Form;
use Livewire\WithFileUploads;

class LogoStart extends Component
{
    use WithFileUploads;
    public Form $form;
    public $email_logo;
    public bool $updated = false;
    public function mount($form)
    {
        $this->form = $form;
        if($this->form){
            $this->email_logo = $this->form->email_logo;
        }
    }
    
    public function render()
    {
        return view('livewire.form-configuration.logo-start');
    }

    public function update()
    {
        $this->validate([
            'email_logo' => 'required|image|mimes:jpeg,jpg,png|max:10048',
        ]);

        $imagePath = $this->email_logo->store('email_logos', 'public');
        $imageUrl = asset('storage/' . $imagePath);
        $this->form->update([
            'email_logo' => $imageUrl
        ]);
        $this->updated = true;

        return view('livewire.form-configuration.logo-start');
    }
}
