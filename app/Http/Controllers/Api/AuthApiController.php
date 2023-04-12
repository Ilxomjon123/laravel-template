<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginApiRequest;
use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Hash;

class AuthApiController extends Controller
{
    use ApiResponse;

    public function login(LoginApiRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if (is_null($user)) {
            return $this->error(['message' => __('auth.failed')], 422);
        }
        if (Hash::check($request->password, $user->password)) {
            $token = $user->createToken('name')->plainTextToken;
            $response = [
                'user' => $user,
                'token' => $token,
            ];
            return $this->success($response);
        }
        return $this->error(['message' => __('auth.failed')], 422);
    }

    public function profile()
    {
        return $this->success(auth()->user());
    }

    public function logout()
    {
        auth()->user()->delete();
        return $this->success();
    }
}
