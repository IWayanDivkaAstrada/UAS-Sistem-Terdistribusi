@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Penulis</h1>
    <p><strong>Nama:</strong> {{ $penulis->nama }}</p>
    <a href="{{ route('penulis.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
