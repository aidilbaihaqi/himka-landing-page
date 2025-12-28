<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notulensi;
use App\Models\Pengurus;
use App\Models\User;
use App\Notifications\NotulensiCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

class NotulensiController extends Controller
{
    public function index(Request $request)
    {
        $notulensi = Notulensi::with('user')
            ->when($request->search, fn($q) => $q->where('title', 'like', "%{$request->search}%"))
            ->latest('meeting_date')
            ->paginate(10);

        return view('admin.notulensi.index', compact('notulensi'));
    }

    public function create()
    {
        $pengurusAktif = Pengurus::with('user')->active()->orderBy('sort_order')->get();
        return view('admin.notulensi.create', compact('pengurusAktif'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'meeting_date' => 'required|date',
            'meeting_time' => 'nullable',
            'location' => 'nullable|max:255',
            'attendees_list' => 'nullable|array',
            'attendees_extra' => 'nullable|string',
            'agenda' => 'required',
            'discussion' => 'nullable',
            'decisions' => 'nullable',
            'action_items' => 'nullable',
            'attachment' => 'nullable|file|max:5120',
        ]);

        // Combine attendees from checkboxes and extra input
        $attendees = [];
        if (!empty($validated['attendees_list'])) {
            $attendees = array_merge($attendees, $validated['attendees_list']);
        }
        if (!empty($validated['attendees_extra'])) {
            $extraAttendees = array_map('trim', explode(',', $validated['attendees_extra']));
            $attendees = array_merge($attendees, array_filter($extraAttendees));
        }
        $validated['attendees'] = implode(', ', $attendees);
        unset($validated['attendees_list'], $validated['attendees_extra']);

        $validated['user_id'] = auth()->id();

        if ($request->hasFile('attachment')) {
            $validated['attachment'] = $request->file('attachment')->store('notulensi', 'public');
        }

        $notulensi = Notulensi::create($validated);

        // Send notification to all users
        $users = User::where('id', '!=', auth()->id())->get();
        Notification::send($users, new NotulensiCreated($notulensi));

        return redirect()->route('admin.notulensi.index')->with('success', 'Notulensi berhasil dibuat!');
    }

    public function show(Notulensi $notulensi)
    {
        return view('admin.notulensi.show', compact('notulensi'));
    }

    public function edit(Notulensi $notulensi)
    {
        $pengurusAktif = Pengurus::with('user')->active()->orderBy('sort_order')->get();
        return view('admin.notulensi.edit', compact('notulensi', 'pengurusAktif'));
    }

    public function update(Request $request, Notulensi $notulensi)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'meeting_date' => 'required|date',
            'meeting_time' => 'nullable',
            'location' => 'nullable|max:255',
            'attendees_list' => 'nullable|array',
            'attendees_extra' => 'nullable|string',
            'agenda' => 'required',
            'discussion' => 'nullable',
            'decisions' => 'nullable',
            'action_items' => 'nullable',
            'attachment' => 'nullable|file|max:5120',
        ]);

        // Combine attendees from checkboxes and extra input
        $attendees = [];
        if (!empty($validated['attendees_list'])) {
            $attendees = array_merge($attendees, $validated['attendees_list']);
        }
        if (!empty($validated['attendees_extra'])) {
            $extraAttendees = array_map('trim', explode(',', $validated['attendees_extra']));
            $attendees = array_merge($attendees, array_filter($extraAttendees));
        }
        $validated['attendees'] = implode(', ', $attendees);
        unset($validated['attendees_list'], $validated['attendees_extra']);

        if ($request->hasFile('attachment')) {
            if ($notulensi->attachment) {
                Storage::disk('public')->delete($notulensi->attachment);
            }
            $validated['attachment'] = $request->file('attachment')->store('notulensi', 'public');
        }

        $notulensi->update($validated);

        return redirect()->route('admin.notulensi.index')->with('success', 'Notulensi berhasil diupdate!');
    }

    public function destroy(Notulensi $notulensi)
    {
        if ($notulensi->attachment) {
            Storage::disk('public')->delete($notulensi->attachment);
        }
        $notulensi->delete();

        return redirect()->route('admin.notulensi.index')->with('success', 'Notulensi berhasil dihapus!');
    }
}
