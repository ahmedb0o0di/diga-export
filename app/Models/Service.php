<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasTranslations;

class Service extends Model
{
    use HasTranslations;

    protected $fillable = [
        'slug',
        'title',
        'description',
        'content',
        'icon',
        'image',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'title' => 'array',
        'description' => 'array',
        'content' => 'array',
        'is_active' => 'boolean',
    ];
}
