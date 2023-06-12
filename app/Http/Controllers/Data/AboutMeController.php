<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AboutMeController extends Controller
{
    //

    public function UpdateAboutMe(Request $request, $id)
    {
        $response = Http::withToken(session('token'))->put('http://localhost:3000/api/aboutme/' . $id, [
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'description' => $request->description,
            'image' => $request->image,
            'birthday' => $request->birthday,
            'website' => $request->website,
            'phone' => $request->phone,
            'city' => $request->city,
            'age' => $request->age,
            'degree' => $request->degree,
            'email' => $request->email,
            'freelance' => $request->freelance,
        ]);

        $response = json_decode($response->body(), true);

        return redirect()->route('dashboard')->with('success', 'About Me berhasil diubah');
    }

    public function DeleteAboutMe($id)
    {
        $response = Http::withToken(session('token'))->delete('http://localhost:3000/api/aboutme/' . $id);

        $response = json_decode($response->body(), true);

        return redirect()->route('dashboard')->with('success', 'About Me berhasil dihapus');
    }
}
