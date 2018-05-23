<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\App;
use Closure;

class CheckLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $language = $request->hasCookie('manaValoda') ?  Crypt::decrypt(Cookie::get('manaValoda')) : App::getLocale();
      //  die($language);
        if (!App::isLocale($language) && in_array($language,config('language.lang_available'))) {   App::setLocale($language);    }
        return $next($request);
    }
}
