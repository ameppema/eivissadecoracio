<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

class Localization
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
        $locale = $request->route()->parameters()['locale'] ?? $this->sessionLocale();
        if(in_array($locale, ['es','en'])){
            session()->put('locale', $locale);
            App::setLocale($locale);
        }else {
            session()->put('locale', 'es');
            App::setLocale('es');
        }
        dump($locale);
        $request->route()->forgetParameter('locale');
        return $next($request);
    }

    public function sessionLocale(){
        $sessionLocale = '';
        if(session()->has('locale')){
            $sessionLocale = session()->get('locale');
        }else {
            $sessionLocale = 'es';
        };
        return $sessionLocale;
    }
}