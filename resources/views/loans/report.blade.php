@extends('layouts.app')

@section('title', 'Laporan Peminjaman')

@section('content')
    <h1>Laporan Peminjaman</h1>
    <p>Data diambil langsung dari <code>GET /api/loans</code>, bukan query database langsung.</p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Anggota</th>
                <th>Petugas</th>
                <th>Buku</th>
                <th>Tgl Pinjam</th>
                <th>Tgl Kembali</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($loans as $loan)
                <tr>
                    <td>{{ $loan['id'] }}</td>
                    <td>{{ $loan['member']['nama'] }}</td>
                    <td>{{ $loan['petugas']['name'] }}</td>
                    <td>
                        @foreach ($loan['books'] as $book)
                            {{ $book['judul'] }}@if (!$loop->last), @endif
                        @endforeach
                    </td>
                    <td>{{ $loan['tanggal_pinjam'] }}</td>
                    <td>{{ $loan['tanggal_kembali'] }}</td>
                    <td>{{ ucfirst($loan['status']) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Belum ada data peminjaman.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    @if ($meta && $meta['last_page'] > 1)
        <p>
            @if ($meta['current_page'] > 1)
                <a href="{{ route('loans.report', ['page' => $meta['current_page'] - 1]) }}">&laquo; Sebelumnya</a>
            @endif
            Halaman {{ $meta['current_page'] }} dari {{ $meta['last_page'] }}
            @if ($meta['current_page'] < $meta['last_page'])
                <a href="{{ route('loans.report', ['page' => $meta['current_page'] + 1]) }}">Selanjutnya &raquo;</a>
            @endif
        </p>
    @endif
@endsection