<?php

function requestOrder()
{
  $order = request()->get('order', '-id');
  if ($order[0] == '-') {
    $result = [
      'key' => substr($order, 1),
      'value' => 'desc'
    ];
  } else {
    $result = [
      'key' => $order,
      'value' => 'asc'
    ];
  }
  return $result;
}

function filterPhone($phone)
{
  return str_replace(['(', ')', ' ', '-'], '', $phone);
}

function uploadFile($file, $path, $old = null)
{
  $result = null;
  deleteFile($old);
  if ($file != null) {
    $names = explode(".", $file->getClientOriginalName());
    $model = time() . '.' .  $names[count($names) - 1];
    $file->storeAs("public/$path", $model);
    $result = "/storage/$path/" . $model;
  }
  return $result;
}

function deleteFile($path)
{
  if ($path != null && file_exists(public_path() . $path)) {
    unlink(public_path() . $path);
  }
}
