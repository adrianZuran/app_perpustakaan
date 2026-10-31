@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1>Dashboard</h1>
    <p>Ringkasan statistik perpustakaan, diambil langsung dari <code>GET /api/stats</code>.</p>

    <div class="stats-grid">
        <div class="stat-card">
            <div class="value">{{ $stats['total_buku'] }}</div>
            <div class="label">Total Buku</div>
        </div>
        <div class="stat-card">
            <div class="value">{{ $stats['total_anggota'] }}</div>
            <div class="label">Total Anggota</div>
        </div>
        <div class="stat-card">
            <div class="value">{{ $stats['peminjaman_aktif'] }}</div>
            <div class="label">Peminjaman Aktif</div>
        </div>
    </div>

    <p style="margin-top: 24px;"><a href="{{ route('loans.report') }}" class="btn">Lihat Laporan Peminjaman</a></p>
@endsection