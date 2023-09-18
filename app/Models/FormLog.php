<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'form_id',
        'last_checkin'
    ];  
}

