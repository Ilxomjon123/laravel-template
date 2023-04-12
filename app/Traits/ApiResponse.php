<?php

namespace App\Traits;

trait ApiResponse
{
    public function success($result = 'Успешно', $code = 200): \Illuminate\Http\JsonResponse
    {
        return response()->json(['result' => $result ?? 'Успешно', 'errors' => null], $code);
    }

    public function error($error = 'Что-то пошло не так', $code = 400): \Illuminate\Http\JsonResponse
    {
        return response()->json(['result' => null, 'errors' => $error ?? 'Что-то пошло не так'], $code);
    }

    public function notAccess($message = 'У вас нет доступа!', $code = 405): \Illuminate\Http\JsonResponse
    {
        return $this->error(['message' => $message], $code);
    }
}
