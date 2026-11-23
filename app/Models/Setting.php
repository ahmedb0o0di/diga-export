<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasTranslations;

class Setting extends Model
{
    use HasTranslations;

    protected $fillable = ['key', 'value'];

    protected $casts = [
        'value' => 'array',
    ];

    public static function get(string $key, $default = null)
    {
        $setting = static::where('key', $key)->first();
        if (!$setting) {
            return $default;
        }

        $val = $setting->value;
        if (is_array($val)) {
            $locale = app()->getLocale();
            return $val[$locale] ?? $val['en'] ?? $val['ar'] ?? $val['fr'] ?? $default;
        }

        return $val ?? $default;
    }

    public static function getRawValue(string $key)
    {
        $setting = static::where('key', $key)->first();
        return $setting ? $setting->value : null;
    }

    public static function set(string $key, $value)
    {
        return static::updateOrCreate(['key' => $key], ['value' => $value]);
    }
}
