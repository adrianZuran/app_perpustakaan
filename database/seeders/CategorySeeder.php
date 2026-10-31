<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['nama_kategori' => 'Novel', 'deskripsi' => 'Buku fiksi panjang dengan alur cerita dan karakter yang kompleks.'],
            ['nama_kategori' => 'Komik', 'deskripsi' => 'Buku bergambar dengan narasi cerita yang divisualisasikan.'],
            ['nama_kategori' => 'Sains', 'deskripsi' => 'Buku seputar ilmu pengetahuan alam dan penelitian ilmiah.'],
            ['nama_kategori' => 'Teknologi', 'deskripsi' => 'Buku seputar pemrograman, komputer, dan perkembangan teknologi.'],
            ['nama_kategori' => 'Sejarah', 'deskripsi' => 'Buku seputar peristiwa dan tokoh sejarah.'],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['nama_kategori' => $category['nama_kategori']],
                $category
            );
        }
    }
}