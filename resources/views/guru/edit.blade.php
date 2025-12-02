<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Guru</title>
</head>

<body>
    <form action="/guru/update" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $guru->id }}">
        Nama
        <input type="text" name="nama" id="" value="{{ $guru->nama }}">
        jabatan
        <input type="text" name="jabatan" value="{{ $guru->mapel }}" id="">
        umur
        <input type="number" name="umur" value="{{ $guru->umur }}" id="">
        <button type="submit">Tambah</button>
    </form>
</body>

</html>
