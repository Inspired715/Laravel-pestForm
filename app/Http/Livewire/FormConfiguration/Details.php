<?php

namespace App\Http\Livewire\FormConfiguration;

use App\Models\Form;
use Livewire\Component;

class Details extends Component
{
	public Form $form;

	public string $title;
	public string $forward_to;
	public string $default_email_theme = 'one';
	public array $forward_to_array = [];
	public bool $updated = false;

	public function mount($form) {
		$this->form = $form;

		$this->title = $form->title;

		$this->forward_to_array = $form->forward_to;

		$this->forward_to = join("\n", $form->forward_to);

		if ($this->form) {
			$this->default_email_theme = !empty($this->form->default_email_theme) ? $this->form->default_email_theme : "one";
		}
	}

	public function render() {
		return view('livewire.form-configuration.details');
	}

	public function update() {
		$this->updated = false;

		$this->forward_to_array = explode("\n", $this->forward_to);

		$this->forward_to_array = array_filter($this->forward_to_array, function ($value) {
			return !empty($value);
		});

		$this->validate([
			'title' => 'required|string',
			'default_email_theme' => 'required|string',
			'forward_to_array' => 'array',
			'forward_to_array.*' => ['required_with:forward_to_array', 'email', 'nullable'],
		]);

		$this->form->update([
			'title' => $this->title,
			'forward_to' => $this->forward_to_array,
			'default_email_theme' => $this->default_email_theme,
		]);

		$this->updated = true;
	}
}
