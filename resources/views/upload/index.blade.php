<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Upload Gambar - File atau URL</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 50px auto;
        }

        .form-group {
            margin: 20px 0;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
        }

        input[type="file"],
        button {
            padding: 10px;
        }
    </style>
</head>

<body>

    <h2>Upload Gambar</h2>

    <form action="upload/proses" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Pilih file dari komputer:</label><br>
            <input type="file" name="gambar_file" accept="image/*">
        </div>

        <hr>
        <p><strong>Atau</strong></p>

        <div class="form-group">
            <label>Masukkan URL gambar:</label>
            <input type="text" name="gambar_url" placeholder="https://example.com/gambar.jpg">
        </div>

        <button type="submit" name="upload">Upload Gambar</button>
    </form>

</body>

</html>z
