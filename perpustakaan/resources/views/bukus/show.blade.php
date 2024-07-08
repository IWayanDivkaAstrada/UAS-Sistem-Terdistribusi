@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Buku</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $buku->judul }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{ $buku->penulis->nama }}</h6>
            <p class="card-text">ISBN: {{ $buku->isbn }}</p>
            <p class="card-text">Tahun Terbit: {{ $buku->tahun_terbit }}</p>
            <img src="{{ asset('storage/' . $buku->image) }}" width="200">
            <a href="{{ route('bukus.index') }}" class="btn btn-secondary mt-2">Kembali</a>
        </div>
    </div>
</div>
@endsection
