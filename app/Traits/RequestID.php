<?php

namespace App\Traits;

trait RequestID
{
  public function all($keys = null)
  {
    // Add route parameters to validation data
    return array_merge(parent::all(), ['id' => $this->route()->parameters()['id']]);
  }
}
