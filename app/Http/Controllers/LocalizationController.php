<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LocalizationController extends Controller
{
    public function lang($locale = 'es'){
        if(in_array($locale, ['es','en'])){
            App::setLocale($locale);
            session()->put('locale', $locale);
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
}
