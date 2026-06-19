<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;

class WisataController extends Controller
{
    /**
     * Menampilkan semua data wisata
     */
    public function index()
    {
        $wisatas = Wisata::latest()->get();

        return view('wisata.index', compact('wisatas'));
    }

    /**
     * Menampilkan form tambah wisata
     */
    public function create()
    {
        return view('wisata.create');
    }

    /**
     * Menyimpan data wisata
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_wisata' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'harga_tiket' => 'required|numeric',
            'deskripsi' => 'required|string',
        ]);

        Wisata::create([
            'nama_wisata' => $request->nama_wisata,
            'lokasi' => $request->lokasi,
            'harga_tiket' => $request->harga_tiket,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('wisata.index')
            ->with('success', 'Data wisata berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit
     */
    public function edit($id)
    {
        $wisata = Wisata::findOrFail($id);

        return view('wisata.edit', compact('wisata'));
    }

    /**
     * Mengupdate data wisata
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_wisata' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'harga_tiket' => 'required|numeric',
            'deskripsi' => 'required|string',
        ]);

        $wisata = Wisata::findOrFail($id);

        $wisata->update([
            'nama_wisata' => $request->nama_wisata,
            'lokasi' => $request->lokasi,
            'harga_tiket' => $request->harga_tiket,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('wisata.index')
            ->with('success', 'Data wisata berhasil diperbarui.');
    }

    /**
     * Menghapus data wisata
     */
    public function destroy($id)
    {
        $wisata = Wisata::findOrFail($id);

        $wisata->delete();

        return redirect()->route('wisata.index')
            ->with('success', 'Data wisata berhasil dihapus.');
    }
}