@extends('layouts.app')
@section('title','Tabel peminjaman')
@section('content')

{{-- <div>{{$userid}}</div> --}}

<div class="border p-3 mt-3">
<h1>Tabel peminjaman</h1>
<div class="d-flex">

  <div class="me-2">Search: </div>
  <form action="" method="get">
      <input type="text" name="search" class="form">
      <button type="submit" class="btn btn-primary">Search</button>
  </form>
</div>

  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary my-3 d-flex align-items-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Tambah
  </button>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<table class="table table-striped table-hover table-bordered">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">ID User</th>
        <th scope="col">ID Buku</th>
        <th scope="col">Tanggal Pinjam</th>
        <th scope="col">Tanggal Kembali</th>
        <th scope="col">Status Peminjaman</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($peminjaman as $item)        
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$item->userid}}</td>
      <td>{{$item->bukuid}}</td>
      <td>{{$item->tanggalpeminjaman}}</td>
      <td>{{$item->tanggalpengembalian}}</td>
      <td>{{$item->statuspeminjaman}}</td>
      <td>
        <div class="d-flex">

          <a href="/peminjaman-{{$item->peminjamanid}}-update" class="btn btn-success m-2"> Update</a>
  
          <form action="/peminjaman-{{$item->peminjamanid}}-delete" method="post">
          @method('delete')
          @csrf
          
              <button type="submit" class="btn btn-danger my-2">Hapus</button>
  
          </form>
        </div>

      </td>
    </tr>
    @endforeach
    </tbody>
</table>


  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Create peminjaman</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/peminjaman-create" method="post">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">ID User</label>
                    <select name="userid" id="" class="form-control">
                        <option value="">--Pilih--</option>
                        @foreach ($userid as $item)
                        <option>{{$item->userid}}</option>   
                        @endforeach
                    </select>

                    {{-- <input type="number" class="form-control" name="userid"> --}}
                  </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">ID Buku</label>
                    <select name="bukuid" id="" class="form-control">
                        <option value="">--Pilih--</option>
                        @foreach ($buku as $item)
                        <option>{{$item->bukuid}}</option>   
                        @endforeach
                    </select>                   

                    {{-- <input type="number" class="form-control" name="bukuid"> --}}
                  </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tanggal Pinjam</label>
                    <input type="date" class="form-control" name="tanggalpeminjaman">
                  </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tanggal Kembali</label>
                    <input type="date" class="form-control" name="tanggalpengembalian">
                  </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Status Peminjaman</label>
                    <select name="statuspeminjaman" id="" class="form-control">
                        <option value="Kembali">--Pilih--</option>
                        <option value="Kembali">Kembali</option>
                        <option value="Belum Kembali">Belum Kembali</option>
                    </select>
                  </div>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success"> Save </button>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection