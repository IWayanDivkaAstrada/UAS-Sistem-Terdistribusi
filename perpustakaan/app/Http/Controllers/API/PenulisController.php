<?php

namespace App\Http\Controllers\API;

use App\Models\Penulis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PenulisController extends Controller
{
    public function index()
    {
        return Penulis::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        return Penulis::create($request->all());
    }

    public function show($id)
    {
        return Penulis::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $penulis = Penulis::findOrFail($id);

        $request->validate([
            'nama' => 'sometimes|required|string|max:255',
        ]);

        $penulis->update($request->all());

        return $penulis;
    }

    public function destroy($id)
    {
        $penulis = Penulis::findOrFail($id);
        $penulis->delete();

        return response()->json(['message' => 'Penulis deleted successfully']);
    }
}
