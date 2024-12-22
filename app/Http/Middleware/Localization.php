<?php

namespace App\Http\Middleware;

use Closure;
use App\Helpers\General;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $language = General::getPreferedLang();
        if($language){
            app()->setlocale($language);
            Carbon::setLocale($language);
        }
        return $next($request);
    }
}
