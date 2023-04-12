<?php

namespace App\Traits;

use App\Models\Translation;
use Exception;

trait HasTranslations
{
    protected $locale;
    protected $setDefaultTranslation;

    public function setLocale($key): void
    {
        $this->locale = $key;
    }

    public function getLocale()
    {
        return $this->locale ?: app()->getLocale();
    }

    // Relation
    public function translations(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(Translation::class, 'translatable');
    }

    // barcha fieldlarni bitta tildagi tarjimalari
    public function getTranslationAttributes($locale = null)
    {
        return $this->translations->where('language', $locale ?: $this->getLocale());
    }

    // bitta tilni bitta tildagi tarjimasi
    public function translate($field, $locale = null)
    {
        if ($this->isAvailableField($field))
            return optional($this->getTranslationAttributes($locale)->firstWhere('field', $field))->value;
        throw new Exception("This field is not in translatables array: $field");
    }

    // bitta fieldni barcha tillardagi tarjimasi
    public function translates($field)
    {
        if ($this->isAvailableField($field))
            return $this->translations->where('field', $field);
        throw new Exception("This field is not in translatables array: $field");
    }

// bitta fieldni json formatda barcha tillardagi tarjimalarini olish
    function pluckTranslates($field): ?\Illuminate\Support\Collection
    {
        return $this->translates($field)->all() ? $this->translates($field)->pluck('field_value', 'language_url') : null;
    }

    // field bor yoki yo'qligini tekshirish
    protected function isAvailableField($field): bool
    {
        return in_array($field, $this->translatable);
    }

    // bitta fieldni bitta til bo'yicha tarjimasini save qilish
    public function setTranslation($field, $value, $locale = null): static
    {
        $this->translations()->updateOrCreate(['field' => $field, 'language' => $locale ?: $this->getLocale()], ['value' => $value]);
        if ($locale == defaultLocaleCode()) {
            $this->update([$field => $value]);
            // $this->$field = $value;
            // $this->save();
        }
        return $this;
    }

    // bitta field tarjimalarni save qilish
    public function setTranslations($field, $array): static
    {
        if ($this->isAvailableField($field)) {
            foreach ($array as $locale => $value) {
                $this->setTranslation($field, $value, $locale);
            }
        }
        return $this;
    }

    // bir nechta field tarjimalarini bittada save qilish
    public function setTranslationsArray($array): static
    {
        foreach ($array as $field => $value) {
            $this->setTranslations($field, $value);
        }
        return $this;
    }
}
