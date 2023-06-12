<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //

    public function GetAllCategory()
    {
        $category = Category::all();
        return response()->json([
            'success' => true,
            'message' => 'List Semua Category',
            'data' => $category,
            'status' => '200'
        ], 200);
    }

    public function GetCategoryById($id)
    {
        $category = Category::find($id);
        if ($category) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Data Category',
                'data' => $category,
                'status' => '200'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Category Tidak Ditemukan',
                'data' => '',
                'status' => '404'
            ], 404);
        }
    }

    public function CreateCategory(Request $request)
    {
        $category = new Category();
        $category->nama = $request->nama;
        $category->deskripsi = $request->deskripsi;
        $category->gambar = $request->gambar;
        $category->save();

        return response()->json([
            'success' => true,
            'message' => 'Data Category Berhasil Disimpan',
            'data' => $category,
            'status' => '200'
        ], 200);
    }

    public function UpdateCategory(Request $request, $id)
    {
        $category = Category::find($id);
        if ($category) {
            $category->nama = $request->nama ? $request->nama : $category->nama;
            $category->deskripsi = $request->deskripsi ? $request->deskripsi : $category->deskripsi;
            $category->gambar = $request->gambar ? $request->gambar : $category->gambar;
            $category->save();
            return response()->json([
                'success' => true,
                'message' => 'Data Category Berhasil Diupdate',
                'data' => $category,
                'status' => '200'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Category Tidak Ditemukan',
                'data' => '',
                'status' => '404'
            ], 404);
        }
    }

    public function DeleteCategory($id)
    {
        $category = Category::find($id);
        if ($category) {
            $category->delete();
            return response()->json([
                'success' => true,
                'message' => 'Data Category Berhasil Dihapus',
                'data' => $category,
                'status' => '200'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Category Tidak Ditemukan',
                'data' => '',
                'status' => '404'
            ], 404);
        }
    }
    
}
