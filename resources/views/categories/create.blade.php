@extends('layouts.app')

@section('title', 'Daftar Kategori')

@section('content')
<h1>Tambah Kategori</h1>
<p><a href="{{ route('categories.index') }}">&larr; Kembali ke daftar kategori</a></p>

<form action="{{ route('categories.store') }}" method="POST">
    @csrf

    <label for="nama_kategori">Nama Kategori</label>
    <input type="text" name="nama_kategori" id="nama_kategori" value="{{ old('nama_kategori') }}">
    @error('nama_kategori')
        <div class="error">{{ $message }}</div>
    @enderror

    <label for="deskripsi">Deskripsi (opsional)</label>
    <textarea name="deskripsi" id="deskripsi" rows="4">{{ old('deskripsi') }}</textarea>
    @error('deskripsi')
        <div class="error">{{ $message }}</div>
    @enderror

    <button type="submit" class="btn">Simpan</button>
</form>
@endsection