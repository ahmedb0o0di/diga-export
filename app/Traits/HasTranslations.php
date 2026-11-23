<?php

namespace App\Traits;

trait HasTranslations
{
    public function getTranslation(string $attribute, ?string $locale = null): string
    {
        $locale = $locale ?: app()->getLocale();
        $translations = $this->$attribute;

        if (is_string($translations)) {
            $decoded = json_decode($translations, true);
            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                $translations = $decoded;
            } else {
                return $translations;
            }
        }

        if (is_array($translations)) {
            return $translations[$locale] ?? $translations['en'] ?? $translations['ar'] ?? $translations['fr'] ?? '';
        }

        return '';
    }

    public function getTrans(string $attribute, ?string $locale = null): string
    {
        return $this->getTranslation($attribute, $locale);
    }
}
