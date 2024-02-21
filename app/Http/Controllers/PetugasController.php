<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function index(){



        return view('login');
    }
    public function login(Request $request) {
       $login =  Petugas::where([
            ['email','=', $request->email ],
            ['password','=', $request->password ]
        ])->first();

        // dd($login);

        if ($login !== null) {
            return redirect('/user');
        }else{
            $request->session('status', 'Task was successful!');
            return redirect('/login');
        }
    }
}
