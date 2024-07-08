<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Penulis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    public function index()
    {
        $bukus = Buku::with('penulis')->get();
        return view('bukus.index', compact('bukus'));
    }

    public function create()
    {
        $penulises = Penulis::all();
        return view('bukus.create', compact('penulises'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penulis_id' => 'required|exists:penulis,id',
            'isbn' => 'required|unique:bukus,isbn',
            'tahun_terbit' => 'required|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('images', $fileName, 'public');
            $imagePath = 'storage/' . $path;
        }

        Buku::create([
            'judul' => $request->judul,
            'penulis_id' => $request->penulis_id,
            'isbn' => $request->isbn,
            'tahun_terbit' => $request->tahun_terbit,
            'image' => $imagePath,
        ]);

        return redirect()->route('bukus.index')->with('success', 'Buku berhasil ditambahkan');
    }

    public function show(Buku $buku)
    {
        return view('bukus.show', compact('buku'));
    }

    public function edit(Buku $buku)
    {
        $penulises = Penulis::all();
        return view('bukus.edit', compact('buku', 'penulises'));
    }

    public function update(Request $request, Buku $buku)
    {
        $request->validate([
            'judul' => 'sometimes|required',
            'penulis_id' => 'sometimes|required|exists:penulis,id',
            'isbn' => 'sometimes|required|unique:bukus,isbn,' . $buku->id,
            'tahun_terbit' => 'sometimes|required|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($buku->image) {
                Storage::delete('public/' . str_replace('storage/', '', $buku->image));
            }
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('images', $fileName, 'public');
            $buku->image = 'storage/' . $path;
        }

        $buku->update($request->only('judul', 'penulis_id', 'isbn', 'tahun_terbit', 'image'));

        return redirect()->route('bukus.index')->with('success', 'Buku berhasil diupdate');
    }

    public function destroy(Buku $buku)
    {
        if ($buku->image) {
            Storage::delete('public/' . str_replace('storage/', '', $buku->image));
        }
        $buku->delete();

        return redirect()->route('bukus.index')->with('success', 'Buku berhasil dihapus');
    }
}

