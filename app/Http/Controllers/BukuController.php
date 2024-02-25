<?php

namespace App\Http\Controllers;

use App\Models\BukuModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BukuController extends Controller
{
    public function index(Request $request){
        $search = $request->search;

        $buku = BukuModel::where('judul','LIKE','%'.$search.'%')->
                        orWhere('penulis','LIKE','%'.$search.'%')->
                        orWhere('tahunterbit','LIKE','%'.$search.'%')->
                        orWhere('penerbit','LIKE','%'.$search.'%')->get();

        return view('buku.buku-read',['buku' => $buku]);
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'judul' => 'required|max:30',
            'penulis' => 'required|max:30',
            'penerbit' => 'required|max:50',
            'tahunterbit' => 'required|integer'
        ],[
            'judul.required' => 'Judul Tidak Boleh Kosong',
            'judul.max' => 'Judul Terlalu Panjang',
            'penulis.required' => 'Penulis Tidak Boleh Kosong',
            'penulis.max' => 'Penulis Terlalu Panjang',
            'penerbit.required' => 'penerbit Tidak Boleh Kosong',
            'tahunterbit.required' => 'tahun Tidak Boleh Kosong',
            'penerbit.max' => 'Penerbit Terlalu Panjang',
        ]);
        BukuModel::create($request->all());
        return redirect('/buku');   
    }
    public function update($id) {
        $buku = BukuModel::find($id);
        return view('buku.buku-update',['buku' => $buku]);
    }
    public function edit(Request $request,$id) {
        $validated = $request->validate([
            'judul' => 'required|max:30',
            'penulis' => 'required|max:30',
            'penerbit' => 'required|max:50',
            'tahunterbit' => 'required|integer'
        ],[
            'judul.required' => 'Judul Tidak Boleh Kosong',
            'judul.max' => 'Judul Terlalu Panjang',
            'penulis.required' => 'Penulis Tidak Boleh Kosong',
            'penulis.max' => 'Penulis Terlalu Panjang',
            'penerbit.required' => 'penerbit Tidak Boleh Kosong',
            'tahunterbit.required' => 'tahun Tidak Boleh Kosong',
            'penerbit.max' => 'Penerbit Terlalu Panjang',
        ]);

        $buku = bukuModel::find($id);
        $buku->update($request->all());
        return redirect('/buku');
        // dd($request->all());
    }
    public function destroy($id) {
        try {
            $buku = bukuModel::find($id);
            $buku->delete();
            return redirect('/buku');
        }  catch (\Illuminate\Database\QueryException $e) {
            Session::flash('status', 'failed');
            return redirect('/buku');
        }
    }
}
