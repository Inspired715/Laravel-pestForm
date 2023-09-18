<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'internal_name',
        'max_forms',
        'paddle_id',
        'price',
    ];

    protected $casts = [
        'price' => 'array',
    ];
}
