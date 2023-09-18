<?php

namespace App\Http\Livewire\FormConfiguration;

use Livewire\Component;
use App\Models\Form;

class AllowedDomain extends Component
{
    public Form $form;
    public bool $updated = false;
    public $allowed_domains = 0;
    public $allowed_domains_count = 0;

    public function mount($form)
    {
        $this->form = $form;
        if ($this->form) {
            $this->allowed_domains = $this->form->allowed_domains;
            $this->allowed_domains_count = $this->form->allowed_domains_count;
        }
    }
    public function render()
    {
        return view('livewire.form-configuration.allowed-domain');
    }

    public function update()
    {
        $this->allowed_domains = $this->allowed_domains == true ? 1 : 0;
        $this->validate([
            'allowed_domains' => 'required|in:0,1',
            'allowed_domains_count' => [
                'required_if:allowed_domains,1',
                'nullable',
            ],
        ]);

        $this->form->update([
            'allowed_domains' => $this->allowed_domains,
            'allowed_domains_count' => $this->allowed_domains_count
        ]);

        $this->updated = true;
    }
}
