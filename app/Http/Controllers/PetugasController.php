<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PetugasController extends Controller
{
    public function index(){
        return view('login');
    }
    public function login(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ],[
            'email.required' => 'Email wajib di isi',
            'password.required' => 'Password wajib di isi',
        ]);
        $Login = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        
        if (Auth::attempt($Login)) {
            return redirect('/');
        }else {
            Session::flash('status4', 'failed');
            return redirect('/login');
        }
    }
    function logout(Request $request) {
        Auth::logout();
    return redirect('/login')->with('status2','logout');
    }
}
