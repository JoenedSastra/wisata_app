<!DOCTYPE html>
<html>
<head>

    <title>Tambah Wisata</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

    <h2>Tambah Data Wisata</h2>

    <form action="{{ route('wisata.store') }}" method="POST">

        @csrf

        <div class="mb-3">

            <label>Nama Wisata</label>

            <input
                type="text"
                name="nama_wisata"
                class="form-control"
                required>

        </div>

        <div class="mb-3">

            <label>Lokasi</label>

            <input
                type="text"
                name="lokasi"
                class="form-control"
                required>

        </div>

        <div class="mb-3">

            <label>Harga Tiket</label>

            <input
                type="number"
                name="harga_tiket"
                class="form-control"
                required>

        </div>

        <div class="mb-3">

            <label>Deskripsi</label>

            <textarea
                name="deskripsi"
                class="form-control"
                rows="4"
                required></textarea>

        </div>

        <button class="btn btn-success">

            Simpan

        </button>

        <a href="{{ route('wisata.index') }}" class="btn btn-secondary">

            Kembali

        </a>

    </form>

</div>

</body>
</html>