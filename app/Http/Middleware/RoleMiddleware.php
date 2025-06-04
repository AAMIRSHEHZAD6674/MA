<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{

    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        if (!$user) {
            // Not logged in
            return redirect()->route('login');
        }

        if (!in_array($user->role, $roles)) {
            // Unauthorized
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
