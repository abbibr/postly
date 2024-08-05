<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function change_lang($lang){
        App::setLocale($lang);

        Session::put('lang', $lang);

        return back();
    }
}
