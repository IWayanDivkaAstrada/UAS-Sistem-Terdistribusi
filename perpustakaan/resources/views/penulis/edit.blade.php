@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Penulis</h1>
    <form action="{{ route('penulis.update', $penulis->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama Penulis:</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $penulis->nama }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
