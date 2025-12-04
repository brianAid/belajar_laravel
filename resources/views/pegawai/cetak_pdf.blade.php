<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Pegawai</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 3px solid #007bff;
            padding-bottom: 15px;
        }

        .header h2 {
            color: #333;
            font-weight: bold;
        }

        .header p {
            color: #666;
            margin: 5px 0;
        }

        table {
            background-color: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            border-radius: 5px;
            overflow: hidden;
        }

        table thead {
            background-color: #007bff;
            color: white;
        }

        table tr th {
            font-size: 11pt;
            font-weight: 600;
            padding: 12px;
            text-align: center;
        }

        table tr td {
            font-size: 10pt;
            padding: 10px 12px;
            border-color: #e0e0e0;
        }

        table tbody tr:nth-child(even) {
            background-color: #f5f5f5;
        }

        table tbody tr:hover {
            background-color: #e8f4f8;
        }

        .footer {
            text-align: right;
            margin-top: 30px;
            font-size: 9pt;
            color: #999;
        }
    </style>

    <div class="header">
        <h2>Laporan Data Pegawai</h2>
        <p>Tanggal: {{ date('d-m-Y H:i') }}</p>
    </div>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="25%">Nama</th>
                <th width="20%">Jabatan</th>
                <th width="10%">Umur</th>
                <th width="40%">Alamat</th>
            </tr>
        </thead>
        <tbody>
            @php $i = 1 @endphp
            @forelse($pegawai as $p)
                <tr>
                    <td class="text-center">{{ $i++ }}</td>
                    <td>{{ $p->pegawai_nama }}</td>
                    <td>{{ $p->pegawai_jabatan }}</td>
                    <td class="text-center">{{ $p->pegawai_umur }}</td>
                    <td>{{ $p->pegawai_alamat }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">Tidak ada data pegawai</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        <p>Laporan dihasilkan secara otomatis oleh sistem</p>
    </div>

</body>

</html>
