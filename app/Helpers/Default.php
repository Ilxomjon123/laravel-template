<?php

use App\Models\Language;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

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

function uploadFile($file, $path, $old = null): ?string
{
    $result = null;
    deleteFile($old);
    deleteFile($old);
    if ($file != null) {
        $names = explode(".", $file->getClientOriginalName());
        $model = time() . '.' . $names[count($names) - 1];
        $file->storeAs("public/$path", $model);
        $result = "/storage/$path/" . $model;
    }
    return $result;
}

function deleteFile($path): void
{
    if ($path != null && file_exists(public_path() . $path)) {
        unlink(public_path() . $path);
    }
}

function nudePhone($phone)
{
    if (strlen($phone) > 0)
        $phone = str_replace(['(', ')', ' ', '-', '+'], '', $phone);
    if (strlen($phone) > 0) {
        if ($phone[0] == '7') {
            $phone = substr($phone, 1);
        }
    }
    return $phone;
}

function buildPhone($phone): string
{
    $phone = nudePhone($phone);
    return '+7 ' . '(' . substr($phone, 0, 3) . ') '
        . substr($phone, 3, 3) . '-'
        . substr($phone, 6, 2) . '-'
        . substr($phone, 8, 2);
}

function getKey()
{
    $key = explode('.', request()->route()->getName());
    array_pop($key);
    $key = implode('.', $key);
    return $key;
}

function getRequest($request = null)
{
    return $request ?? request();
}


function defaultLocale()
{
    return Language::where('default', true)->first();
}

function allLanguage()
{
    return Language::all();
}

function defaultLocaleCode()
{
    return optional(defaultLocale())->url;
}

function paginate($items, $perPage = 15, $page = null, $options = [])
{
    $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

    $items = $items instanceof Collection ? $items : Collection::make($items);

    return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
}
