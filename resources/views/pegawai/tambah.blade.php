<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pegawai</title>
</head>

<body>
    <form action="/pegawai/store" method="post">
        @csrf
        Nama
        <input type="text" name="nama" id="">
        jabatan
        <input type="text" name="jabatan" id="">
        umur
        <input type="number" name="umur" id="">
        Alamat
        <textarea name="alamat" id=""></textarea>
        <button type="submit">Tambah</button>
    </form>
</body>

</html>
