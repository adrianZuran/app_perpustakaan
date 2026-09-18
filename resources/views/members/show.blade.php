@extends('layouts.app')

@section('title', 'Detail Member')

@section('content')

<h1>Detail Member</h1>
<a href="{{ route('members.index') }}">
    &larr; Kembali
</a>

<table>
    <tr>
        <th>Nama:</th>
        <td>{{ $member->nama }}</td>
    </tr>
    <tr>
        <th>NIM:</th>
        <td>{{ $member->nim }}</td>
    </tr>
    <tr>
        <th>Email:</th>
        <td>{{ $member->email }}</td>
    </tr>
    <tr>
        <th>Nomor Telepon: </th>
        <td>{{ $member->nomor_telepon }}</td>
    </tr>
    <tr>
        <th>Alamat:</th>
        <td>{{ $member->alamat }}</td>
    </tr>
    <tr>
        <th>Status:</th>
        <td>{{ $member->status }}</td>
    </tr>
</table>

@endsection
