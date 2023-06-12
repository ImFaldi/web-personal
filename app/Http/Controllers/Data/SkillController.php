<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SkillController extends Controller
{
    //

    public function CreateSkill(Request $request)
    {
        $response = Http::withToken(session('token'))->post('http://localhost:3000/api/skill', [
            'name' => $request->name,
            'percentage' => $request->percentage,
        ]);

        $response = json_decode($response->body(), true);

        return redirect()->route('dashboard')->with('success', 'Skill berhasil ditambahkan');

    }

    public function UpdateSkill(Request $request, $id)
    {
        $response = Http::withToken(session('token'))->put('http://localhost:3000/api/skill/' . $id, [
            'name' => $request->name,
            'percentage' => $request->percentage,
        ]);

        $response = json_decode($response->body(), true);

        return redirect()->route('dashboard')->with('success', 'Skill berhasil diubah');
    }

    public function DeleteSkill($id)
    {
        $response = Http::withToken(session('token'))->delete('http://localhost:3000/api/skill/' . $id);

        $response = json_decode($response->body(), true);

        return redirect()->route('dashboard')->with('success', 'Skill berhasil dihapus');
    }
    
}
