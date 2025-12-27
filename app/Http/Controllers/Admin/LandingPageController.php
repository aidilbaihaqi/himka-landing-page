<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LandingPageContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LandingPageController extends Controller
{
    public function edit()
    {
        $hero = LandingPageContent::getHero();
        $profil = LandingPageContent::getProfil();
        $ketuaUmum = LandingPageContent::getKetuaUmum();

        return view('admin.landing-page.edit', compact('hero', 'profil', 'ketuaUmum'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            // Hero
            'hero_slogan' => 'required|max:255',
            // Profil
            'profil_image' => 'nullable|image|max:2048',
            'profil_title' => 'required|max:255',
            'profil_description' => 'required|max:1000',
            'profil_description_2' => 'nullable|max:1000',
            'profil_years_established' => 'required|integer|min:1',
            'profil_total_programs' => 'required|integer|min:1',
            'profil_active_members' => 'required|integer|min:1',
            // Ketua Umum
            'ketua_image' => 'nullable|image|max:2048',
            'ketua_name' => 'required|max:255',
            'ketua_position' => 'required|max:255',
            'ketua_quote' => 'required|max:1000',
            'ketua_visi' => 'required|max:500',
            'ketua_misi' => 'required|max:500',
        ]);

        // Update Hero
        LandingPageContent::setSection('hero', [
            'slogan' => $validated['hero_slogan'],
        ]);

        // Update Profil
        $currentProfil = LandingPageContent::getProfil();
        $profilImage = $currentProfil['image'] ?? null;

        if ($request->hasFile('profil_image')) {
            if ($profilImage) {
                Storage::disk('public')->delete($profilImage);
            }
            $profilImage = $request->file('profil_image')->store('landing-page', 'public');
        }

        LandingPageContent::setSection('profil', [
            'image' => $profilImage,
            'title' => $validated['profil_title'],
            'description' => $validated['profil_description'],
            'description_2' => $validated['profil_description_2'] ?? '',
            'years_established' => (int) $validated['profil_years_established'],
            'total_programs' => (int) $validated['profil_total_programs'],
            'active_members' => (int) $validated['profil_active_members'],
        ]);

        // Update Ketua Umum
        $currentKetua = LandingPageContent::getKetuaUmum();
        $ketuaImage = $currentKetua['image'] ?? null;

        if ($request->hasFile('ketua_image')) {
            if ($ketuaImage) {
                Storage::disk('public')->delete($ketuaImage);
            }
            $ketuaImage = $request->file('ketua_image')->store('landing-page', 'public');
        }

        LandingPageContent::setSection('ketua_umum', [
            'image' => $ketuaImage,
            'name' => $validated['ketua_name'],
            'position' => $validated['ketua_position'],
            'quote' => $validated['ketua_quote'],
            'visi' => $validated['ketua_visi'],
            'misi' => $validated['ketua_misi'],
        ]);

        return redirect()->route('admin.landing-page.edit')->with('success', 'Konten landing page berhasil diperbarui!');
    }

    public function deleteImage(Request $request)
    {
        $section = $request->get('section', 'profil');
        
        if ($section === 'profil') {
            $profil = LandingPageContent::getProfil();
            if ($profil['image']) {
                Storage::disk('public')->delete($profil['image']);
                $profil['image'] = null;
                LandingPageContent::setSection('profil', $profil);
            }
        } elseif ($section === 'ketua_umum') {
            $ketua = LandingPageContent::getKetuaUmum();
            if ($ketua['image']) {
                Storage::disk('public')->delete($ketua['image']);
                $ketua['image'] = null;
                LandingPageContent::setSection('ketua_umum', $ketua);
            }
        }

        return redirect()->route('admin.landing-page.edit')->with('success', 'Foto berhasil dihapus!');
    }
}
