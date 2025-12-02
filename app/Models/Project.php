<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'title',
        'slug',
        'made_at',
        'description',
        'link',
        'thumbnail',
        'gallery',
        'technologies',
        'features',
        'results',
        'status',
    ];

    protected $casts = [
        'gallery' => 'array',
        'technologies' => 'array',
        'features' => 'array',
        'results' => 'array',
    ];
}
