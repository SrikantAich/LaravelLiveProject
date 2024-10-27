<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function Login()
    {
        return view('LoginForm');
    }
    public function SignUp()
    {
        return view('SignUp');
    }
    public function TandC()
    {
        return view('TermsAndContitions');
    }


}
