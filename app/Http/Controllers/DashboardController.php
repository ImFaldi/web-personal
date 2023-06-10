<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class DashboardController extends Controller
{
    public function __construct( )
    {   
        dd(JWTAuth::getToken());
        $this->middleware('jwt.auth');
    }
    public function dashboard()
    {
        return view('dashboard.dashboard');
    }
}
