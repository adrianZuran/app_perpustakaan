# DEMO.md

# SKENARIO DEMONSTRASI UAS – APLIKASI PERPUSTAKAAN

## 1. Persiapan Sebelum Demo

Sebelum demonstrasi dimulai, pastikan:

1. Project Laravel sudah berjalan.
2. Database `db_perpustakaan` sudah terhubung.
3. Migrasi dan seeder sudah dijalankan.
4. Dua server Laravel sudah aktif:
   - Server utama: `http://127.0.0.1:8000`
   - Server API internal: `http://127.0.0.1:8011`
5. Postman sudah disiapkan untuk pengujian API.
6. Siapkan akun admin untuk login.

## 2. Skenario Demonstrasi Aplikasi

### Langkah 1 – Login

1. Buka aplikasi melalui browser.
2. Tampilkan halaman login.
3. Masukkan email dan password akun admin.
4. Klik tombol Login.
5. Pastikan pengguna berhasil masuk ke aplikasi.

**Hasil yang diharapkan:** Admin berhasil melakukan autentikasi dan diarahkan ke halaman dashboard.

### Langkah 2 – Menampilkan Dashboard

1. Setelah login, tampilkan halaman dashboard.
2. Jelaskan informasi yang tersedia pada dashboard.
3. Tunjukkan ringkasan data perpustakaan, seperti jumlah buku, anggota, dan peminjaman.
4. Jelaskan fungsi dashboard sebagai halaman utama untuk memantau aktivitas perpustakaan.

**Hasil yang diharapkan:** Dashboard berhasil menampilkan informasi dan ringkasan data perpustakaan.

### Langkah 3 – Menambahkan Kategori

1. Buka menu Kategori.

2. Klik tombol Tambah Kategori.

3. Masukkan nama kategori baru.

   Contoh:

   - Nama kategori: Teknologi Informasi

4. Simpan data kategori.

5. Pastikan kategori baru muncul pada daftar kategori.

**Hasil yang diharapkan:** Kategori berhasil ditambahkan dan tersimpan di database.

### Langkah 4 – Menambahkan Buku

1. Buka menu Buku.

2. Klik tombol Tambah Buku.

3. Masukkan informasi buku.

   Contoh data:

   - Judul: Dasar-Dasar Pemrograman
   - Penulis: Abdul Kadir
   - Penerbit: Andi Publisher
   - Tahun Terbit: 2024
   - Kategori: Teknologi Informasi
   - Stok: 5

4. Simpan data buku.

5. Pastikan buku berhasil muncul pada daftar buku.

**Hasil yang diharapkan:** Data buku berhasil ditambahkan dan kategori yang sebelumnya dibuat dapat digunakan.

### Langkah 5 – Menambahkan Anggota

1. Buka menu Anggota.

2. Klik tombol Tambah Anggota.

3. Masukkan informasi anggota.

   Contoh data:

   - Nama: Budi Santoso
   - NIM: 3125500099
   - Email: [budi@example.com](mailto\:budi@example.com)
   - Nomor Telepon: 081234567890
   - Alamat: Surabaya
   - Status: Aktif

4. Simpan data anggota.

5. Pastikan anggota berhasil muncul pada daftar anggota.

**Hasil yang diharapkan:** Data anggota berhasil ditambahkan dan tersimpan di database.

### Langkah 6 – Membuat Peminjaman

1. Buka menu Peminjaman.
2. Klik tombol Tambah Peminjaman.
3. Pilih anggota yang sudah ditambahkan.
4. Pilih buku yang akan dipinjam.
5. Masukkan tanggal peminjaman dan tanggal jatuh tempo sesuai ketentuan aplikasi.
6. Simpan transaksi peminjaman.
7. Pastikan transaksi berhasil dibuat.

**Hasil yang diharapkan:** Data peminjaman berhasil disimpan dan stok buku diperbarui sesuai mekanisme aplikasi.

### Langkah 7 – Melihat Daftar Peminjaman Aktif

1. Buka halaman daftar peminjaman.

2. Tampilkan transaksi peminjaman yang baru saja dibuat.

3. Jelaskan informasi yang tersedia, seperti:

   - Nama anggota.
   - Buku yang dipinjam.
   - Tanggal peminjaman.
   - Tanggal jatuh tempo.
   - Status peminjaman.

4. Pastikan transaksi yang baru dibuat memiliki status peminjaman aktif atau belum dikembalikan.

**Hasil yang diharapkan:** Transaksi peminjaman berhasil ditampilkan pada daftar peminjaman aktif.

### Langkah 8 – Memproses Pengembalian Buku

1. Buka daftar peminjaman.
2. Cari transaksi peminjaman yang ingin dikembalikan.
3. Klik tombol atau aksi Pengembalian.
4. Proses pengembalian buku.
5. Pastikan status transaksi berubah menjadi sudah dikembalikan.
6. Periksa kembali stok buku untuk memastikan stok diperbarui.

**Hasil yang diharapkan:** Pengembalian berhasil diproses, status peminjaman diperbarui, dan stok buku disesuaikan.

### Langkah 9 – Menampilkan Laporan

1. Buka menu Laporan.
2. Tampilkan halaman laporan perpustakaan.
3. Jelaskan informasi laporan yang tersedia.
4. Tunjukkan data peminjaman dan pengembalian.
5. Jika tersedia, demonstrasikan filter laporan atau fitur pencarian.
6. Pastikan laporan menampilkan data yang sesuai dengan transaksi sebelumnya.

**Hasil yang diharapkan:** Sistem berhasil menampilkan laporan berdasarkan data transaksi perpustakaan.

### Langkah 10 – Demonstrasi API Menggunakan Postman

1. Buka aplikasi Postman.

2. Siapkan request ke API menggunakan alamat server utama:

   `http://127.0.0.1:8000/api`

3. Tambahkan header:

   - `Accept: application/json`
   - `Content-Type: application/json`

4. Demonstrasikan beberapa endpoint API sesuai implementasi pada `routes/api.php`.

Contoh pengujian:

| Metode | Endpoint                     | Tujuan                        |
| ------ | ---------------------------- | ----------------------------- |
| GET    | `/api/books`                 | Menampilkan daftar buku       |
| POST   | `/api/books`                 | Menambahkan buku              |
| GET    | `/api/loans`                 | Menampilkan daftar peminjaman |
| POST   | `/api/loans`                 | Membuat peminjaman            |
| POST   | `/api/loans/{id}/kembalikan` | Memproses pengembalian        |

Catatan: Sesuaikan endpoint dan format JSON dengan implementasi aktual di `routes/api.php` dan controller. Jika endpoint dilindungi autentikasi Sanctum, sertakan token yang valid.

5. Jalankan request satu per satu.
6. Tunjukkan status HTTP dan response JSON.
7. Jelaskan bahwa API digunakan untuk menghubungkan aplikasi dengan layanan backend.

**Hasil yang diharapkan:** API berhasil memberikan response sesuai request yang dikirimkan melalui Postman.

## 3. Penutup Demonstrasi

Setelah seluruh skenario selesai:

1. Tunjukkan kembali data buku, anggota, dan transaksi.
2. Jelaskan bahwa proses pengelolaan perpustakaan telah berhasil dilakukan.
3. Jelaskan penggunaan Laravel sebagai backend aplikasi.
4. Jelaskan penggunaan API untuk komunikasi dan pengolahan data.
5. Akhiri demonstrasi dengan menyampaikan kesimpulan aplikasi.

## 4. Checklist Keberhasilan Demo

- [✔️] Login admin berhasil.
- [✔️] Dashboard berhasil ditampilkan.
- [✔️] Kategori berhasil ditambahkan.
- [✔️] Buku berhasil ditambahkan.
- [✔️] Anggota berhasil ditambahkan.
- [✔️] Peminjaman berhasil dibuat.
- [✔️] Daftar peminjaman aktif berhasil ditampilkan.
- [✔️] Pengembalian buku berhasil diproses.
- [✔️] Laporan berhasil ditampilkan.
- [✔️] API berhasil diuji menggunakan Postman.

**Catatan:** Gunakan data contoh yang konsisten selama demonstrasi. Pastikan buku dan anggota yang dibuat pada tahap awal digunakan kembali pada transaksi peminjaman agar alur demonstrasi mudah dipahami.
