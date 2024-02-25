<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use App\Models\peminjamanModel;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index(){
        return view('dashboard');
    }
    public function show(Request $request) {
        $search = $request->search;

        $user = UserModel::where('email','LIKE','%'.$search.'%')->
                        orWhere('namalengkap','LIKE','%'.$search.'%')->
                        orWhere('alamat','LIKE','%'.$search.'%')->get();

        return view('user.user-read',['user' => $user]);
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'email' => 'required|max:99|email',
            'namalengkap' => 'required|max:50',
            'alamat' => 'required|max:50'
        ],[
            'email.required' => 'Email Tidak Boleh Kosong',
            'email.max' => 'Email Terlalu Panjang',
            'email.email' => 'Masukan Email Yang Benar',
            'namalengkap.required' => 'Nama Lengkap Tidak Boleh Kosong',
            'namalengkap.max' => 'Nama Lengkap Terlalu Panjang',
            'alamat.required' => 'alamat Tidak Boleh Kosong',
            'alamat.max' => 'alamat Terlalu Panjang',
        ]);
        UserModel::create($request->all());
        return redirect('/user');   
    }
    public function update($id) {
        $user = UserModel::find($id);
        return view('user.user-update',['user' => $user]);
    }
    public function edit(Request $request,$id) {
        $validated = $request->validate([
            'email' => 'required|max:30|email',
            'namalengkap' => 'required|max:50',
            'alamat' => 'required|max:50'
        ],[
            'email.required' => 'Email Tidak Boleh Kosong',
            'email.max' => 'Email Terlalu Panjang',
            'email.email' => 'Masukan Email Yang Benar',
            'namalengkap.required' => 'Nama Lengkap Tidak Boleh Kosong',
            'namalengkap.max' => 'Nama Lengkap Terlalu Panjang',
            'alamat.required' => 'alamat Tidak Boleh Kosong',
            'alamat.max' => 'alamat Terlalu Panjang',
        ]);

        $user = UserModel::find($id);
        $user->update($request->all());
        return redirect('/user');
        // dd($request->all());
    }
    public function destroy(Request $request, $id) {
    try {
        $user = UserModel::find($id);
        $user->delete();
        return redirect('/user');
    } catch (\Illuminate\Database\QueryException $e) {
        Session::flash('status', 'failed');
        return redirect('/user');
    }
    }
}


