<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guru</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
</head>

<body>
    <h3>Data Guru</h3>

    <div class="grid">
        <a class="btn-primary" href="/guru/tambah"> + Tambah Guru Baru</a>
        <div>
            <p>Cari Data Guru :</p>
            <form action="/guru" method="GET" class="d-flex">
                <input type="text" name="cari" placeholder="Cari Guru .." value="{{ old('cari') }}"
                    class="form-control me-2">
                <button type="submit" class="btn btn-primary">CARI</button>
            </form>
        </div>

        <br />
        <br />

        <table class="table table-striped">
            <tr>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Umur</th>
                <th>Opsi</th>
            </tr>
            @foreach($guru as $p)
                <tr>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->mapel }}</td>
                    <td>{{ $p->umur }}</td>
                    <td>
                        <a href="/guru/edit/{{ $p->id }}">Edit</a>
                        |
                        <a href="/guru/hapus/{{ $p->id }}"
                            onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $guru->links() }}
</body>
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>

</html>
