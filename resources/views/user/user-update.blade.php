@extends('layouts.app')
@section('title','Tabel User')
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
  <form action="/user-{{$user->userid}}-update" method="post">
      @method('put')
      @csrf
  
      <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email</label>
          <input type="email" class="form-control" name="email" value="{{$user->email}}">
        </div>
      <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
          <input type="text" class="form-control" name="namalengkap" value="{{$user->namalengkap}}">
        </div>
      <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Alamat</label>
          <input type="text" class="form-control" name="alamat" value="{{$user->alamat}}">
        </div>
      <button type="submit" class="btn btn-success"> Update </button>
  
  </form>
</div>


@endsection