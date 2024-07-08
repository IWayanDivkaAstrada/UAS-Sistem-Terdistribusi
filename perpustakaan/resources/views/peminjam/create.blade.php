@extends('layouts.peminjam')

@section('content')
<div class="container">
    <h1>Tambah Peminjaman Buku</h1>
    <form action="{{ route('peminjaman.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="buku_id">Buku</label>
            <select class="form-control" id="buku_id" name="buku_id">
                @foreach($bukus as $buku)
                    <option value="{{ $buku->id }}">{{ $buku->judul }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="peminjam">Nama Peminjam</label>
            <input type="text" class="form-control" id="peminjam" name="peminjam" required>
        </div>
        <div class="form-group">
            <label for="tanggal_pinjam">Tanggal Pinjam</label>
            <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" required>
        </div>
        <div class="form-group">
            <label for="tanggal_kembali">Tanggal Kembali</label>
            <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
