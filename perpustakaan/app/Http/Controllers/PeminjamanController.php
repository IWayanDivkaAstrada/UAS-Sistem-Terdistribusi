<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjamans = Peminjaman::all();
        return view('peminjam.index', compact('peminjamans'));
    }

    public function create()
    {
        $bukus = Buku::all();
        return view('peminjam.create', compact('bukus'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'buku_id' => 'required',
            'peminjam' => 'required',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date',
        ]);
    
        // Simpan data baru
        Peminjaman::create($request->all());
    
        // Redirect dengan pesan sukses
        return redirect()->route('peminjaman.index')
            ->with('success', 'Peminjaman berhasil ditambahkan.');
    }
    
    public function edit($id)
    {
        // Mengambil data peminjaman berdasarkan ID
        $peminjaman = Peminjaman::findOrFail($id);
        // Mengambil semua buku untuk dropdown pilihan buku
        $bukus = Buku::all();
        
        return view('peminjam.edit', compact('peminjaman', 'bukus'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'buku_id' => 'required',
            'peminjam' => 'required',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date',
        ]);

        // Update data yang ada
        Peminjaman::findOrFail($id)->update($request->all());

        // Redirect dengan pesan sukses
        return redirect()->route('peminjaman.index')
            ->with('success', 'Peminjaman berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Hapus data
        Peminjaman::findOrFail($id)->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('peminjaman.index')
            ->with('success', 'Peminjaman berhasil dihapus.');
    }
}
