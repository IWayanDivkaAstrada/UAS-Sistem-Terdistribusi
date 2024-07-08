<?php

namespace App\Http\Controllers;

use App\Models\Penulis;
use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PerpustakaanController extends Controller
{
    public function index()
    {
        $buku = Buku::with('penulis')->get();
        return view('perpustakaan.index', compact('buku'));
    }

    public function showBuku($id)
    {
        $buku = Buku::with('penulis')->findOrFail($id);
        return view('perpustakaan.showBuku', compact('buku'));
    }

    public function createPeminjaman(Request $request)
    {
        $request->validate([
            'buku_id' => 'required|exists:buku,id',
            'peminjam' => 'required|string|max:255',
            'tanggal_pinjam' => 'required|date',
        ]);

        Peminjaman::create($request->all());

        return redirect()->route('perpustakaan.index')->with('success', 'Buku berhasil dipinjam!');
    }
}

