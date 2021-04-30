<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function getAllAccount()
    {
        return response()->json([
            'status' => 'success',
            'code' => 200,
            'result' => User::all()
        ]);
    }
}
