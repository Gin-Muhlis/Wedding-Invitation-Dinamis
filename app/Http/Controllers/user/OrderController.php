<?php

namespace App\Http\Controllers\user;

use App\Models\Theme;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function order(Request $request, $code)
    {
        $themes = Theme::all();
        $choicedTheme = null;

        foreach ($themes as $theme) {
            if (password_verify($theme->theme_code, $code)) {
                $choicedTheme = $theme;
            }
        }

        if (is_null($choicedTheme)) {
            abort(404);
            die();
        }

        return view('order', [
            'theme' => $choicedTheme
        ]);
    }

    public function make(Request $request)
    {
        dd($request);
    }
}
