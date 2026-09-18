@extends('layouts.app')

@section('title', 'Daftar Member')

@section('content')
<h1>Tambah Member</h1>
<p><a href="{{ route('members.index') }}">&larr; Kembali ke daftar Member</a></p>

<form action="{{ route('members.store') }}" method="POST">
    @csrf

    <label for="nama">Nama</label>
        <input
            type="text"
            name="nama"
            id="nama"
            value="{{ old('nama') }}"
        >

        @error('nama')
            <div class="error">{{ $message }}</div>
        @enderror


        <label for="nim">NIM</label>
        <input
            type="text"
            name="nim"
            id="nim"
            value="{{ old('nim') }}"
        >

        @error('nim')
            <div class="error">{{ $message }}</div>
        @enderror


        <label for="email">Email</label>
        <input
            type="email"
            name="email"
            id="email"
            value="{{ old('email') }}"
        >

        @error('email')
            <div class="error">{{ $message }}</div>
        @enderror


        <label for="nomor_telepon">Nomor Telepon</label>
        <input
            type="text"
            name="nomor_telepon"
            id="nomor_telepon"
            value="{{ old('nomor_telepon') }}"
        >

        @error('nomor_telepon')
            <div class="error">{{ $message }}</div>
        @enderror


        <label for="alamat">Alamat</label>
        <textarea
            name="alamat"
            id="alamat"
            rows="4"
        >{{ old('alamat') }}</textarea>

        @error('alamat')
            <div class="error">{{ $message }}</div>
        @enderror


        <label for="status">Status</label>
        <select name="status" id="status">
            <option value="">-- Pilih Status --</option>

            <option value="aktif" @selected(old('status') == 'aktif')>
                Aktif
            </option>

            <option value="nonaktif" @selected(old('status') == 'nonaktif')>
                Nonaktif
            </option>
        </select>

        @error('status')
            <div class="error">{{ $message }}</div>
        @enderror


        <button type="submit" class="btn">
            Simpan
        </button>
    </form>
</form>
@endsection