<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->timestamps();
        });

        // Insert default values
        DB::table('site_settings')->insert([
            ['key' => 'contact_email', 'value' => 'himkafttkumrah@gmail.com', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'contact_admin_name', 'value' => 'Admin HIMKA', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'contact_address', 'value' => 'Gedung FTTK, Universitas Maritim Raja Ali Haji, Tanjungpinang', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'google_maps_embed', 'value' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.0547!2d104.4583!3d0.9167!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMMKwNTUnMDAuMCJOIDEwNMKwMjcnMzAuMCJF!5e0!3m2!1sen!2sid!4v1234567890', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
