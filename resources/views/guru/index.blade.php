<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Guru</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
</head>

<body>
    <div class="container py-4">
        <div class="d-flex align-items-center mb-3">
            <h3 class="me-auto">Data Guru</h3>

            <a class="btn btn-primary me-2" href="/guru/tambah">+ Tambah Guru Baru</a>
            <a class="btn btn-danger" href="/guru/trash">Tong Sampah</a>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <form action="/guru" method="GET" class="d-flex gap-2">
                    <input type="text" name="cari" placeholder="Cari Guru .." value="{{ old('cari') }}"
                        class="form-control">
                    <button type="submit" class="btn btn-outline-primary">CARI</button>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Nama</th>
                                <th>Jabatan / Mapel</th>
                                <th>Umur</th>
                                <th style="width: 160px">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($guru as $p)
                                <tr>
                                    <td>{{ $p->nama }}</td>
                                    <td>{{ $p->mapel }}</td>
                                    <td>{{ $p->umur }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-secondary" href="/guru/edit/{{ $p->id }}">Edit</a>
                                        <a class="btn btn-sm btn-outline-danger"
                                           href="/guru/hapus/{{ $p->id }}"
                                           onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-3">Tidak ada data guru.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card-footer d-flex justify-content-end">
                {{ $guru->links() }}
            </div>
        </div>
    </div>

    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
</body>

</html>
