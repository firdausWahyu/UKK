@extends('layouts.app')
@section('title','Tabel Buku')
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
  <form action="/buku-{{$buku->bukuid}}-update" method="post">
      @method('put')
      @csrf
  
      <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Judul</label>
          <input type="text" class="form-control" name="judul" value="{{$buku->judul}}">
        </div>
      <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Penulis</label>
          <input type="text" class="form-control" name="penulis" value="{{$buku->penulis}}">
        </div>
      <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Penerbit</label>
          <input type="text" class="form-control" name="penerbit" value="{{$buku->penerbit}}">
        </div>
      <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Tahun Terbit</label>
          <input type="number" class="form-control" name="tahunterbit" value="{{$buku->tahunterbit}}">
        </div>
      <button type="submit" class="btn btn-success"> Update </button>
  
  </form>
</div>


@endsection