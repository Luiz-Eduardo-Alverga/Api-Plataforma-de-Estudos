<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    public function login(LoginRequest $request ) {
        $user = User::query()
            ->where('email', $request->email)
            ->whereNull('deleted_at')
            ->first();

        if(!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['As credenciais informadas estão inválidas'],
            ]);
        }

        return [
            'token' => $user->createToken('auth_token')->plainTextToken,
        ];
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();

        $user = User::query()->create($data);

        return response()->json([
            'token' => $user->createToken('auth_token')->plainTextToken,
        ]);

    }
}
