@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Buku</h1>
    <form action="{{ route('bukus.update', $buku->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" value="{{ $buku->judul }}" required>
        </div>
        <div class="form-group">
            <label for="penulis_id">Penulis</label>
            <select class="form-control" id="penulis_id" name="penulis_id" required>
                @foreach($penulises as $penulis)
                    <option value="{{ $penulis->id }}" {{ $buku->penulis_id == $penulis->id ? 'selected' : '' }}>{{ $penulis->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="isbn">ISBN</label>
            <input type="text" class="form-control" id="isbn" name="isbn" value="{{ $buku->isbn }}" required>
        </div>
        <div class="form-group">
            <label for="tahun_terbit">Tahun Terbit</label>
            <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit" value="{{ $buku->tahun_terbit }}" required>
        </div>
        <div class="form-group">
            <label for="image">Gambar</label>
            <input type="file" class="form-control" id="image" name="image">
            @if ($buku->image)
                <img src="{{ asset('storage/' . $buku->image) }}" width="100" class="mt-2">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
