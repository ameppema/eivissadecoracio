<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

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
        $locale = 'es';
        if(isset($request->route()->parameters()['locale'])){
            $locale = $request->route()->parameters()['locale'];
        }
        dump($locale);

        $this->isDefinedInSession('locale');

        $request->route()->forgetParameter('locale');
        return $next($request);
    }

    public function isDefinedInSession($session_var, $default_value = 'es'){
        if(session()->has($session_var)){
            App::setLocale(session()->get($session_var));
        }else {
            session()->put($session_var, $default_value);
            App::setLocale(session()->get($session_var));
        }
        return;
    }
}
