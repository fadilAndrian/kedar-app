<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ActionRole
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
        $userRole = auth()->user()->role_id;
        echo "role ini bernilai : ".$userRole;
        exit;
        return $next($request);
    }
}
