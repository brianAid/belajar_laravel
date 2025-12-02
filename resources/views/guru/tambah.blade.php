<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Guru</title>
</head>

<body>
    <form action="/guru/store" method="post">
        @csrf
        Nama
        <input type="text" name="nama" id="">
        Mapel
        <input type="text" name="mapel" id="">
        umur
        <input type="number" name="umur" id="">
        <button type="submit">Tambah</button>
    </form>
</body>

</html>