<?php

namespace Database\Seeders;

use App\Models\Announcement;
use App\Models\User;
use Illuminate\Database\Seeder;

class AnnouncementSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('role', 'admin')->first();

        $data = [
            ['judul' => 'Jadwal UAS Semester Genap 2024/2025', 'kategori' => 'Akademik', 'deskripsi' => 'Ujian Akhir Semester akan dilaksanakan mulai tanggal 10 Juni 2025. Mahasiswa wajib membawa KTM dan kartu ujian.', 'tanggal_mulai' => '2025-06-10', 'tanggal_selesai' => '2025-06-24'],
            ['judul' => 'Seminar Nasional Teknologi Informasi 2025', 'kategori' => 'Event', 'deskripsi' => 'Seminar nasional dengan tema "AI dan Masa Depan Pendidikan" akan diselenggarakan di Gedung Rektorat.', 'tanggal_mulai' => '2025-05-20', 'tanggal_selesai' => '2025-05-20'],
            ['judul' => 'Beasiswa Unggulan Kemendikbud 2025', 'kategori' => 'Beasiswa', 'deskripsi' => 'Pendaftaran beasiswa unggulan Kemendikbud dibuka untuk mahasiswa berprestasi dengan IPK minimal 3.5.', 'tanggal_mulai' => '2025-05-01', 'tanggal_selesai' => '2025-05-31'],
            ['judul' => 'Lowongan Magang PT. Teknologi Nusantara', 'kategori' => 'Magang', 'deskripsi' => 'PT. Teknologi Nusantara membuka lowongan magang untuk mahasiswa jurusan Teknik Informatika dan Sistem Informasi.', 'tanggal_mulai' => '2025-05-15', 'tanggal_selesai' => '2025-06-15'],
            ['judul' => 'Rekrutmen Anggota BEM Universitas 2025', 'kategori' => 'Organisasi', 'deskripsi' => 'BEM Universitas membuka pendaftaran anggota baru untuk periode 2025/2026. Terbuka untuk semua mahasiswa aktif.', 'tanggal_mulai' => '2025-05-10', 'tanggal_selesai' => '2025-05-25'],
            ['judul' => 'Pengumuman KRS Online Semester Ganjil', 'kategori' => 'Akademik', 'deskripsi' => 'Pengisian KRS online untuk semester ganjil 2025/2026 dibuka mulai 1 Juli 2025 melalui portal akademik.', 'tanggal_mulai' => '2025-07-01', 'tanggal_selesai' => '2025-07-14', 'fakultas' => 'Semua Fakultas'],
        ];

        foreach ($data as $item) {
            Announcement::create(array_merge($item, ['admin_id' => $admin->id]));
        }
    }
}
