<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Session;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        Session::put('previousUrl', $request->url());

        // if (! $request->expectsJson()) {
        //     if($request->path() == 'checkout') {
        //         return route('user.signin');
        //     } else {
        //         abort(404);
        //     }
        // }
        return route('user.signin');
    }
}
