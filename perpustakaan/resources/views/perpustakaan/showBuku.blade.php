<!DOCTYPE html>
<html>
<head>
    <title>{{ $buku->judul }}</title>
</head>
<body>
    <h1>{{ $buku->judul }}</h1>
    <p>Penulis: {{ $buku->penulis->nama }}</p>
    <p>ISBN: {{ $buku->isbn }}</p>
    <p>Tahun Terbit: {{ $buku->tahun_terbit }}</p>
    <p>
        <img src="{{ $buku->gambar }}" alt="{{ $buku->judul }}" width="200">
    </p>
    <h2>Peminjaman</h2>
    <form action="{{ route('perpustakaan.createPeminjaman') }}" method="POST">
        @csrf
        <input type="hidden" name="buku_id" value="{{ $buku->id }}">
        <label for="peminjam">Nama Peminjam:</label>
        <input type="text" name="peminjam" required>
        <label for="tanggal_pinjam">Tanggal Pinjam:</label>
        <input type="date" name="tanggal_pinjam" required>
        <button type="submit">Pinjam Buku</button>
    </form>
</body>
</html>
