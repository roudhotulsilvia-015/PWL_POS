<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrasi Pengguna</title>
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center"><h1><b>Admin</b>LTE</h1></div>
        <div class="card-body">
            <p class="login-box-msg">Daftar Akun Baru</p>
            
            <form action="{{ url('register') }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>
                </div>
                <div class="input-group mb-3">
                    <select name="level_id" class="form-control" required>
                        <option value="">-- Pilih Level --</option>
                        @foreach($level as $l)
                            <option value="{{ $l->level_id }}">{{ $l->level_nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Daftar</button>
            </form>
            <p class="mt-3 mb-0 text-center">
                <a href="{{ url('/login') }}">Sudah punya akun? Login</a>
            </p>
        </div>
    </div>
</div>
</body>
</html>