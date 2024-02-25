@extends('layouts.app')
@section('title','Tabel User')
@section('content')

<div class="border p-3 mt-3">
<h1>Tabel User</h1>
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
        User Tidak Bisa Di Hapus Karena Sedang Meminjam <strong>Buku</strong>
    </div>  
@endif
<table class="table table-striped table-hover table-bordered">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Email</th>
        <th scope="col">Nama Lengkap</th>
        <th scope="col">Alamat</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($user as $item)        
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$item->email}}</td>
      <td>{{$item->namalengkap}}</td>
      <td>{{$item->alamat}}</td>
      <td>
        <div class="d-flex">

          <a href="/user-{{$item->userid}}-update" class="btn btn-success m-2"> Update</a>
  
          <form action="/user-{{$item->userid}}-delete" method="post">
          @method('delete')
          @csrf
            {{-- <input type="hidden" value="{{}}"> --}}
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
          <h1 class="modal-title fs-5" id="exampleModalLabel">Create User</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/user-create" method="post">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email">
                  </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" name="namalengkap">
                  </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Alamat</label>
                    <input type="text" class="form-control" name="alamat">
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