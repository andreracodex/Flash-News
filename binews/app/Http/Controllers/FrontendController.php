<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Kabupaten;
use App\Models\Settings;
use App\Models\StatisPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FrontendController extends Controller
{
    public function frontend(Request $request){
        $settings = Settings::all();
        $category = Category::where('is_active', 1)->get();

        $articles = Http::get('http://172.18.0.5:5000/articles');
        $all = $articles->json();

        $feat = Http::get('http://172.18.0.5:5000/featured');
        $featured = $feat->json();

        $kab = Kabupaten::where('is_active', 1)->where('jenis','=', 'Kabupaten')->get();
        $kota = Kabupaten::where('is_active', 1)->where('jenis','=', 'Kota')->get();
        return view('frontend.pages.content', compact('settings', 'category', 'kab', 'kota', 'all', 'featured'));
    }

    public function iklan(Request $request){
        $settings = Settings::all();
        $category = Category::where('is_active', 1)->get();
        $kab = Kabupaten::where('is_active', 1)->where('jenis','=', 'Kabupaten')->get();
        $kota = Kabupaten::where('is_active', 1)->where('jenis','=', 'Kota')->get();
        $statispage = StatisPage::all();
        return view('frontend.pages.iklan', compact('settings', 'category', 'kab', 'kota', 'statispage'));
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

    public function pedoman(Request $request){
        $settings = Settings::all();
        $category = Category::where('is_active', 1)->get();
        $kab = Kabupaten::where('is_active', 1)->where('jenis','=', 'Kabupaten')->get();
        $kota = Kabupaten::where('is_active', 1)->where('jenis','=', 'Kota')->get();
        $statispage = StatisPage::all();
        return view('frontend.pages.pedoman', compact('settings', 'category', 'kab', 'kota', 'statispage'));
    }

    public function tentang(Request $request){
        $settings = Settings::all();
        $category = Category::where('is_active', 1)->get();
        $kab = Kabupaten::where('is_active', 1)->where('jenis','=', 'Kabupaten')->get();
        $kota = Kabupaten::where('is_active', 1)->where('jenis','=', 'Kota')->get();
        $statispage = StatisPage::all();
        return view('frontend.pages.tentang', compact('settings', 'category', 'kab', 'kota', 'statispage'));
    }

    public function redaksi(Request $request){
        $settings = Settings::all();
        $category = Category::where('is_active', 1)->get();
        $kab = Kabupaten::where('is_active', 1)->where('jenis','=', 'Kabupaten')->get();
        $kota = Kabupaten::where('is_active', 1)->where('jenis','=', 'Kota')->get();
        $statispage = StatisPage::all();
        return view('frontend.pages.redaksi', compact('settings', 'category', 'kab', 'kota', 'statispage'));
    }

    public function ketentuan(Request $request){
        $settings = Settings::all();
        $category = Category::where('is_active', 1)->get();
        $kab = Kabupaten::where('is_active', 1)->where('jenis','=', 'Kabupaten')->get();
        $kota = Kabupaten::where('is_active', 1)->where('jenis','=', 'Kota')->get();
        $statispage = StatisPage::all();
        return view('frontend.pages.ketentuan', compact('settings', 'category', 'kab', 'kota', 'statispage'));
    }
}
