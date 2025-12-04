<!DOCTYPE html>
<html lang="en">

<head></head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Pegawai</title>
<link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Pegawai</a>
            <div class="d-flex ms-auto">
                <a href="{{ url('pegawai/tambah') }}" class="btn btn-success me-2">+ Tambah Pegawai</a>
                <form action="{{ url('pegawai/cari') }}" method="GET" class="me-2 d-flex">
                    <input type="text" name="cari" value="{{ old('cari') }}" class="form-control me-2"
                        placeholder="Cari Pegawai ..">
                    <button type="submit" class="btn btn-primary">CARI</button>
                </form>
                <a href="pegawai/cetak" class="btn btn-secondary">CETAK</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="mb-0">Daftar Pegawai</h5>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Umur</th>
                            <th>Alamat</th>
                            <th class="text-center">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pegawai as $p)
                            <tr>
                                <td>{{ $p->pegawai_nama }}</td>
                                <td>{{ $p->pegawai_jabatan }}</td>
                                <td>{{ $p->pegawai_umur }}</td>
                                <td>{{ $p->pegawai_alamat }}</td>
                                <td class="text-center">
                                    <a href="{{ url('pegawai/edit/' . $p->pegawai_id) }}"
                                        class="btn btn-sm btn-outline-primary">Edit</a>
                                    <a href="{{ url('pegawai/hapus/' . $p->pegawai_id) }}" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4">Tidak ada data pegawai.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="card-footer d-flex justify-content-center">
                {{ $pegawai->links() }}
            </div>
        </div>
    </div>

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
