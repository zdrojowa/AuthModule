<?php

namespace Zdrojowa\AuthModule;


use Illuminate\Support\Facades\Lang;
use Zdrojowa\CmsKernel\Contracts\Modules\Module;

/**
 * @method static name()
 * @method static loginPath()
 * @method static remember()
 * @method static username()
 * @method static password()
 * @method static redirectAfterLogin()
 * @method static redirectAfterRegister()
 * @method static displayName()
 * @method static userModel()
 */
class AuthModule extends Module
{

    public static function view(string $view, array $data = []) {
        return view(self::prefix($view), $data);
    }

    public static function lang(string $lang) {
        return Lang::get(self::prefix($lang));
    }

    public static function prefix(string $toPrefix) {
        return AuthModule::name().'::'.$toPrefix;
    }
}
