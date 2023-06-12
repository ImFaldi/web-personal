<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LandingPageController extends Controller
{
    //

    public function index()
    {
        $portofolio = Http::withToken(session('token'))->get('http://localhost:3000/api/portofolio');
        $category = Http::withToken(session('token'))->get('http://localhost:3000/api/category');
        $skill = Http::withToken(session('token'))->get('http://localhost:3000/api/skill');
        $about_me = Http::withToken(session('token'))->get('http://localhost:3000/api/aboutme');
        $resume = Http::withToken(session('token'))->get('http://localhost:3000/api/resume');

        $portofolio = json_decode($portofolio->body(), true);
        $category = json_decode($category->body(), true);
        $skill = json_decode($skill->body(), true);
        $about_me = json_decode($about_me->body(), true);
        $resume = json_decode($resume->body(), true);

        return view('landing', compact('portofolio', 'category', 'skill'));
    }
}
