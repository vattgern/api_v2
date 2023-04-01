<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Authorization
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response) $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::check()) {
            return response()->json([
                "error" => [
                    "code" => 403,
                    "message" => "Login failed!"
                ]
            ], 403, [ "Content-type" => "application/json" ]);
        }

        return $next($request);
    }
}
