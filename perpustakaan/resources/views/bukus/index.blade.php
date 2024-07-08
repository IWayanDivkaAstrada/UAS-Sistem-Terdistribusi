@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Buku</h1>
    <a href="{{ route('bukus.create') }}" class="btn btn-primary">Tambah Buku</a>
    <table class="table">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Penulis</th>
                <th>ISBN</th>
                <th>Tahun Terbit</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bukus as $buku)
                <tr>
                    <td>{{ $buku->judul }}</td>
                    <td>{{ $buku->penulis->nama }}</td>
                    <td>{{ $buku->isbn }}</td>
                    <td>{{ $buku->tahun_terbit }}</td>
                    <td>
                        @if($buku->image)
                            <img src="{{ asset($buku->image) }}" width="100">
                        @else
                            <span>Tidak ada gambar</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('bukus.show', $buku->id) }}" class="btn btn-info">Lihat</a>
                        <a href="{{ route('bukus.edit', $buku->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('bukus.destroy', $buku->id) }}" method="POST" style="display:inline;">
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
