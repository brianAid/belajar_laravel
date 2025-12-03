<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guru - Terhapus</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
</head>

<body>
    <div class="container mt-4"></div>
    <h3>Data Guru (Terhapus)</h3>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <a class="btn btn-primary" href="/guru">Kembali</a>
        </div>

        <form action="/guru" method="GET" class="d-flex">
            <input type="text" name="cari" placeholder="Cari Guru .." value="{{ old('cari') }}"
                class="form-control me-2">
            <button type="submit" class="btn btn-primary">CARI</button>
        </form>
    </div>

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
                    <form action="/guru/restore/{{ $p->id }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-success"
                            onclick="return confirm('Pulihkan data ini?')">Pulihkan</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {{ $guru->links() }}
    </div>

    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
</body>

</html>