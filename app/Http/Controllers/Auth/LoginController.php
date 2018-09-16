<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * @param Request $request
     */
    protected function validateLogin(Request $request)
    {
        $this->validate($request, $this->validateRules(), $this->validateMessages());
    }

    /**
     * @return array
     */
    protected function validateRules()
    {
        return [
            $this->username() => 'required|email|max:50',
            'password' => 'required|max:50',
            'captcha' => 'required|captcha'
        ];
    }

    /**
     * @return array
     */
    protected function validateMessages()
    {
        $userName = $this->username();
        return [
            $userName . '.required' => '请输入邮箱。',
            $userName . '.email' => '邮箱格式错误。',
            $userName . '.max' => '邮箱长度不能超过50个字符。',
            'password.required' => '请输入密码。',
            'password.max' => '密码长度不能超过50个字符。',
            'captcha.required' => '请输入验证码。',
            'captcha.captcha' => '验证码不匹配。',
        ];
    }
}
