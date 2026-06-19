<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Wisata</title>
    <link href="/build/assets/app.css" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif; background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); min-height: 100vh; color: #2c3e50; }
        .container { max-width: 1200px; margin: 0 auto; padding: 2rem 1rem; }
        header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 1.5rem 0; box-shadow: 0 4px 12px rgba(0,0,0,0.15); margin-bottom: 2rem; }
        header h1 { font-size: 2rem; font-weight: 700; letter-spacing: -0.5px; }
        .page-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem; flex-wrap: wrap; gap: 1rem; }
        .page-header h2 { font-size: 1.875rem; font-weight: 700; color: #2c3e50; }
        .btn { display: inline-flex; align-items: center; justify-content: center; padding: 0.75rem 1.5rem; border-radius: 8px; font-weight: 600; text-decoration: none; border: none; cursor: pointer; transition: all 0.3s ease; font-size: 0.95rem; }
        .btn-primary { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; box-shadow: 0 4px 12px rgba(102,126,234,0.3); }
        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 6px 20px rgba(102,126,234,0.4); }
        .btn-info { background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); color: white; }
        .btn-info:hover { transform: translateY(-2px); }
        .btn-danger { background: linear-gradient(135deg, #eb3349 0%, #f45c43 100%); color: white; }
        .btn-danger:hover { transform: translateY(-2px); }
        .btn-secondary { background: #e9ecef; color: #2c3e50; }
        .btn-secondary:hover { background: #dee2e6; }
        .btn-sm { padding: 0.5rem 1rem; font-size: 0.85rem; }
        .alert { padding: 1rem 1.5rem; border-radius: 8px; margin-bottom: 1.5rem; border-left: 4px solid; }
        .alert-success { background-color: #d4edda; color: #155724; border-left-color: #28a745; }
        .table-responsive { overflow-x: auto; border-radius: 12px; }
        table { width: 100%; border-collapse: collapse; background: white; }
        table thead { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; }
        table thead th { padding: 1.25rem 1rem; text-align: left; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; font-size: 0.85rem; }
        table tbody td { padding: 1.25rem 1rem; border-bottom: 1px solid #e9ecef; }
        table tbody tr:hover { background-color: #f8f9ff; }
        table tbody tr:last-child td { border-bottom: none; }
        .action-buttons { display: flex; gap: 0.5rem; flex-wrap: wrap; }
        .card { background: white; border-radius: 12px; padding: 2rem; box-shadow: 0 8px 24px rgba(0,0,0,0.1); border: 1px solid rgba(102,126,234,0.1); }
        .empty-state { text-align: center; padding: 4rem 2rem; color: #64748b; }
        .empty-state-icon { font-size: 4rem; margin-bottom: 1rem; }
        .empty-state h3 { font-size: 1.5rem; color: #2c3e50; margin-bottom: 0.5rem; }
        @media (max-width: 768px) {
            header h1 { font-size: 1.5rem; }
            .page-header { flex-direction: column; align-items: flex-start; }
            .page-header h2 { font-size: 1.5rem; }
            table { font-size: 0.9rem; }
            table thead th, table tbody td { padding: 0.75rem 0.5rem; }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Tempat Wisata Indonesia</h1>
        </div>
    </header>

    <div class="container">
        <div class="page-header">
            <h2>Daftar Tempat Wisata</h2>
            <a href="{{ route('wisata.create') }}" class="btn btn-primary">
                Tambah Tempat Wisata
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                <strong>Berhasil!</strong> {{ session('success') }}
            </div>
        @endif

        @forelse($wisatas as $wisata)
            @if($loop->first)
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th style="width: 5%;">No</th>
                        <th style="width: 20%;">Nama Wisata</th>
                        <th style="width: 20%;">Lokasi</th>
                        <th style="width: 15%;">Harga Tiket</th>
                        <th style="width: 25%;">Deskripsi</th>
                        <th style="width: 15%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
            @endif
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><strong>{{ $wisata->nama_wisata }}</strong></td>
                        <td>{{ $wisata->lokasi }}</td>
                        <td><strong>Rp {{ number_format($wisata->harga_tiket,0,',','.') }}</strong></td>
                        <td>{{ Str::limit($wisata->deskripsi, 50) }}</td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('wisata.edit', $wisata->id) }}" class="btn btn-info btn-sm">
                                    Edit
                                </a>
                                <form action="{{ route('wisata.destroy', $wisata->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
            @if($loop->last)
                </tbody>
            </table>
        </div>
            @endif
        @empty
            <div class="card">
                <div class="empty-state">
                    <h3>Belum ada data wisata</h3>
                    <p>Mulai tambahkan tempat wisata favorit Anda sekarang!</p>
                    <a href="{{ route('wisata.create') }}" class="btn btn-primary" style="margin-top: 1rem;">
                        Tambah Wisata Pertama
                    </a>
                </div>
            </div>
        @endforelse
    </div>
</body>
</html>