<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Check if locale parameter is in the request (e.g. ?lang=ar or /change-language/ar)
        if ($request->has('lang') && in_array($request->get('lang'), ['en', 'ar', 'fr'])) {
            session(['locale' => $request->get('lang')]);
        }

        // 2. Read locale from session or default to 'en'
        $locale = session('locale', config('app.locale', 'en'));
        if (!in_array($locale, ['en', 'ar', 'fr'])) {
            $locale = 'en';
        }

        app()->setLocale($locale);

        return $next($request);
    }
}
