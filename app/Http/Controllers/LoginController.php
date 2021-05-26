<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function postlogin (Request $request){
        if (Auth::guard('mahasiswa')->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect('/beranda');
        }
        else if(Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect('/beranda');
        }
        return redirect ('/');
    }

    public function logout (Request $request){
        if (Auth::guard('mahasiswa')->check()){
            Auth::guard('mahasiswa')->logout();
        }
        else if (Auth::guard('user')->check()){
            Auth::guard('user')->logout();
        }
        return redirect ('/');
    }
}
