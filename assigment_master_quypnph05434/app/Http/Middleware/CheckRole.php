<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckRole
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
        if(Auth::user()->role <= 1){
            return redirect(route('forbiden'))->withErrors('Bạn không đủ quyền vào trang này');
        }
        return $next($request);
    }
}
