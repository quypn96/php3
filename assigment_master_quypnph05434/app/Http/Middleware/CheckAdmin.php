<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CheckAdmin
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
        if ( Auth::user()->role < 500  ) {
            return redirect(route('dashboard'))->withErrors(['Bạn chưa đủ quyền truy cập vào mục này']);
        }
        return $next($request);
    }
}
