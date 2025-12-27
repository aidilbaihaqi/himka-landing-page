<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class LandingPageContent extends Model
{
    protected $fillable = ['section', 'content'];

    protected $casts = [
        'content' => 'array',
    ];

    public static function getSection(string $section): ?array
    {
        return Cache::remember("landing_page_{$section}", 3600, function () use ($section) {
            $record = self::where('section', $section)->first();
            return $record ? $record->content : null;
        });
    }

    public static function setSection(string $section, array $content): void
    {
        self::updateOrCreate(['section' => $section], ['content' => $content]);
        Cache::forget("landing_page_{$section}");
    }

    public static function getHero(): array
    {
        return self::getSection('hero') ?? [
            'slogan' => 'Reaksi Bersatu, Kimia Maju, Semangat Tak Pernah Luntur',
        ];
    }

    public static function getProfil(): array
    {
        return self::getSection('profil') ?? [
            'image' => null,
            'title' => 'This Is HIMKA',
            'description' => '',
            'description_2' => '',
            'years_established' => 5,
            'total_programs' => 20,
            'active_members' => 100,
        ];
    }

    public static function getKetuaUmum(): array
    {
        return self::getSection('ketua_umum') ?? [
            'image' => null,
            'name' => 'Meicyntia Bella',
            'position' => 'Ketua Umum HIMKA UMRAH 2024/2025',
            'quote' => 'Sebagai keluarga besar HIMKA UMRAH, mari kita bersama-sama membangun semangat kolaborasi dan inovasi. Dengan tekad yang kuat dan kerja sama yang solid, kita akan membawa HIMKA menuju puncak prestasi. Reaksi bersatu, kimia maju, semangat tak pernah luntur!',
            'visi' => 'Menjadikan HIMKA sebagai wadah pengembangan diri mahasiswa kimia',
            'misi' => 'Membangun solidaritas dan meningkatkan kualitas anggota',
        ];
    }
}
