<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasTranslations;

class TeamMember extends Model
{
    use HasTranslations;

    protected $fillable = [
        'name',
        'designation',
        'photo',
        'facebook',
        'twitter',
        'linkedin',
        'sort_order',
    ];

    protected $casts = [
        'name' => 'array',
        'designation' => 'array',
    ];
}
