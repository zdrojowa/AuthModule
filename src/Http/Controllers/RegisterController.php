<?php

namespace Zdrojowa\AuthModule\Http\Controllers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Zdrojowa\AuthModule\AuthModule;
use Zdrojowa\AuthModule\Http\Requests\RegisterRequest;

/**
 * Class RegisterController
 * @package Zdrojowa\AuthModule\Http\Controllers
 */
class RegisterController extends Controller
{

    /**
     * @return Factory|View
     */
    public function showRegisterForm()
    {
        return AuthModule::view('Register');
    }

    /**
     * @param RegisterRequest $request
     *
     * @return RedirectResponse|Redirector
     */
    public function register(RegisterRequest $request)
    {
        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user) ?: redirect(AuthModule::redirectAfterRegister());
    }

    /**
     * @return mixed
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * @param Request $request
     * @param $user
     */
    protected function registered(Request $request, $user)
    {

    }

    protected function create(array $data) {
        return app(AuthModule::userModel())::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }
}
