<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pegawai</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
</head>

<body>
    <h3>Data Pegawai</h3>

    <div class="grid">
        <a class="btn-primary" href="/pegawai/tambah"> + Tambah Pegawai Baru</a>
        <div><p>Cari Data Pegawai :</p>
        <form action="/pegawai/cari" method="GET" class="d-flex">
            <input type="text" name="cari" placeholder="Cari Pegawai .." value="{{ old('cari') }}" class="form-control me-2">
            <button type="submit" class="btn btn-primary">CARI</button>
        </form>
    </div>

    <br />
    <br />

    <table class="table">
        <tr>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Umur</th>
            <th>Alamat</th>
            <th>Opsi</th>
        </tr>
        @foreach($pegawai as $p)
            <tr>
                <td>{{ $p->pegawai_nama }}</td>
                <td>{{ $p->pegawai_jabatan }}</td>
                <td>{{ $p->pegawai_umur }}</td>
                <td>{{ $p->pegawai_alamat }}</td>
                <td>
                    <a href="/pegawai/edit/{{ $p->pegawai_id }}">Edit</a>
                    |
                    <a href="/pegawai/hapus/{{ $p->pegawai_id }}"
                        onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $pegawai->links() }}
</body>
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>

</html>
