<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ResumeController extends Controller
{
    //

    public function CreateResume(Request $request)
    {
        $response = Http::withToken(session('token'))->post('http://localhost:3000/api/resume', [
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'description' => $request->description,
            'about_me_id' => $request->about_me_id,
            'image' => $request->image,
            'start_year' => $request->start_year,
            'end_year' => $request->end_year,
            'company' => $request->company,
        ]);

        $response = json_decode($response->body(), true);

        return redirect()->route('dashboard')->with('success', 'Resume berhasil ditambahkan');
    }

    public function UpdateResume(Request $request, $id)
    {
        $response = Http::withToken(session('token'))->put('http://localhost:3000/api/resume/' . $id, [
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'description' => $request->description,
            'about_me_id' => $request->about_me_id,
            'image' => $request->image,
            'start_year' => $request->start_year,
            'end_year' => $request->end_year,
            'company' => $request->company,
        ]);

        $response = json_decode($response->body(), true);

        return redirect()->route('dashboard')->with('success', 'Resume berhasil diubah');
    }

    public function DeleteResume($id)
    {
        $response = Http::withToken(session('token'))->delete('http://localhost:3000/api/resume/' . $id);

        $response = json_decode($response->body(), true);

        return redirect()->route('dashboard')->with('success', 'Resume berhasil dihapus');
    }
}
