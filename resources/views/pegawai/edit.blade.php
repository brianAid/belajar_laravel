<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pegawai</title>
</head>

<body>
    <form action="/pegawai/update" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $pegawai->pegawai_id }}">
        Nama
        <input type="text" name="nama" id="" value="{{ $pegawai->pegawai_nama }}">
        jabatan
        <input type="text" name="jabatan" value="{{ $pegawai->pegawai_jabatan }}" id="">
        umur
        <input type="number" name="umur" value="{{ $pegawai->pegawai_umur }}" id="">
        Alamat
        <textarea name="alamat" id="">{{ $pegawai->pegawai_alamat }}</textarea>
        <button type="submit">Tambah</button>
    </form>
</body>

</html>
