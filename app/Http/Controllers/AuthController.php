<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function getlogin()
    {
        return view('login');
    }
    public function doLogin(Request $request)
    {
        $credentials=[
            'password'=>md5($request->password),
            'status'=>1
        ];
        if(filter_var($request->username,FILTER_VALIDATE_EMAIL)){

            $credentials["email"]=$request->username;
        }
        else{
            $credentials["username"]=$request->username;
        }
        if(Auth::attempt($credentials))
        {   
            return redirect()->route('site.home');
        }
        else
        {
            return redirect()->route('website.getLogin')->with("message","đăng nhập không thành công");
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('site.home');
    }
}
