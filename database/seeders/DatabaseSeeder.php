<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create default admin user
        User::create([
            'name' => 'Admin HIMKA',
            'email' => 'admin@himka.com',
            'password' => Hash::make('himkajaya01'),
        ]);

        // Create default categories
        $categories = ['Berita', 'Kegiatan', 'Prestasi', 'Pengumuman', 'Artikel'];
        foreach ($categories as $name) {
            Category::create([
                'name' => $name,
                'slug' => \Illuminate\Support\Str::slug($name),
                'type' => 'article',
            ]);
        }
    }
}
