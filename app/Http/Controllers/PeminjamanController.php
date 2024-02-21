<?php

namespace App\Http\Controllers;

use App\Models\BukuModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use App\Models\peminjamanModel;

class PeminjamanController extends Controller
{
    public function index(Request $request){
        $search = $request->search;

        $userid = UserModel::all();
        $buku = BukuModel::all();
        $peminjaman = peminjamanModel::where('userid','LIKE','%'.$search.'%')->
                        orWhere('bukuid','LIKE','%'.$search.'%')->
                        orWhere('tanggalpeminjaman','LIKE','%'.$search.'%')->
                        orWhere('tanggalpengembalian','LIKE','%'.$search.'%')->
                        orWhere('statuspeminjaman','LIKE','%'.$search.'%')->get();

        return view('peminjaman.peminjaman-read',['peminjaman' => $peminjaman, 'userid' => $userid,'buku' => $buku]);
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'userid' => 'required|exists:user,userid',
            'bukuid' => 'required|exists:buku,bukuid',
            'tanggalpeminjaman' => 'required',
            'statuspeminjaman' => 'required'
        ]);
        peminjamanModel::create($request->all());
        return redirect('/peminjaman');   
    }
    public function update($id) {
        $peminjaman = peminjamanModel::find($id);
        return view('peminjaman.peminjaman-update',['peminjaman' => $peminjaman]);
    }
    public function edit(Request $request,$id) {
        $validated = $request->validate([
            'userid' => 'required|exists:user,userid',
            'bukuid' => 'required|exists:buku,bukuid',
            'tanggalpeminjaman' => 'required',
            'statuspeminjaman' => 'required'
        ]);

        $peminjaman = peminjamanModel::find($id);
        $peminjaman->update($request->all());
        return redirect('/peminjaman');
        // dd($request->all());
    }
    public function destroy($id) {
        $peminjaman = peminjamanModel::find($id);
        $peminjaman->delete();
        return redirect('/peminjaman');
    }
}
