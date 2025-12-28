<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengurus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PengurusController extends Controller
{
    public function index(Request $request)
    {
        $pengurus = Pengurus::with('user')
            ->when($request->search, fn($q) => $q->whereHas('user', fn($u) => $u->where('name', 'like', "%{$request->search}%")))
            ->when($request->divisi, fn($q) => $q->where('divisi', $request->divisi))
            ->orderBy('sort_order')
            ->paginate(10);

        $divisiList = Pengurus::distinct()->pluck('divisi')->filter();

        return view('admin.pengurus.index', compact('pengurus', 'divisiList'));
    }

    public function create()
    {
        return view('admin.pengurus.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'nim' => 'required|unique:pengurus,nim',
            'jabatan' => 'required|max:255',
            'divisi' => 'nullable|max:255',
            'phone' => 'nullable|max:20',
            'photo' => 'nullable|image|max:2048',
            'bio' => 'nullable|max:1000',
            'periode_start' => 'required|digits:4',
            'periode_end' => 'required|digits:4',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        // Create user with default password
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make('himkajaya01'),
        ]);

        $pengurusData = [
            'user_id' => $user->id,
            'nim' => $validated['nim'],
            'jabatan' => $validated['jabatan'],
            'divisi' => $validated['divisi'],
            'phone' => $validated['phone'],
            'bio' => $validated['bio'],
            'periode_start' => $validated['periode_start'],
            'periode_end' => $validated['periode_end'],
            'is_active' => $validated['is_active'] ?? true,
            'sort_order' => $validated['sort_order'] ?? 0,
        ];

        if ($request->hasFile('photo')) {
            $pengurusData['photo'] = $request->file('photo')->store('pengurus', 'public');
        }

        Pengurus::create($pengurusData);

        return redirect()->route('admin.pengurus.index')->with('success', 'Pengurus berhasil ditambahkan! Password default: himkajaya01');
    }

    public function edit(Pengurus $penguru)
    {
        return view('admin.pengurus.edit', compact('penguru'));
    }

    public function update(Request $request, Pengurus $penguru)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $penguru->user_id,
            'nim' => 'required|unique:pengurus,nim,' . $penguru->id,
            'jabatan' => 'required|max:255',
            'divisi' => 'nullable|max:255',
            'phone' => 'nullable|max:20',
            'photo' => 'nullable|image|max:2048',
            'bio' => 'nullable|max:1000',
            'periode_start' => 'required|digits:4',
            'periode_end' => 'required|digits:4',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $penguru->user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
        ]);

        $pengurusData = [
            'nim' => $validated['nim'],
            'jabatan' => $validated['jabatan'],
            'divisi' => $validated['divisi'],
            'phone' => $validated['phone'],
            'bio' => $validated['bio'],
            'periode_start' => $validated['periode_start'],
            'periode_end' => $validated['periode_end'],
            'is_active' => $validated['is_active'] ?? false,
            'sort_order' => $validated['sort_order'] ?? 0,
        ];

        if ($request->hasFile('photo')) {
            if ($penguru->photo) {
                Storage::disk('public')->delete($penguru->photo);
            }
            $pengurusData['photo'] = $request->file('photo')->store('pengurus', 'public');
        }

        $penguru->update($pengurusData);

        return redirect()->route('admin.pengurus.index')->with('success', 'Pengurus berhasil diupdate!');
    }

    public function destroy(Pengurus $penguru)
    {
        if ($penguru->photo) {
            Storage::disk('public')->delete($penguru->photo);
        }
        $penguru->user->delete();

        return redirect()->route('admin.pengurus.index')->with('success', 'Pengurus berhasil dihapus!');
    }

    public function resetPassword(Pengurus $penguru)
    {
        $penguru->user->update([
            'password' => Hash::make('himkajaya01'),
        ]);

        return back()->with('success', 'Password berhasil direset ke: himkajaya01');
    }
}
