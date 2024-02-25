@extends('layouts.app')
@section('title','Tabel Buku')
@section('content')

<div class="border p-3 mt-3">
<h1>Tabel buku</h1>
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

@if (Session::has('status'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Buku Tidak Bisa Di Hapus Karena Sedang Dipinjam <strong>User</strong>
    </div>  
@endif

<table class="table table-striped table-hover table-bordered">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">judul</th>
        <th scope="col">Penulis</th>
        <th scope="col">Penerbit</th>
        <th scope="col">Tahun Terbit</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($buku as $item)        
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$item->judul}}</td>
      <td>{{$item->penulis}}</td>
      <td>{{$item->penerbit}}</td>
      <td>{{$item->tahunterbit}}</td>
      <td>
        <div class="d-flex">

          <a href="/buku-{{$item->bukuid}}-update" class="btn btn-success m-2"> Update</a>
  
          <form action="/buku-{{$item->bukuid}}-delete" method="post">
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
          <h1 class="modal-title fs-5" id="exampleModalLabel">Create buku</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/buku-create" method="post">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Judul</label>
                    <input type="text" class="form-control" name="judul">
                  </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Penulis</label>
                    <input type="text" class="form-control" name="penulis">
                  </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Penerbit</label>
                    <input type="text" class="form-control" name="penerbit">
                  </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tahun Terbit</label>
                    <input type="number" class="form-control" name="tahunterbit">
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