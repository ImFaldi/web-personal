<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RegisterController extends Controller
{
    //

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|',
            'password' => 'required|string',
        ]);

        $response = Http::asForm()->post('http://localhost:3000/api/register', [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        $data = json_decode($response->body(), true);

        if ($data['status'] == 200) {
            return redirect()->route('login.page')->with('success', 'User created successfully');
        } else {
            return redirect()->route('register.page')->with('error', 'Email or Password is wrong');
        }
    }
}
