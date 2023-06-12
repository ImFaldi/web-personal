<?php

namespace App\Http\Controllers;

use App\Models\AboutMe;
use App\Models\Category;
use App\Models\Portofolio;
use App\Models\Resume;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class DashboardController extends Controller
{
    public function dashboard()
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

        //total portofolio
        $total_portofolio = count($portofolio['data']);
        $total_category = count($category['data']);
        $total_skill = count($skill['data']);

        return view('dashboard.dashboard', compact('portofolio', 'category', 'skill', 'about_me', 'resume', 'total_portofolio', 'total_category', 'total_skill'));
    }

    public function table()
    {
        $portofolio = Http::withToken(session('token'))->get('http://localhost:3000/api/portofolio');
        $category = Http::withToken(session('token'))->get('http://localhost:3000/api/category');
        $skill = Http::withToken(session('token'))->get('http://localhost:3000/api/skill');

        $portofolio = json_decode($portofolio->body(), true);
        $category = json_decode($category->body(), true);
        $skill = json_decode($skill->body(), true);

        return view('dashboard.table', compact('portofolio', 'category', 'skill'));
    }

}
