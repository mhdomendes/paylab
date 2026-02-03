<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AssinaturaAtiva
{
    public function handle($request, Closure $next)
    {
        if (!auth()->user()?->possuiAssinaturaAtiva()) {
            return redirect()->route('planos.index');
        }

        return $next($request);
    }
}