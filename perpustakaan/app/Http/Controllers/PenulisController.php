<?php

namespace App\Http\Controllers;

use App\Models\Penulis;
use Illuminate\Http\Request;

class PenulisController extends Controller
{
    public function index()
    {
        $penulis = Penulis::all();
        return view('penulis.index', compact('penulis'));
    }

    public function create()
    {
        return view('penulis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        Penulis::create($request->all());

        return redirect()->route('penulis.index')
            ->with('success', 'Penulis berhasil ditambahkan.');
    }

    public function show($id)
    {
        $penulis = Penulis::findOrFail($id);
        return view('penulis.show', compact('penulis'));
    }

    public function edit($id)
    {
        $penulis = Penulis::findOrFail($id);
        return view('penulis.edit', compact('penulis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        Penulis::findOrFail($id)->update($request->all());

        return redirect()->route('penulis.index')
            ->with('success', 'Penulis berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Penulis::findOrFail($id)->delete();

        return redirect()->route('penulis.index')
            ->with('success', 'Penulis berhasil dihapus.');
    }
}
