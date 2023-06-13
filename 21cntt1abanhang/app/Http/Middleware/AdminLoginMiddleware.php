<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;  

class AdminLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
     public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            $user=Auth::user();
            if($user->level==1 || $user->level==2){
                return $next($request);
            }
            else {
                return redirect('/tc');
            }
        }
        else {
            return redirect('admin/dangnhap');
        }
    }
}