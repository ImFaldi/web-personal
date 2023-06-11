<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('dashboard.dashboard');
    }

    public function getme()
    {
        $token = session()->get('token');
        $reponse = Http::withToken($token)->get('http://localhost:3000/api/me');
        $user = json_decode($reponse->body(), true);
        dd($user);
        return response()->json([
            'user' => $user,
        ]);
    }
}
