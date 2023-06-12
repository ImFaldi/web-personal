<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Resume;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    //

    public function GetAllResume()
    {
        $resume = Resume::all();
        return response()->json([
            'success' => true,
            'message' => 'List Semua Resume',
            'data' => $resume,
            'status' => '200'
        ], 200);
    }

    public function GetResumeById($id)
    {
        $resume = Resume::find($id);
        if ($resume) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Data Resume',
                'data' => $resume,
                'status' => '200'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Resume Tidak Ditemukan',
                'data' => '',
                'status' => '404'
            ], 404);
        }
    }

    public function CreateResume(Request $request)
    {
        $resume = new Resume();
        $resume->nama = $request->nama;
        $resume->deskripsi = $request->deskripsi;
        $resume->gambar = $request->gambar;
        $resume->save();

        return response()->json([
            'success' => true,
            'message' => 'Data Resume Berhasil Disimpan',
            'data' => $resume,
            'status' => '200'
        ], 200);
    }

    public function UpdateResume(Request $request, $id)
    {
        $resume = Resume::find($id);
        if ($resume) {
            $resume->nama = $request->nama ? $request->nama : $resume->nama;
            $resume->deskripsi = $request->deskripsi ? $request->deskripsi : $resume->deskripsi;
            $resume->gambar = $request->gambar ? $request->gambar : $resume->gambar;
            $resume->save();
            return response()->json([
                'success' => true,
                'message' => 'Data Resume Berhasil Diubah',
                'data' => $resume,
                'status' => '200'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Resume Tidak Ditemukan',
                'data' => '',
                'status' => '404'
            ], 404);
        }
    }

    public function DeleteResume($id)
    {
        $resume = Resume::find($id);
        if ($resume) {
            $resume->delete();
            return response()->json([
                'success' => true,
                'message' => 'Data Resume Berhasil Dihapus',
                'data' => $resume,
                'status' => '200'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Resume Tidak Ditemukan',
                'data' => '',
                'status' => '404'
            ], 404);
        }
    }
}
