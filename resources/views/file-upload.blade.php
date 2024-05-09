<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .image-container {
            max-width: 500px;
            margin: auto;
            text-align: center;
        }

        .image-container img {
            max-width: 100%;
            height: auto;
            margin-top: 20px;
        }
    </style>
    <title>File Upload</title>
</head>
<body>
<div class="container mt-3">
    <h2>File Upload</h2>
    <hr>
    <form action="{{ url('file-upload') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="nama_file" class="form-label">Nama File</label>
            <input type="text" class="form-control" id="nama_file" name="nama_file">
        </div>

        <div class="mb-3">
            <label for="berkas" class="form-label">Gambar Profile</label>
            <input type="file" class="form-control" id="berkas" name="berkas">
            @error('berkas')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary my-2">Upload</button>
    </form>
</div>

<div class="image-container">
    @if(isset($pathBaru))
        <h3>Gambar yang Diunggah</h3>
        <h5>Nama File: {{ basename($pathBaru) }}</h5>
        <img src="{{ $pathBaru }}" alt="Gambar">
    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
