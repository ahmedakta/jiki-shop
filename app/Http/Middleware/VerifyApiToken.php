<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->header('Authorization');

        if ($token != 'bd3e1aed20a036fad49dd1d4486b63ef187edbf3460664e6535642db4fb09ed9') { // this is my local verify unique ID
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
