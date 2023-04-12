<?php

namespace App\Traits;

trait HasFullname
{
    public function getFullnameAttribute(): string
    {
        return $this->surname . ' ' . $this->name . ' ' . $this->patronymic;
    }
}
