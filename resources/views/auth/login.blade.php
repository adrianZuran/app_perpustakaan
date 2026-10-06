@extends('layouts.app')

@section('title', 'Login')

@section('content')
<h1>📚 Login Perpustakaan</h1>

@if (session('success'))
    <div class="alert-success">{{ session('success') }}</div>
@endif

<form action="{{ route('login') }}" method="POST">
    @csrf

    <label for="email">Email</label>
    <input type="email" name="email" id="email" value="{{ old('email') }}" autofocus>
    @error('email')
        <div class="error">{{ $message }}</div>
    @enderror

    <label for="password">Password</label>
    <input type="password" name="password" id="password">
    @error('password')
        <div class="error">{{ $message }}</div>
    @enderror

    <div class="checkbox-row">
        <input type="checkbox" name="remember" id="remember">
        <label for="remember">Ingat saya</label>
    </div>

    <button type="submit" class="btn">Login</button>
</form>
@endsection