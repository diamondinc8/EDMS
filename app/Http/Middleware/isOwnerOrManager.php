<?php

namespace App\Http\Middleware;

use App\Models\Company;
use App\Models\CompanyRole;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isOwnerOrManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user_id = Auth::id();
        $isOwnerOrManager = CompanyRole::where('user_id', $user_id)->where('role_id', 1)->exists() || CompanyRole::where('user_id', $user_id)->where('role_id', 2)->exists();
        if ($isOwnerOrManager) {
            return $next($request);
        }
        return redirect()->route('index');
    }
}
