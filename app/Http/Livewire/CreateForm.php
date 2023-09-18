<?php

namespace App\Http\Livewire;

use App\Models\Form;
use Illuminate\Support\Str;
use Livewire\Component;

class CreateForm extends Component
{
    public string $title = '';
    public string $forward_to = '';
    public array $forward_to_array = [];

    public function render()
    {
        return view('livewire.create-form');
    }

    public function create()
    {
        /**
         * @var \App\Models\User $user
         */
        $user = auth()->user();

        $formsCount = $user->forms()->count();
        $max_forms = $user->max_forms();

        if ($formsCount >= $max_forms) {
            return $this->addError('limit', 'You have reached the maximum number of forms for your plan.');
        }

        $this->forward_to_array = explode("\n", $this->forward_to);

        $this->forward_to_array = array_filter($this->forward_to_array, function ($value) {
            return !empty($value);
        });

        $this->validate([
            'title' => 'required|string',
            'forward_to_array' => 'array',
            'forward_to_array.*' => ['required_with:forward_to_array', 'email', 'nullable'],
        ]);

        do {
            $slug = Str::slug(Str::random(8));
        } while (Form::where('slug', $slug)->exists());

        $form = $user->forms()->create([
            'title' => $this->title,
            'forward_to' => $this->forward_to_array,
            'slug' => $slug,
        ]);

        return to_route('forms.index');
    }
}
