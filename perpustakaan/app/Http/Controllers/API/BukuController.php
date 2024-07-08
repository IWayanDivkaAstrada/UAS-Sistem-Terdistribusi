<?php

namespace App\Http\Controllers\API;

use App\Models\Buku;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    public function index()
    {
        return Buku::all();
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

        $buku = Buku::create([
            'judul' => $request->judul,
            'penulis_id' => $request->penulis_id,
            'isbn' => $request->isbn,
            'tahun_terbit' => $request->tahun_terbit,
            'image' => $imagePath,
        ]);

        return response()->json($buku, 201);
    }

    public function show($id)
    {
        return Buku::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);

        $request->validate([
            'judul' => 'sometimes|required',
            'penulis_id' => 'sometimes|required|exists:penulis,id',
            'isbn' => 'sometimes|required|unique:bukus,isbn,' . $buku->id,
            'tahun_terbit' => 'sometimes|required|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        \Log::info('Request Data: ', $request->all());

        if ($request->hasFile('image')) {

            if ($buku->image) {
                Storage::delete('public/' . $buku->image);
            }

            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('images', $fileName, 'public');
            $buku->image = 'storage/' . $path;
        }


        $buku->judul = $request->get('judul', $buku->judul);
        $buku->penulis_id = $request->get('penulis_id', $buku->penulis_id);
        $buku->isbn = $request->get('isbn', $buku->isbn);
        $buku->tahun_terbit = $request->get('tahun_terbit', $buku->tahun_terbit);
        $buku->save();

        return response()->json($buku);
    }

    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        if ($buku->image) {
            Storage::delete('public/' . $buku->image);
        }
        $buku->delete();

        return response()->json(['message' => 'Buku deleted successfully']);
    }
}

