<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    protected $redirectTo = '/user/dashboard';

    /**
     * Create a new password controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware());
    }

    /**
     * @param null $token
     * @return $this
     */
    public function getReset($token = null)
    {
        if (is_null($token))
        {
            throw new NotFoundHttpException;
        }

        return view('frontend.auth.passwords.reset')->with('token', $token);
    }
}
