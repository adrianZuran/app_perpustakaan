@extends('layouts.app')

@section('title', 'Edit Member')

@section('content')

<h1>Edit Member</h1>
<p><a href="{{ route('members.index') }}">&larr; Kembali ke daftar Member</a></p>

<form action="{{ route('members.update', $member['id']) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="nama">Nama</label>
    <input
        type="text"
        name="nama"
        id="nama"
        value="{{ old('nama', $member->nama) }}"
    >
    
    @error('nama')
        <div class="error">{{ $message }}</div>
    @enderror
    
    
    <label for="nim">NIM</label>
    <input
        type="text"
        name="nim"
        id="nim"
        value="{{ old('nim', $member->nim) }}"
    >
    
    @error('nim')
        <div class="error">{{ $message }}</div>
    @enderror
    
    
    <label for="email">Email</label>
    <input
        type="email"
        name="email"
        id="email"
        value="{{ old('email', $member->email) }}"
    >
    
    @error('email')
        <div class="error">{{ $message }}</div>
    @enderror
    
    
    <label for="nomor_telepon">Nomor Telepon</label>
    <input
        type="text"
        name="nomor_telepon"
        id="nomor_telepon"
        value="{{ old('nomor_telepon', $member->nomor_telepon) }}"
    >
    
    @error('nomor_telepon')
        <div class="error">{{ $message }}</div>
    @enderror
    
    
    <label for="alamat">Alamat</label>
    <textarea
        name="alamat"
        id="alamat"
        rows="4"
    >{{ old('alamat', $member->alamat) }}</textarea>
    
    @error('alamat')
        <div class="error">{{ $message }}</div>
    @enderror
    
    
    <label for="status">Status</label>
    <select name="status" id="status">
        <option value="">-- Pilih Status --</option>
    
        <option value="aktif"
            @selected(old('status', $member->status) == 'aktif')>
            Aktif
        </option>
    
        <option value="nonaktif"
            @selected(old('status', $member->status) == 'nonaktif')>
            Nonaktif
        </option>
    </select>
    
    @error('status')
        <div class="error">{{ $message }}</div>
    @enderror
    
    
    <button type="submit" class="btn">Perbarui</button>
</form>



@endsection