<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\AboutMe;
use Illuminate\Http\Request;

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
}
