<?php

namespace App\Http\Livewire;

use App\Models\FormLog as ModelsFormLog;
use Livewire\Component;

class FormLog extends Component
{
    
    public function render()
    {
        $logs = ModelsFormLog::get();
        return view('livewire.form-log', compact('logs'));
    }
}
