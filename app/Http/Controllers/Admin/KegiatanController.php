<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class KegiatanController extends Controller
{
    public function index(Request $request)
    {
        $kegiatan = Kegiatan::with('user')
            ->when($request->search, fn($q) => $q->where('title', 'like', "%{$request->search}%"))
            ->latest()
            ->paginate(10);

        return view('admin.kegiatan.index', compact('kegiatan'));
    }

    public function create()
    {
        return view('admin.kegiatan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|max:500',
            'content' => 'required',
            'image' => 'nullable|image|max:2048',
            'event_date' => 'nullable|date',
            'location' => 'nullable|max:255',
            'is_published' => 'boolean',
        ]);

        $validated['user_id'] = auth()->id();
        $validated['slug'] = Str::slug($validated['title']) . '-' . Str::random(5);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('kegiatan', 'public');
        }

        Kegiatan::create($validated);

        return redirect()->route('admin.kegiatan.index')->with('success', 'Kegiatan berhasil dibuat!');
    }

    public function edit(Kegiatan $kegiatan)
    {
        return view('admin.kegiatan.edit', compact('kegiatan'));
    }

    public function update(Request $request, Kegiatan $kegiatan)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|max:500',
            'content' => 'required',
            'image' => 'nullable|image|max:2048',
            'event_date' => 'nullable|date',
            'location' => 'nullable|max:255',
            'is_published' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($kegiatan->image) {
                Storage::disk('public')->delete($kegiatan->image);
            }
            $validated['image'] = $request->file('image')->store('kegiatan', 'public');
        }

        $kegiatan->update($validated);

        return redirect()->route('admin.kegiatan.index')->with('success', 'Kegiatan berhasil diupdate!');
    }

    public function destroy(Kegiatan $kegiatan)
    {
        if ($kegiatan->image) {
            Storage::disk('public')->delete($kegiatan->image);
        }
        $kegiatan->delete();

        return redirect()->route('admin.kegiatan.index')->with('success', 'Kegiatan berhasil dihapus!');
    }
}
