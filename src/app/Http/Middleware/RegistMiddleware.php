<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

class RegistMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */


    public function handle(Request $request, Closure $next)
    {
      // dd($request);
      // dd($request);
      $request=\App::make(RegisterRequest::class);
   //    $request=[
   //       'email' => $input['email'],
   //       'password' => Hash::make($input['password']),
   //   ];
      // dd($request);
        return $next($request);
    }
}
