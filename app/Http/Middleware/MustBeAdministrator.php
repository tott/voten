<?php

namespace App\Http\Middleware;

use Closure;
use App\Permissions;

class MustBeAdministrator
{
    use Permissions; 

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        abort_unless($this->mustBeAdministrator(request('channel_id')), 403);
        
        return $next($request);
    }
}
