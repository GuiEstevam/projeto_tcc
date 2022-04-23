<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AlunoAccess
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
        if(auth()->check() AND auth()->user()->aluno){
        return $next($request);
    }
    dd ('Acesso negado, voce não é um aluno');
    }
}
