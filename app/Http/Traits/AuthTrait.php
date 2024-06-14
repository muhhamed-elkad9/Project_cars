<?php

namespace App\Http\Traits;

use App\Providers\RouteServiceProvider;

trait AuthTrait
{
    public function chekGuard($request)
    {

        $guardName = 'web';
        return $guardName;
    }

    public function redirect($request)
    {

        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
