<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getRegister()
    {
        return view("auth.register");
    }

    public function postRegister(RegisterRequest $request)
    {
        $inputs = $request->only('username', 'email', 'password');

        try{
            User::create($inputs);

            session()->flash('alert_status', 'success');
            session()->flash('alert_message', 'Kayıt yapıldı');
        }catch(Exception $err){
            session()->flash('alert_status', 'error');
            session()->flash('alert_message', 'Kayıt yapılamadı');
        }

        return redirect('/');
    }

    public function getLogin()
    {
        return view("auth.login");
    }

    public function postLogin(LoginRequest $request)
    {
        $inputs = $request->only('email', 'password');

        if(Auth::attempt($inputs)){
            session()->flash('alert_status', 'success');
            session()->flash('alert_message', 'Giriş Yapıldı');

            return redirect('/');
        }

        session()->flash('alert_status', 'error');
        session()->flash('alert_message', 'Email veya parola hatalı');

        return redirect('/giris-yap')->withInput();
    }

    public function postLogout()
    {
        Auth::logout();
        
        session()->flash('alert_status', 'success');
        session()->flash('alert_message', 'Çıkış Yapıldı');

        return redirect('/');
    }
}
