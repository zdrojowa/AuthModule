<?php

namespace Zdrojowa\AuthModule\Http\Controllers;

use Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Zdrojowa\AuthModule\AuthModule;
use Zdrojowa\AuthModule\Http\Requests\LoginRequest;

/**
 * Class LoginController
 * @package Zdrojowa\AuthModule\Http\Controllers
 */
class LoginController extends Controller
{
    use ThrottlesLogins;

    /**
     *
     */
    public function showLoginForm()
    {
        return AuthModule::view('Login');
    }

    /**
     * @param LoginRequest $request
     *
     * @return RedirectResponse|void
     * @throws ValidationException
     */
    public function login(LoginRequest $request)
    {
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        //dd($this->attemptLogin($request));

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * @param Request $request
     *
     * @return mixed
     */
    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt($this->credentials($request), $request->has(AuthModule::remember()));
    }

    /**
     * @param Request $request
     * @param $user
     */
    protected function authenticated(Request $request, $user)
    {

    }

    /**
     * @param Request $request
     *
     * @return array
     */
    protected function credentials(Request $request)
    {
        return $request->only($this->username(), AuthModule::password());
    }

    /**
     * @param Request $request
     *
     * @return RedirectResponse
     */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        return $this->authenticated($request, $this->guard()->user()) ? : redirect()->intended(AuthModule::redirectAfterLogin());
    }

    protected function username() {
        return AuthModule::username();
    }

    /**
     * @param Request $request
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            'auth' => [AuthModule::lang('auth.failed')],
        ]);
    }

    /**
     * @return mixed
     */
    protected function guard()
    {
        return Auth::guard();
    }
}
