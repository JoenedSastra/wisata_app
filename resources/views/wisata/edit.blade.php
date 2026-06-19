<!DOCTYPE html>
<html>
<head>

    <title>Edit Wisata</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

    <h2>Edit Data Wisata</h2>

    <form action="{{ route('wisata.update', $wisata->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label>Nama Wisata</label>

            <input
                type="text"
                name="nama_wisata"
                value="{{ $wisata->nama_wisata }}"
                class="form-control"
                required>

        </div>

        <div class="mb-3">

            <label>Lokasi</label>

            <input
                type="text"
                name="lokasi"
                value="{{ $wisata->lokasi }}"
                class="form-control"
                required>

        </div>

        <div class="mb-3">

            <label>Harga Tiket</label>

            <input
                type="number"
                name="harga_tiket"
                value="{{ $wisata->harga_tiket }}"
                class="form-control"
                required>

        </div>

        <div class="mb-3">

            <label>Deskripsi</label>

            <textarea
                name="deskripsi"
                class="form-control"
                rows="4"
                required>{{ $wisata->deskripsi }}</textarea>

        </div>

        <button class="btn btn-primary">

            Update

        </button>

        <a href="{{ route('wisata.index') }}" class="btn btn-secondary">

            Kembali

        </a>

    </form>

</div>

</body>
</html>