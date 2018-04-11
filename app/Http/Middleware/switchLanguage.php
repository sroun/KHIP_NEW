<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Lang;

class switchLanguage
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

        if($request->session()->has('locale')){
            Lang::setLocale($request->session()->get('locale'));
        }else{
            Lang::setLocale('en');
        }

        return $next($request);
    }
}
