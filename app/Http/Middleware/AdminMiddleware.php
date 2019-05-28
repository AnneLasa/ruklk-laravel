<?php

namespace App\Http\Middleware;


use App\Article;
use Closure;
use Illuminate\Contracts\Auth\Guard;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    protected $auth;
    public function __construct(Guard $auth){
        $this->auth = $auth;
    }
    public function handle($request, Closure $next)
    {
        // return $next($request);
        if ($this->auth->getUser()->type !== "admin") {
            return redirect('/');
        }
    }
}
