<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Validator;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers {
        login as traitLogin;
    }

    use ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/user/dashboard';

    /**
     * Defining guard name.
     *
     * @var string
     */
    protected $guard = 'user';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct ()
    {
        $this->middleware ( $this->guestMiddleware (), ['except' => 'logout'] );
    }

    /**
     * Show User login view.
     *
     * @return view
     */
    public function showLoginForm ()
    {
        return view ( 'frontend.auth.login' );
    }

    public function login ( Request $request )
    {
        $field = filter_var ( $request->get ( 'login' ), FILTER_VALIDATE_EMAIL ) ? 'email' : 'username';
        $request->merge ( [$field => $request->get ( 'login' )] );
        $this->username = $field;

        return $this->traitLogin ( $request );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function store ( UserCreateRequest $request )
    {
        User::create ( [
            'slug'       => str_slug ( $request->get ( 'username' ) ),
            'first_name' => $request->get ( 'first_name' ),
            'username'   => $request->get ( 'username' ),
            'last_name'  => $request->get ( 'last_name' ),
            'email'      => $request->get ( 'email' ),
            'password'   => bcrypt ( $request->get ( 'password' ) ),
        ] );

        return redirect ()->back ()->withSuccess ( 'Registration Successful' );
    }
}
