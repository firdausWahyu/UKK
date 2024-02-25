@extends('layouts.app')
@section('title','Tabel Peminjaman')
@section('content')

<div class="border p-3 mt-3">

  <h3>Update</h3>
  @if ($errors->any())
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif
  <form action="/peminjaman-{{$peminjaman->peminjamanid}}-update" method="post">
      @method('put')
      @csrf
  
      <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">ID User</label>
          <input type="number" class="form-control" name="userid" value="{{$peminjaman->userid}}">
        </div>
      <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">ID Buku</label>
          <input type="number" class="form-control" name="bukuid" value="{{$peminjaman->bukuid}}">
        </div>
      <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Tanggal Pinjam</label>
          <input type="date" class="form-control" name="tanggalpeminjaman" value="{{$peminjaman->tanggalpeminjaman}}">
        </div>
      <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Tanggal Kembali</label>
          <input type="date" class="form-control" name="tanggalpengembalian" value="{{$peminjaman->tanggalpengembalian}}">
        </div>
      <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Status Peminjaman</label>
          <select name="statuspeminjaman" class="form-control">
            @if ($peminjaman->statuspeminjaman == 'Kembali')
                <option value="Kembali">
                  Kembali
                </option>
              @else
                <option value=" Belum Kembali">
                  Belum Kembali
                </option>
              @endif
              @if ($peminjaman->statuspeminjaman !== 'Kembali')
              <option value="Kembali">
                Kembali
              </option>
              @else
              <option value=" Belum Kembali">

                Belum Kembali
              </option>
              @endif
          </select>
        </div>
      <button type="submit" class="btn btn-success"> Update </button>
  
  </form>
</div>


@endsection