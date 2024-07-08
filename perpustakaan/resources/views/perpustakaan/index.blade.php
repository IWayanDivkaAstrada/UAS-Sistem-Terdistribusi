@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Buku</h1>
    <table class="book-table">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Gambar</th>
                <th>Penulis</th>
                <th>Tahun Terbit</th>
                <th>ISBN</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($buku as $item)
            <tr>
                <td><a>{{ $item->judul }}</a></td>
                <td><img src="{{ asset('images/' . $item->gambar) }}" alt="{{ $item->judul }}" class="book-cover"></td>
                <td>{{ $item->penulis->nama }}</td>
                <td>{{ $item->tahun_terbit }}</td>
                <td>{{ $item->isbn }}</td>
                <td><a href="{{ route('peminjam.create') }}" class="btn">Meminjam</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

<style>
.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
}

.book-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.book-table th,
.book-table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

.book-table th {
    background-color: #f2f2f2;
    font-weight: bold;
}

.book-table tr:nth-child(even) {
    background-color: #f9f9f9;
}

.book-table tr:hover {
    background-color: #f1f1f1;
}

.book-cover {
    width: 50px;
    height: auto;
    border-radius: 5px;
}

.btn {
    background-color: #4CAF50;
    color: white;
    padding: 5px 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.btn:hover {
    background-color: #45a049;
}
</style>