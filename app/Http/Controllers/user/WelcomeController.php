<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Catgory;
use App\Models\Faq;
use App\Models\Fitur;
use App\Models\Testimony;
use App\Models\Theme;
use App\Models\Website;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        // !mengambil semua data yang diperlukan halaman utama
        $data_website = Website::latest()->first();
        $data_fitur = Fitur::all();
        $data_category = Catgory::with('fiturCategories')->get();
        $data_katalog['theme_with_foto'] = Theme::where('type', 'pakai foto')->get();
        $data_katalog['theme_without_foto'] = Theme::where('type', 'tanpa foto')->get();
        $data_testimonies = Testimony::all();
        $data_faqs = Faq::all();

        return view('welcome', compact('data_website', 'data_fitur', 'data_category', 'data_katalog', 'data_testimonies', 'data_faqs'));
    }
}
