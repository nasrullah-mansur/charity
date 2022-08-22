<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SetLanguageController extends Controller
{
    public function setLanguage($lang)
    {
        session()->put('lang', $lang);
        return redirect()->back();
    }
}
