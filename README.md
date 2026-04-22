# 📢 KampusInfo - Papan Informasi Kampus Digital

Platform informasi kampus terpusat berbasis web yang mengagregasi pengumuman, event, lowongan magang, beasiswa, dan kegiatan organisasi dalam satu tempat. Dirancang untuk memudahkan mahasiswa dan civitas akademika dalam mengakses informasi kampus secara cepat, mudah, dan terorganisir.

## 👥 Anggota Kelompok

| NIM | Nama |
|-----|------|
| 235150707111026 | 	LISHA KHAERUNNISWAH  |
| 245150701111020 | LIDIA TRIFOSA SIMANGUNSONG |
| 245150707111015 | DEWI LESTARI TAMPUBOLON |

## 🚀 Fitur

### Fitur Wajib
- Halaman beranda dengan feed pengumuman & informasi terbaru
- Sistem kategori informasi (Akademik, Event, Beasiswa, Magang, Organisasi)
- Halaman detail informasi lengkap dengan gambar dan lampiran
- Fitur pencarian dan filter berdasarkan kategori / fakultas / tanggal
- Manajemen konten oleh admin (CRUD pengumuman)
- Autentikasi pengguna (login admin & mahasiswa)

### Fitur Opsional
- Fitur bookmark / simpan informasi favorit
- Filter berdasarkan jurusan atau fakultas tertentu

## 👤 Role & Hak Akses

| Role | Hak Akses |
|------|-----------|
| Admin | Mengelola semua konten (tambah, edit, hapus pengumuman) |
| Mahasiswa | Melihat, mencari, dan menyimpan informasi |
| Tamu (Guest) | Melihat informasi publik tanpa login |

## 🔄 Alur Sistem

### Admin Memposting Pengumuman Baru
1. Admin login ke dashboard
2. Klik "Tambah Pengumuman"
3. Isi judul, deskripsi, kategori, tanggal, dan unggah lampiran
4. Submit → data tersimpan ke database
5. Pengumuman tampil di halaman beranda

### Mahasiswa Mencari Informasi Beasiswa
1. Mahasiswa membuka website (bisa tanpa login)
2. Pilih kategori "Beasiswa" atau ketik di kolom pencarian
3. Sistem menampilkan daftar beasiswa yang tersedia
4. Mahasiswa klik untuk melihat detail lengkap
5. Mahasiswa login untuk menyimpan / bookmark informasi

## 🗄️ Struktur Database

### Tabel `users`
| Kolom | Tipe | Keterangan |
|-------|------|------------|
| id | INT PRIMARY KEY | - |
| nama | VARCHAR | - |
| email | VARCHAR UNIQUE | - |
| password | VARCHAR | - |
| role | ENUM('admin', 'mahasiswa') | - |
| created_at | TIMESTAMP | - |

### Tabel `announcements`
| Kolom | Tipe | Keterangan |
|-------|------|------------|
| id | INT PRIMARY KEY | - |
| judul | VARCHAR | - |
| deskripsi | TEXT | - |
| kategori | ENUM('Akademik', 'Event', 'Beasiswa', 'Magang', 'Organisasi') | - |
| fakultas | VARCHAR | nullable |
| gambar | VARCHAR | path file, nullable |
| lampiran | VARCHAR | path file, nullable |
| tanggal_mulai | DATE | - |
| tanggal_selesai | DATE | nullable |
| admin_id | INT | FK → users.id |
| created_at | TIMESTAMP | - |

### Tabel `bookmarks`
| Kolom | Tipe | Keterangan |
|-------|------|------------|
| id | INT PRIMARY KEY | - |
| user_id | INT | FK → users.id |
| announcement_id | INT | FK → announcements.id |
| created_at | TIMESTAMP | - |
