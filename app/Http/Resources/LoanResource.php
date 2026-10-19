<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'member' => [
                'id' => $this->member?->id,
                'nama' => $this->member?->nama,
            ],
            'petugas' => [
                'id' => $this->user?->id,
                'name' => $this->user?->name,
            ],
            'tanggal_pinjam' => $this->tanggal_pinjam,
            'tanggal_kembali' => $this->tanggal_kembali,
            'tanggal_dikembalikan' => $this->tanggal_dikembalikan,
            'status' => $this->status,
            'books' => $this->loanItems->map(fn ($item) => [
                'id' => $item->book?->id,
                'judul' => $item->book?->judul,
            ]),
        ];
    }
}
