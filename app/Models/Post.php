<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasTranslations;

class Post extends Model
{
    use HasTranslations;

    protected $fillable = [
        'slug',
        'title',
        'category',
        'excerpt',
        'content',
        'author',
        'read_time',
        'thumbnail',
        'published_at',
        'is_published',
    ];

    protected $casts = [
        'title' => 'array',
        'category' => 'array',
        'excerpt' => 'array',
        'content' => 'array',
        'published_at' => 'datetime',
        'is_published' => 'boolean',
    ];
}
