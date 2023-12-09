<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function __invoke(Request $request)
    {
        if (Auth::check()) {
            return response()->json([
                'user' => [
                    "name" => Auth::user()->name,
                    "username" => Auth::user()->username
                ],
            ], 200);
        }

        return response()->json([
            'message' => 'Não autorizado.'
        ], 401);
    }
}
