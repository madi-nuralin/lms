<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class LocaleController extends Controller
{
    public function switch($locale)
    {
	//if (array_key_exists($locale, Config::get('app.locales'))) {
	    app()->setLocale($locale);
	    Session::put('applocale', $locale);
        //}
        return redirect()->back();
    }
}
