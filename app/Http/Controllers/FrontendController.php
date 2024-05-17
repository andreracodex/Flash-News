<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Kabupaten;
use App\Models\Settings;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function frontend(Request $request){
        $settings = Settings::all();
        $category = Category::where('is_active', 1)->get();
        $kab = Kabupaten::where('is_active', 1)->where('jenis','=', 'Kabupaten')->get();
        $kota = Kabupaten::where('is_active', 1)->where('jenis','=', 'Kota')->get();
        return view('frontend.pages.content', compact('settings', 'category', 'kab', 'kota'));
    }

    public function contact(Request $request){
        $settings = Settings::all();
        $category = Category::where('is_active', 1)->get();
        $kab = Kabupaten::where('is_active', 1)->where('jenis','=', 'Kabupaten')->get();
        $kota = Kabupaten::where('is_active', 1)->where('jenis','=', 'Kota')->get();
        return view('frontend.pages.contact', compact('settings', 'category', 'kab', 'kota'));
    }

    public function category(Request $request){
        $settings = Settings::all();
        $category = Category::where('is_active', 1)->get();
        $kab = Kabupaten::where('is_active', 1)->where('jenis','=', 'Kabupaten')->get();
        $kota = Kabupaten::where('is_active', 1)->where('jenis','=', 'Kota')->get();
        return view('frontend.pages.category', compact('settings', 'category', 'kab', 'kota'));
    }
}
