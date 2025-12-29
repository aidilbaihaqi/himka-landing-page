<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Pengurus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PengurusSeeder extends Seeder
{
    public function run(): void
    {
        $defaultPassword = 'himkajaya01';
        
        $pengurusData = [
            // Ketua & Wakil
            [
                'name' => 'Ahmad Fauzi',
                'email' => 'ahmad.fauzi@example.com',
                'nim' => '2021001',
                'jabatan' => 'Ketua Umum',
                'divisi' => null,
                'phone' => '081234567801',
                'bio' => 'Ketua Umum periode 2024/2025 dengan visi memajukan organisasi'
            ],
            [
                'name' => 'Siti Nurhaliza',
                'email' => 'siti.nurhaliza@example.com',
                'nim' => '2021002',
                'jabatan' => 'Wakil Ketua',
                'divisi' => null,
                'phone' => '081234567802',
                'bio' => 'Wakil Ketua yang siap mendukung program kerja organisasi'
            ],
            
            // Divisi Keuangan
            [
                'name' => 'Budi Santoso',
                'email' => 'budi.santoso@example.com',
                'nim' => '2021003',
                'jabatan' => 'Kepala Divisi',
                'divisi' => 'Keuangan',
                'phone' => '081234567803',
                'bio' => 'Mengelola keuangan organisasi dengan transparan dan akuntabel'
            ],
            [
                'name' => 'Dewi Lestari',
                'email' => 'dewi.lestari@example.com',
                'nim' => '2021004',
                'jabatan' => 'Anggota',
                'divisi' => 'Keuangan',
                'phone' => '081234567804',
                'bio' => 'Membantu administrasi keuangan dan pembukuan'
            ],
            
            // Divisi Humas
            [
                'name' => 'Eko Prasetyo',
                'email' => 'eko.prasetyo@example.com',
                'nim' => '2021005',
                'jabatan' => 'Kepala Divisi',
                'divisi' => 'Humas',
                'phone' => '081234567805',
                'bio' => 'Membangun relasi dan komunikasi eksternal organisasi'
            ],
            [
                'name' => 'Fitri Handayani',
                'email' => 'fitri.handayani@example.com',
                'nim' => '2021006',
                'jabatan' => 'Anggota',
                'divisi' => 'Humas',
                'phone' => '081234567806',
                'bio' => 'Mengelola media sosial dan publikasi organisasi'
            ],
            [
                'name' => 'Gilang Ramadhan',
                'email' => 'gilang.ramadhan@example.com',
                'nim' => '2021007',
                'jabatan' => 'Anggota',
                'divisi' => 'Humas',
                'phone' => '081234567807',
                'bio' => 'Koordinator acara dan event organizer'
            ],
            
            // Divisi Pendidikan
            [
                'name' => 'Hana Pertiwi',
                'email' => 'hana.pertiwi@example.com',
                'nim' => '2021008',
                'jabatan' => 'Kepala Divisi',
                'divisi' => 'Pendidikan',
                'phone' => '081234567808',
                'bio' => 'Mengembangkan program pendidikan dan pelatihan anggota'
            ],
            [
                'name' => 'Irfan Hakim',
                'email' => 'irfan.hakim@example.com',
                'nim' => '2021009',
                'jabatan' => 'Anggota',
                'divisi' => 'Pendidikan',
                'phone' => '081234567809',
                'bio' => 'Koordinator workshop dan seminar'
            ],
            
            // Divisi Sosial Masyarakat
            [
                'name' => 'Joko Widodo',
                'email' => 'joko.widodo@example.com',
                'nim' => '2021010',
                'jabatan' => 'Kepala Divisi',
                'divisi' => 'Sosial Masyarakat',
                'phone' => '081234567810',
                'bio' => 'Mengelola program pengabdian masyarakat'
            ],
            [
                'name' => 'Kartika Sari',
                'email' => 'kartika.sari@example.com',
                'nim' => '2021011',
                'jabatan' => 'Anggota',
                'divisi' => 'Sosial Masyarakat',
                'phone' => '081234567811',
                'bio' => 'Koordinator kegiatan sosial dan bakti sosial'
            ],
            
            // Divisi Olahraga
            [
                'name' => 'Lukman Hakim',
                'email' => 'lukman.hakim@example.com',
                'nim' => '2021012',
                'jabatan' => 'Kepala Divisi',
                'divisi' => 'Olahraga',
                'phone' => '081234567812',
                'bio' => 'Mengkoordinir kegiatan olahraga dan kesehatan'
            ],
            [
                'name' => 'Maya Anggraini',
                'email' => 'maya.anggraini@example.com',
                'nim' => '2021013',
                'jabatan' => 'Anggota',
                'divisi' => 'Olahraga',
                'phone' => '081234567813',
                'bio' => 'Pengelola turnamen dan kompetisi olahraga'
            ],
            
            // Divisi Seni & Budaya
            [
                'name' => 'Nanda Pratama',
                'email' => 'nanda.pratama@example.com',
                'nim' => '2021014',
                'jabatan' => 'Kepala Divisi',
                'divisi' => 'Seni & Budaya',
                'phone' => '081234567814',
                'bio' => 'Mengembangkan kreativitas seni dan budaya'
            ],
            [
                'name' => 'Olivia Putri',
                'email' => 'olivia.putri@example.com',
                'nim' => '2021015',
                'jabatan' => 'Anggota',
                'divisi' => 'Seni & Budaya',
                'phone' => '081234567815',
                'bio' => 'Koordinator pentas seni dan festival budaya'
            ],
            
            // Divisi Teknologi Informasi
            [
                'name' => 'Putra Mahendra',
                'email' => 'putra.mahendra@example.com',
                'nim' => '2021016',
                'jabatan' => 'Kepala Divisi',
                'divisi' => 'Teknologi Informasi',
                'phone' => '081234567816',
                'bio' => 'Mengelola sistem informasi dan website organisasi'
            ],
            [
                'name' => 'Qori Amalia',
                'email' => 'qori.amalia@example.com',
                'nim' => '2021017',
                'jabatan' => 'Anggota',
                'divisi' => 'Teknologi Informasi',
                'phone' => '081234567817',
                'bio' => 'Developer dan maintenance sistem'
            ],
            
            // Divisi Kewirausahaan
            [
                'name' => 'Reza Pahlevi',
                'email' => 'reza.pahlevi@example.com',
                'nim' => '2021018',
                'jabatan' => 'Kepala Divisi',
                'divisi' => 'Kewirausahaan',
                'phone' => '081234567818',
                'bio' => 'Mengembangkan jiwa entrepreneurship anggota'
            ],
            [
                'name' => 'Sinta Dewi',
                'email' => 'sinta.dewi@example.com',
                'nim' => '2021019',
                'jabatan' => 'Anggota',
                'divisi' => 'Kewirausahaan',
                'phone' => '081234567819',
                'bio' => 'Koordinator bazar dan kegiatan wirausaha'
            ],
            [
                'name' => 'Taufik Hidayat',
                'email' => 'taufik.hidayat@example.com',
                'nim' => '2021020',
                'jabatan' => 'Anggota',
                'divisi' => 'Kewirausahaan',
                'phone' => '081234567820',
                'bio' => 'Pengelola koperasi dan unit usaha'
            ],
        ];

        foreach ($pengurusData as $index => $data) {
            // Create user
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($defaultPassword),
            ]);

            // Create pengurus
            Pengurus::create([
                'user_id' => $user->id,
                'nim' => $data['nim'],
                'jabatan' => $data['jabatan'],
                'divisi' => $data['divisi'],
                'phone' => $data['phone'],
                'bio' => $data['bio'],
                'periode_start' => 2024,
                'periode_end' => 2025,
                'is_active' => true,
                'sort_order' => $index + 1,
            ]);
        }

        $this->command->info('20 dummy pengurus berhasil dibuat!');
        $this->command->info('Password default untuk semua akun: ' . $defaultPassword);
    }
}
