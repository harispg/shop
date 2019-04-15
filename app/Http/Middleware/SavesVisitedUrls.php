<?php

namespace App\Http\Middleware;

use Closure;

class SavesVisitedUrls
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
        $response = $next($request);
        $visitedPaths = session()->has('visitedPaths') ? session('visitedPaths') : [];
        $currentLink = request()->path(); // Getting current URI like 'category/books/'
        array_unshift($visitedPaths, $currentLink); // Putting it in the beginning of visitedPaths array
        session(['visitedPaths' => $visitedPaths]); // Saving visitedPaths array to the session
        return $response;
    }

}
