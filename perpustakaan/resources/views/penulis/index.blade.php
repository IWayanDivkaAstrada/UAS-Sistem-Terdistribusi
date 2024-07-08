@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Penulis</h1>
    <a href="{{ route('penulis.create') }}" class="btn btn-primary mb-3">Tambah Penulis Baru</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penulis as $penulis)
            <tr>
                <td>{{ $penulis->nama }}</td>
                <td>
                    <a href="{{ route('penulis.show', $penulis->id) }}" class="btn btn-info">Detail</a>
                    <a href="{{ route('penulis.edit', $penulis->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('penulis.destroy', $penulis->id) }}" method="POST" style="display:inline;">
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
