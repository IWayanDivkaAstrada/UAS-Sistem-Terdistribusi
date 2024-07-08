@extends('layouts.peminjam')

@section('content')
<div class="container">
    <h1>Daftar Peminjam Buku</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nama Peminjam</th>
                <th>Buku Dipinjam</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Pengembalian</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($peminjamans as $item)
            <tr>
                <td>{{ $item->peminjam }}</td>
                <td>{{ $item->buku->judul }}</td>
                <td>{{ $item->tanggal_pinjam }}</td>
                <td>{{ $item->tanggal_kembali }}</td>
                <td>
                    <a href="{{ route('peminjaman.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('peminjaman.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
