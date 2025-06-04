<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        if (session()->has('locale')) {
            $locale = session('locale');
        } elseif (auth()->check() && auth()->user()->current_lang) {
            $locale = auth()->user()->current_lang;
            session(['locale' => $locale]);
        } else {
            $locale = 'ar';
            session(['locale' => 'ar']);
        }

        App::setLocale($locale);
        return $next($request);
    }
}
