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

    public function setNewUrl(Request $request, $locale){
        $request->route()->setParameter('locale', $locale); //new parameter value
        $parameters = Route::current()->Parameters();
        $uri = Route::current()->uri();
        $uri = substr($uri, 0, strpos($uri, '/{'));
        dd($uri);
        $full_url = $request->fullUrl();
        $full_url = substr($full_url, 0, strpos($full_url, $uri));
        $full_url = $full_url.$uri.'/'.implode('/',$parameters);
        return $full_url;
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


/* App::setLocale($locale);

session()->put('locale', $locale); */

/*     public function handle(Request $request, Closure $next)
    {
        $locale = 'es';
        if(isset($request->route()->parameters()['locale'])){
            $locale = $request->route()->parameters()['locale'];
            $this->isDefinedInSession2('locale', $locale);
        }
        dump($locale);


        $request->route()->forgetParameter('locale');
        return $next($request);
    }

    public function isDefinedInSession($session_var = 'locale', $define_value = 'es'){

        App::setLocale($define_value);
        session()->put($session_var, $define_value);
        dump($session_var);
        return;
    }
    public function isDefinedInSession2($session_var = 'locale', $define_value = 'es'){
        if(session()->has($session_var)){
            App::setLocale(session()->get($session_var));
        }else {
            App::setLocale($define_value);
            session()->put($session_var, $define_value);
        }
        dump($session_var);
        return;
    } */