@extends('layouts.app')

@section('content')

<h1>Profil Saya</h1>

@if (session('success'))
    <div class="alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card">
    <h2>Informasi Akun</h2>

    <p>
        <strong>Nama:</strong>
        {{ auth()->user()->name }}
    </p>

    <p>
        <strong>Email:</strong>
        {{ auth()->user()->email }}
    </p>

    <p>
        <strong>Role:</strong>
        {{ ucfirst(auth()->user()->role) }}
    </p>
</div>

<hr>

<h2>Ganti Password</h2>

<form action="{{ route('profile.password.update') }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label for="current_password">Password Lama</label>
        <input
            type="password"
            name="current_password"
            id="current_password"
        >

        @error('current_password')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="password">Password Baru</label>
        <input
            type="password"
            name="password"
            id="password"
        >

        @error('password')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="password_confirmation">
            Konfirmasi Password Baru
        </label>

        <input
            type="password"
            name="password_confirmation"
            id="password_confirmation"
        >
    </div>

    <button type="submit">
        Ganti Password
    </button>
</form>

@endsection