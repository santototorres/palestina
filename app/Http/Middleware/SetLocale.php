<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Carbon\Carbon;
use Illuminate\Support\Facades\URL;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        $locale = $request->segment(1);

        // Ignore admin prefix or other non-localized routes if needed
        if ($locale === 'admin') {
            return $next($request);
        }

        $supportedLocales = ['it', 'fr', 'de', 'rm', 'en'];

        if (in_array($locale, $supportedLocales)) {
            App::setLocale($locale);
            Carbon::setLocale($locale);
            // This ensures URL helper automatically injects locale parameter
            URL::defaults(['locale' => $locale]);
        } else {
            // Default to 'it' (as specified by user)
            $fallback = config('app.fallback_locale', 'it');
            App::setLocale($fallback);
            Carbon::setLocale($fallback);
        }

        return $next($request);
    }
}
