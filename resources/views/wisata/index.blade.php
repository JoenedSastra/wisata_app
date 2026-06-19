<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Wisata</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2 class="mb-4">Daftar Wisata</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('wisata.create') }}" class="btn btn-primary mb-3">
        Tambah Tempat Wisata
    </a>

    <table class="table table-bordered table-striped">

        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Tempat Wisata</th>
                <th>Lokasi</th>
                <th>Harga Tiket</th>
                <th>Deskripsi</th>
                <th width="180">Aksi</th>
            </tr>
        </thead>

        <tbody>

        @forelse($wisatas as $wisata)

            <tr>

                <td>{{ $loop->iteration }}</td>

                <td>{{ $wisata->nama_wisata }}</td>

                <td>{{ $wisata->lokasi }}</td>

                <td>Rp {{ number_format($wisata->harga_tiket,0,',','.') }}</td>

                <td>{{ $wisata->deskripsi }}</td>

                <td>

                    <a href="{{ route('wisata.edit', $wisata->id) }}"
                        class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form
                        action="{{ route('wisata.destroy', $wisata->id) }}"
                        method="POST"
                        style="display:inline;">

                        @csrf
                        @method('DELETE')

                        <button
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Hapus data ini?')">

                            Hapus

                        </button>

                    </form>

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="6" class="text-center">

                    Data belum tersedia.

                </td>

            </tr>

        @endforelse

        </tbody>

    </table>

</div>

</body>
</html>