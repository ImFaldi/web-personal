<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    //

    public function index()
    {
        return view('auth.login');
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

        if ($data['status'] == 200) {
            $request->session()->put('token', $data['authorization']['token']);
            $request->session()->put('user', $data['user']);
            return view('landing');
        } else {
            return redirect()->route('login.page')->with('error', 'Email or password is incorrect');
        }
    }
}
