<?php

namespace App\Actions\Fortify;

use Laravel\Fortify\Contracts\LoginViewResponse as LoginViewResponseContract;

class LoginResponse implements LoginViewResponseContract
{
    /**
     * Create an HTTP response that represents the login view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Support\Responsable
     */
    public function toResponse($request)
    {
        return view('auth.login'); // Make sure this view exists
    }
}
