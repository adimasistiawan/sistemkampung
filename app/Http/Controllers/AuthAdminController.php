<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
class AuthAdminController extends Controller
{
    public function login(Request $request){
        
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('dashboard');
        }
        else{
            return redirect()->back()->with('message','Email atau Password salah');
        }
    }

    public function logout() {
        Auth::guard('admin')->logout();
        return redirect()->route('login.admin');
    }
}
