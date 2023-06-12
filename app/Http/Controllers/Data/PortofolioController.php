<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PortofolioController extends Controller
{
    //

    public function CreatePortofolio(Request $request)
    {
        $response = Http::withToken(session('token'))->post('http://localhost:3000/api/portofolio', [
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image,
            'category_id' => $request->category_id,
        ]);

        $response = json_decode($response->body(), true);

        return redirect()->route('dashboard')->with('success', 'Portofolio berhasil ditambahkan');
    }

    public function UpdatePortofolio(Request $request, $id)
    {
        $response = Http::withToken(session('token'))->put('http://localhost:3000/api/portofolio/' . $id, [
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image,
            'category_id' => $request->category_id,
        ]);

        $response = json_decode($response->body(), true);

        return redirect()->route('dashboard')->with('success', 'Portofolio berhasil diubah');
    }

    public function DeletePortofolio($id)
    {
        $response = Http::withToken(session('token'))->delete('http://localhost:3000/api/portofolio/' . $id);

        $response = json_decode($response->body(), true);

        return redirect()->route('dashboard')->with('success', 'Portofolio berhasil dihapus');
    }

}
