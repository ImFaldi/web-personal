<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Portofolio;
use Illuminate\Http\Request;

class PortofolioController extends Controller
{

    //get all data portofolio api from database
    public function GetAllPortofolio()
    {
        $portofolio = Portofolio::all();
        return response()->json([
            'success' => true,
            'message' => 'List Semua Portofolio',
            'data' => $portofolio,
            'status' => '200'
        ], 200);
    }

    //get data portofolio api from database by id
    public function GetPortofolioById($id)
    {
        $portofolio = Portofolio::find($id);
        if ($portofolio) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Data Portofolio',
                'data' => $portofolio,
                'status' => '200'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Portofolio Tidak Ditemukan',
                'data' => '',
                'status' => '404'
            ], 404);
        }
    }

    //create data portofolio api to database
    public function CreatePortofolio(Request $request)
    {
        $portofolio = new Portofolio();
        $portofolio->nama = $request->nama;
        $portofolio->deskripsi = $request->deskripsi;
        $portofolio->gambar = $request->gambar;
        $portofolio->save();

        return response()->json([
            'success' => true,
            'message' => 'Data Portofolio Berhasil Disimpan',
            'data' => $portofolio,
            'status' => '200'
        ], 200);
    }

    //update data portofolio api to database by id
    public function UpdatePortofolio(Request $request, $id)
    {
        $portofolio = Portofolio::find($id);
        if ($portofolio) {
            $portofolio->nama = $request->nama ? $request->nama : $portofolio->nama;
            $portofolio->deskripsi = $request->deskripsi ? $request->deskripsi : $portofolio->deskripsi;
            $portofolio->gambar = $request->gambar ? $request->gambar : $portofolio->gambar;
            $portofolio->save();

            return response()->json([
                'success' => true,
                'message' => 'Data Portofolio Berhasil Diupdate',
                'data' => $portofolio,
                'status' => '200'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Portofolio Tidak Ditemukan',
                'data' => '',
                'status' => '404'
            ], 404);
        }
    }

    //delete data portofolio api from database by id
    public function DeletePortofolio($id)
    {
        $portofolio = Portofolio::find($id);
        if ($portofolio) {
            $portofolio->delete();
            return response()->json([
                'success' => true,
                'message' => 'Data Portofolio Berhasil Dihapus',
                'data' => $portofolio,
                'status' => '200'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Portofolio Tidak Ditemukan',
                'data' => '',
                'status' => '404'
            ], 404);
        }
    }
}
