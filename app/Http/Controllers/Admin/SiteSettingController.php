<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    public function edit()
    {
        $settings = [
            'contact_email' => SiteSetting::get('contact_email'),
            'contact_admin_name' => SiteSetting::get('contact_admin_name'),
            'contact_address' => SiteSetting::get('contact_address'),
            'google_maps_embed' => SiteSetting::get('google_maps_embed'),
        ];

        return view('admin.settings.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'contact_email' => 'required|email|max:255',
            'contact_admin_name' => 'required|max:255',
            'contact_address' => 'required|max:500',
            'google_maps_embed' => 'nullable|url|max:1000',
        ]);

        foreach ($validated as $key => $value) {
            SiteSetting::set($key, $value);
        }

        return redirect()->route('admin.settings.edit')->with('success', 'Pengaturan kontak berhasil diperbarui!');
    }
}
