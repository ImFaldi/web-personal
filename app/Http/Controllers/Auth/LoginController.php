<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller
{

    public function index()
    {
        $token = session()->get('token');
        if (!$token) {
            return view('auth.login');
        } else {
            return redirect()->route('dashboard');
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password'=> 'required'
        ]);

        $response = Http::asForm()->post('http://localhost:3000/api/login', [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        $data = json_decode($response->body(), true);

        if ($data['status'] == 200 && $data['authorization']['token']) {
            $request->session()->put('token', $data['authorization']['token']);

            return redirect()->route('dashboard');
        } else {
            return redirect()->route('login.page')->with('error', 'Email or Password is wrong');
        }
    }

    public function getMe(Request $request)
    {
        $token = $request->session()->get('token');
        $response = Http::withToken($token)->get('http://localhost:3000/api/me');
        $data = json_decode($response->body(), true);
        if ($data['status'] == 200) {
            dd($data);
        } else {
            return redirect()->route('login.page')->with('error', 'Email or Password is wrong');
        }
    }
}
