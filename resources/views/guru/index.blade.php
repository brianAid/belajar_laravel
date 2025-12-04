<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Guru</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Guru</a>
            <div class="d-flex ms-auto">
                <a href="{{ url('guru/tambah') }}" class="btn btn-success me-2">+ Tambah Guru</a>
                <form action="{{ url('guru/cari') }}" method="GET" class="me-2 d-flex">
                    <input type="text" name="cari" value="{{ old('cari') }}" class="form-control me-2"
                        placeholder="Cari Guru ..">
                    <button type="submit" class="btn btn-primary">CARI</button>
                </form>
                <button type="button" class="me-2 btn btn-success mr-5" data-bs-toggle="modal"
                    data-bs-target="#importExcel">
                    IMPORT EXCEL
                </button>

                <!-- Import Excel -->
                <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form method="post" action="/guru/import_excel" enctype="multipart/form-data">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                                </div>
                                <div class="modal-body">

                                    {{ csrf_field() }}

                                    <label>Pilih file excel</label>
                                    <div class="form-group">
                                        <input type="file" name="file" required="required">
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Import</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <a href="{{ url('guru/export') }}" class="btn btn-secondary">EXPORT</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="mb-0">Daftar Guru</h5>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Umur</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($guru as $p)
                            <tr>
                                <td>{{ $p->nama ?? '-' }}</td>
                                <td>{{ $p->mapel ?? '-' }}</td>
                                <td>{{ $p->umur ?? '-' }}</td>
                                <td class="text-center">
                                    <a href="{{ url('guru/edit/' . $p->id) }}"
                                        class="btn btn-sm btn-outline-primary">Edit</a>
                                    <a href="{{ url('guru/hapus/' . $p->id) }}" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-4">Tidak ada data guru.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="card-footer d-flex justify-content-center">
                {{ $guru->links() }}
            </div>
        </div>
    </div>

    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
</body>

</html>
