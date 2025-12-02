<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'position',
        'company',
        'company_link',
        'location',
        'start_date',
        'end_date',
        'employment_type',
        'description',
        'highlights',
        'tech_stack',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'highlights' => 'array',
        'tech_stack' => 'array',
    ];
}
