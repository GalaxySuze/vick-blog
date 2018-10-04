<?php

namespace App\Http\Controllers\Backstage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController
{
    public function login()
    {
        return view('backstage.login');
    }
}
