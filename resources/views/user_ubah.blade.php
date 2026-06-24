<body>
    <h1>Form Ubah Data User</h1>
    <a href="/user">Kembali</a>
    <br><br>

    <form method="post" action="/user/ubah_simpan/{{ $data->user_id }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <label>Username</label>
        <input type="text" name="username" placeholder="Masukan Username" value="{{ $data->username }}">
        <br>
        <label>Nama</label>
        <input type="text" name="nama" placeholder="Masukan Nama" value="{{ $data->nama }}">
        <br>
        <label>Password</label>
        <input type="password" name="password" placeholder="Masukan Password" value="{{ $data->password }}">
        <br>
        <label>Level ID</label>
        <input type="number" name="level_id" placeholder="Masukan ID Level" value="{{ $data->level_id }}">
        <br><br>
        <label>Foto Profil</label>
        <br>
        @if(!empty($data->foto))
            <img src="{{ url('storage/fotos/'.$data->foto) }}" alt="avatar" style="max-width:120px;max-height:120px;border:1px solid #ddd;padding:4px;margin-bottom:8px;" />
            <br>
        @endif
        <input type="file" name="foto" accept="image/*">
        <br><br>
        <input type="submit" class="btn btn-success" value="Ubah">
    </form>
</body>