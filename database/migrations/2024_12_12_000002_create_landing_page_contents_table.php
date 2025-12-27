<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('landing_page_contents', function (Blueprint $table) {
            $table->id();
            $table->string('section')->unique();
            $table->json('content');
            $table->timestamps();
        });

        // Insert default values
        DB::table('landing_page_contents')->insert([
            [
                'section' => 'hero',
                'content' => json_encode([
                    'slogan' => 'Reaksi Bersatu, Kimia Maju, Semangat Tak Pernah Luntur',
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'section' => 'profil',
                'content' => json_encode([
                    'image' => null,
                    'title' => 'This Is HIMKA',
                    'description' => 'HIMA Kimia Universitas Maritim Raja Ali Haji (HIMKA UMRAH) dibentuk sebagai organisasi resmi yang menaungi seluruh mahasiswa Program Studi Kimia.',
                    'description_2' => 'Sejak berdiri, HIMKA UMRAH aktif menyelenggarakan berbagai kegiatan seperti seminar ilmiah, pelatihan, kompetisi, hingga kegiatan sosial untuk memperkuat kontribusi mahasiswa dalam lingkungan kampus dan masyarakat luas.',
                    'years_established' => 5,
                    'total_programs' => 20,
                    'active_members' => 100,
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'section' => 'ketua_umum',
                'content' => json_encode([
                    'image' => null,
                    'name' => 'Meicyntia Bella',
                    'position' => 'Ketua Umum HIMKA UMRAH 2024/2025',
                    'quote' => 'Sebagai keluarga besar HIMKA UMRAH, mari kita bersama-sama membangun semangat kolaborasi dan inovasi. Dengan tekad yang kuat dan kerja sama yang solid, kita akan membawa HIMKA menuju puncak prestasi. Reaksi bersatu, kimia maju, semangat tak pernah luntur!',
                    'visi' => 'Menjadikan HIMKA sebagai wadah pengembangan diri mahasiswa kimia',
                    'misi' => 'Membangun solidaritas dan meningkatkan kualitas anggota',
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('landing_page_contents');
    }
};
