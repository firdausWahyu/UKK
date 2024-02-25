<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title') </title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    {{-- session --}}
    @if (Session::has('status4'))
    <div class=" d-flex align-items-center justify-content-center mt-2">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Login Gagal</strong> Email atau Password Salah
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>  
    </div>
    @endif      
{{-- session --}}

    {{-- session --}}
    @if (Session::has('status2'))
    <div class=" d-flex align-items-center justify-content-center mt-2">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Anda Telah Melakukan <strong>Logout</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>  
    </div>
    @endif      
{{-- session --}}
<div class="cotainer">
    <div class="d-flex justify-content-center align-items-center flex-c">
        <form action="/login" method="post" class="border p-3 my-3">
            @csrf
            <h2 class="text-center">Login</h2>
        <label for="" class="form-label">Email</label>
        <input type="email" name="email" value="farel@gmail.com" class="form-control">
        <label for="" class="form-label">Password</label>
        <input type="password" name="password" value="123" class="form-control">
        <button type="submit" class="btn btn-success form-control my-3"> Login </button>
        </form>
    </div>
</div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
