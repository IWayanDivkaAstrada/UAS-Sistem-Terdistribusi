<?php

namespace App\Http\Controllers\API;

use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PeminjamanController extends Controller
{
    public function index()
    {
        return Peminjaman::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'buku_id' => 'required|exists:bukus,id',
            'peminjam' => 'required|string|max:255',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'nullable|date|after_or_equal:tanggal_pinjam',
        ]);

        return Peminjaman::create($request->all());
    }

    public function show($id)
    {
        return Peminjaman::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        $request->validate([
            'buku_id' => 'sometimes|required|exists:bukus,id',
            'peminjam' => 'sometimes|required|string|max:255',
            'tanggal_pinjam' => 'sometimes|required|date',
            'tanggal_kembali' => 'nullable|date|after_or_equal:tanggal_pinjam',
        ]);

        $peminjaman->update($request->all());

        return $peminjaman;
    }

    public function destroy($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();

        return response()->json(['message' => 'Peminjaman deleted successfully']);
    }
}
