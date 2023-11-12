<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    //

    public function __invoke(Request $request)
    {
        $user = $request->user();
        $user->tokens()->delete();

        return response()->json([], 204);
    }
}
