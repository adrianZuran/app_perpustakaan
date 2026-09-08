<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemberRequest;

class MemberController extends Controller
{
    private array $members = [
        [
            'id' => 1,
            'nama' => 'Budi Santoso',
            'nim' => '3123500001',
            'email' => 'budi@gmail.com',
            'nomor_telepon' => '081234567890',
            'alamat' => 'Surabaya',
            'status' => 'Aktif',
        ],
        [
            'id' => 2,
            'nama' => 'Siti Aminah',
            'nim' => '3123500002',
            'email' => 'siti@gmail.com',
            'nomor_telepon' => '082345678901',
            'alamat' => 'Sidoarjo',
            'status' => 'Aktif',
        ],
        [
            'id' => 3,
            'nama' => 'Andi Pratama',
            'nim' => '3123500003',
            'email' => 'andi@gmail.com',
            'nomor_telepon' => '083456789012',
            'alamat' => 'Gresik',
            'status' => 'Nonaktif',
        ],
    ];

    public function index()
    {
        $members = $this->members;

        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(StoreMemberRequest $request)
    {
        $validated = $request->validated();

        return redirect()->route('members.index')
            ->with(
                'success',
                "Anggota \"{$validated['nama']}\" berhasil ditambahkan (data dummy, belum tersimpan ke database)."
            );
    }
}