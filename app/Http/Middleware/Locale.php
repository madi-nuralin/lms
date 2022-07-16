<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
	    //if (Session::has('applocale') AND array_key_exists(Session::get('applocale'), Config::get('app.locales'))) {
	    //
	if (Session::has('applocale')) {
            App::setLocale(Session::get('applocale'));
        }
        //else { // This is optional as Laravel will automatically set the fallback language if there is none specified
        //    App::setLocale(Config::get('app.fallback_locale'));
       // }
        return $next($request);
    }
}
