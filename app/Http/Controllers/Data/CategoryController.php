<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CategoryController extends Controller
{
    //

    public function CreateCategory(Request $request)
    {
        $response = Http::withToken(session('token'))->post('http://localhost:3000/api/category', [
            'name' => $request->name,
        ]);

        $response = json_decode($response->body(), true);

        return redirect()->route('dashboard')->with('success', 'Category berhasil ditambahkan');
    }

    public function UpdateCategory(Request $request, $id)
    {
        $response = Http::withToken(session('token'))->put('http://localhost:3000/api/category/' . $id, [
            'name' => $request->name,
        ]);

        $response = json_decode($response->body(), true);

        return redirect()->route('dashboard')->with('success', 'Category berhasil diubah');
    }

    public function DeleteCategory($id)
    {
        $response = Http::withToken(session('token'))->delete('http://localhost:3000/api/category/' . $id);

        $response = json_decode($response->body(), true);

        return redirect()->route('dashboard')->with('success', 'Category berhasil dihapus');
    }
}
