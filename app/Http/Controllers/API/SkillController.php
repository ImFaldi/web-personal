<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    //

    public function GetAllSkill()
    {
        $skill = Skill::all();
        return response()->json([
            'success' => true,
            'message' => 'List Semua Skill',
            'data' => $skill,
            'status' => '200'
        ], 200);
    }

    public function GetSkillById($id)
    {
        $skill = Skill::find($id);
        if ($skill) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Data Skill',
                'data' => $skill,
                'status' => '200'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Skill Tidak Ditemukan',
                'data' => '',
                'status' => '404'
            ], 404);
        }
    }

    public function CreateSkill(Request $request)
    {
        $skill = new Skill();
        $skill->nama = $request->nama;
        $skill->deskripsi = $request->deskripsi;
        $skill->gambar = $request->gambar;
        $skill->save();

        return response()->json([
            'success' => true,
            'message' => 'Data Skill Berhasil Disimpan',
            'data' => $skill,
            'status' => '200'
        ], 200);
    }

    public function UpdateSkill(Request $request, $id)
    {
        $skill = Skill::find($id);
        if ($skill) {
            $skill->nama = $request->nama ? $request->nama : $skill->nama;
            $skill->deskripsi = $request->deskripsi ? $request->deskripsi : $skill->deskripsi;
            $skill->gambar = $request->gambar ? $request->gambar : $skill->gambar;
            $skill->save();
            return response()->json([
                'success' => true,
                'message' => 'Data Skill Berhasil Diupdate',
                'data' => $skill,
                'status' => '200'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Skill Tidak Ditemukan',
                'data' => '',
                'status' => '404'
            ], 404);
        }
    }

    public function DeleteSkill($id)
    {
        $skill = Skill::find($id);
        if ($skill) {
            $skill->delete();
            return response()->json([
                'success' => true,
                'message' => 'Data Skill Berhasil Dihapus',
                'data' => $skill,
                'status' => '200'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Skill Tidak Ditemukan',
                'data' => '',
                'status' => '404'
            ], 404);
        }
    }
}
