<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah data user</title>
</head>
<body>
<h1>Form Tambah Data User</h1>
{{--<a href="{{route('/user')}}">Kembali</a>--}}
<form method="post" action="{{route('/user/tambah_simpan')}}">
    {{csrf_field()}}
    <label>Username</label>
    <input type="text" name="username" placeholder="Masukan Username">
    <br>
    <label>Nama</label>
    <input type="text" name="nama" placeholder="Masukan Nama">
    <br>
    <label>Password</label>
    <input type="password" name="password" placeholder="Masukan Password">
    <br>
    <label>Level ID</label>
    <input type="number" name="level_id">
    <br>
    <input type="submit" name="btn btn-success" value="Simpan">
</form>
</body>
</html>
