<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\AboutMe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AboutMeController extends Controller
{
    //

    public function GetAllAboutMe()
    {
        $aboutme = AboutMe::all();
        return response()->json([
            'success' => true,
            'message' => 'List Semua About Me',
            'data' => $aboutme,
            'status' => '200'
        ], 200);
    }

    public function GetAboutMeById($id)
    {
        $aboutme = AboutMe::find($id);
        if ($aboutme) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Data About Me',
                'data' => $aboutme,
                'status' => '200'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data About Me Tidak Ditemukan',
                'data' => '',
                'status' => '404'
            ], 404);
        }
    }

    public function CreateAboutMe(Request $request)
    {
        $aboutme = new AboutMe();
        $aboutme->nama = $request->nama;
        $aboutme->deskripsi = $request->deskripsi;
        $aboutme->gambar = $request->gambar;
        $aboutme->save();

        return response()->json([
            'success' => true,
            'message' => 'Data About Me Berhasil Disimpan',
            'data' => $aboutme,
            'status' => '200'
        ], 200);
    }

    public function UpdateAboutMe(Request $request, $id)
    {
        $checkAboutMe = AboutMe::firstWhere('id', $id);
        if ($checkAboutMe) {
            $dataAboutMe = AboutMe::find($id);
            $dataAboutMe->nama = $request->nama;
            $dataAboutMe->deskripsi = $request->deskripsi;
            $dataAboutMe->gambar = $request->gambar;
            $dataAboutMe->save();

            return response()->json([
                'success' => true,
                'message' => 'Data About Me Berhasil Diubah',
                'data' => $dataAboutMe,
                'status' => '200'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data About Me Tidak Ditemukan',
                'data' => '',
                'status' => '404'
            ], 404);
        }
    }

    public function DeleteAboutMe($id)
    {
        $checkAboutMe = AboutMe::firstWhere('id', $id);
        if ($checkAboutMe) {
            AboutMe::destroy($id);
            return response()->json([
                'success' => true,
                'message' => 'Data About Me Berhasil Dihapus',
                'data' => $checkAboutMe,
                'status' => '200'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data About Me Tidak Ditemukan',
                'data' => '',
                'status' => '404'
            ], 404);
        }
    }

}
