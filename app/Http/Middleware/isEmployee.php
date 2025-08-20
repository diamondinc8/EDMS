<?php

namespace App\Http\Middleware;

use App\Models\CompanyRole;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class isEmployee
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user_id = Auth::id();
        $isEmployee = CompanyRole::where('founder_id', $user_id)->exists();
        if ($isEmployee) {
            return redirect()->route('home');
        }
        return $next($request);
    }
}
