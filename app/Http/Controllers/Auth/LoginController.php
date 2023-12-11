<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request)
    {
        dd("saddas");
        $login = Auth::attempt($request->validated());

        if (!$login) {
            return response()->json([
                'message' => 'Credenciais inválidas.'
            ], 401);
        }

        $request->session()->regenerate();

        return response([
            'user' => [
                "name" => Auth::user()->name,
                "username" => Auth::user()->username
            ],
        ], 200);
    }
}
