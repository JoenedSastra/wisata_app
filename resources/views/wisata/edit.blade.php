<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Wisata</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif; background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); min-height: 100vh; color: #2c3e50; }
        .container { max-width: 1200px; margin: 0 auto; padding: 2rem 1rem; }
        header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 1.5rem 0; box-shadow: 0 4px 12px rgba(0,0,0,0.15); margin-bottom: 2rem; }
        header h1 { font-size: 2rem; font-weight: 700; letter-spacing: -0.5px; }
        .page-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem; flex-wrap: wrap; gap: 1rem; }
        .page-header h2 { font-size: 1.875rem; font-weight: 700; color: #2c3e50; }
        .card { background: white; border-radius: 12px; padding: 2rem; box-shadow: 0 8px 24px rgba(0,0,0,0.1); border: 1px solid rgba(102,126,234,0.1); }
        .form-group { margin-bottom: 1.5rem; }
        .form-group label { display: block; margin-bottom: 0.5rem; font-weight: 600; color: #2c3e50; font-size: 0.95rem; }
        .form-group input, .form-group textarea { width: 100%; padding: 0.75rem 1rem; border: 2px solid #e9ecef; border-radius: 8px; font-family: inherit; font-size: 0.95rem; transition: border-color 0.3s ease, box-shadow 0.3s ease; }
        .form-group input:focus, .form-group textarea:focus { outline: none; border-color: #667eea; box-shadow: 0 0 0 3px rgba(102,126,234,0.1); }
        .form-group textarea { resize: vertical; min-height: 120px; }
        .form-actions { display: flex; gap: 1rem; margin-top: 2rem; justify-content: flex-start; }
        .form-actions .btn { padding: 0.75rem 2rem; }
        .btn { display: inline-flex; align-items: center; justify-content: center; padding: 0.75rem 1.5rem; border-radius: 8px; font-weight: 600; text-decoration: none; border: none; cursor: pointer; transition: all 0.3s ease; font-size: 0.95rem; }
        .btn-primary { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; box-shadow: 0 4px 12px rgba(102,126,234,0.3); }
        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 6px 20px rgba(102,126,234,0.4); }
        .btn-secondary { background: #e9ecef; color: #2c3e50; }
        .btn-secondary:hover { background: #dee2e6; }
        .alert { padding: 1rem 1.5rem; border-radius: 8px; margin-bottom: 1.5rem; border-left: 4px solid; color: #721c24; background-color: #f8d7da; border-left-color: #dc3545; margin-top: 0.5rem; display: block; }
        @media (max-width: 768px) {
            header h1 { font-size: 1.5rem; }
            .page-header { flex-direction: column; align-items: flex-start; }
            .page-header h2 { font-size: 1.5rem; }
            .form-actions { flex-direction: column; }
            .card { padding: 1.5rem; }
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
            <h2>Edit Tempat Wisata</h2>
        </div>

        <div class="card">
            <form action="{{ route('wisata.update', $wisata->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nama_wisata">Nama Tempat Wisata</label>
                    <input type="text" id="nama_wisata" name="nama_wisata" class="form-control" value="{{ $wisata->nama_wisata }}" required>
                    @error('nama_wisata')
                        <span class="alert alert-danger" style="margin-top: 0.5rem; display: block;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="lokasi">Lokasi</label>
                    <input type="text" id="lokasi" name="lokasi" class="form-control" value="{{ $wisata->lokasi }}" required>
                    @error('lokasi')
                        <span class="alert alert-danger" style="margin-top: 0.5rem; display: block;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="harga_tiket">Harga Tiket (Rp)</label>
                    <input type="number" id="harga_tiket" name="harga_tiket" class="form-control" value="{{ $wisata->harga_tiket }}" required>
                    @error('harga_tiket')
                        <span class="alert alert-danger" style="margin-top: 0.5rem; display: block;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" class="form-control" required>{{ $wisata->deskripsi }}</textarea>
                    @error('deskripsi')
                        <span class="alert alert-danger" style="margin-top: 0.5rem; display: block;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('wisata.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>