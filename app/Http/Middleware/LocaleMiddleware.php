<?php

namespace App\Http\Middleware;

use App;
use URL;
use Closure;
use Illuminate\Http\Request;

class LocaleMiddleware
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
        // Check locale
        if (!in_array(request('locale'), ['ar','en'])) abort(404);

        // Set locale
        App::setlocale(request('locale'));

        // Set default routes locale
        URL::defaults(['locale' => request('locale')]);

        return $next($request);
    }
}
