@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Buku</h1>
    <form action="{{ route('bukus.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" required>
        </div>
        <div class="form-group">
            <label for="penulis_id">Penulis</label>
            <select class="form-control" id="penulis_id" name="penulis_id" required>
                @foreach($penulises as $penulis)
                    <option value="{{ $penulis->id }}">{{ $penulis->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="isbn">ISBN</label>
            <input type="text" class="form-control" id="isbn" name="isbn" required>
        </div>
        <div class="form-group">
            <label for="tahun_terbit">Tahun Terbit</label>
            <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit" required>
        </div>
        <div class="form-group">
            <label for="image">Gambar</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
