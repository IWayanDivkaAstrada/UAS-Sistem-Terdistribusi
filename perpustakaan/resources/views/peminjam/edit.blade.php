@extends('layouts.peminjam')

@section('content')
<div class="container">
    <h1>Edit Peminjaman Buku</h1>
    <form action="{{ route('peminjaman.update', $peminjaman->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="buku_id">Buku:</label>
            <select class="form-control" id="buku_id" name="buku_id">
                @foreach ($bukus as $buku)
                    <option value="{{ $buku->id }}" {{ $peminjaman->buku_id == $buku->id ? 'selected' : '' }}>{{ $buku->judul }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="peminjam">Nama Peminjam:</label>
            <input type="text" class="form-control" id="peminjam" name="peminjam" value="{{ $peminjaman->peminjam }}">
        </div>
        <div class="form-group">
            <label for="tanggal_pinjam">Tanggal Pinjam:</label>
            <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" value="{{ $peminjaman->tanggal_pinjam }}">
        </div>
        <div class="form-group">
            <label for="tanggal_kembali">Tanggal Kembali:</label>
            <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" value="{{ $peminjaman->tanggal_kembali }}">
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
