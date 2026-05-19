<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnnouncementController extends Controller
{
    public function index(Request $request)
    {
        $query = Announcement::with('admin')->latest();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', '%' . $search . '%')
                  ->orWhere('deskripsi', 'like', '%' . $search . '%');
            });
        }

        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        if ($request->filled('fakultas')) {
            $query->where('fakultas', $request->fakultas);
        }

        if ($request->filled('tanggal')) {
            $query->whereDate('tanggal_mulai', '<=', $request->tanggal)
                  ->where(function ($q) use ($request) {
                      $q->whereNull('tanggal_selesai')
                        ->orWhereDate('tanggal_selesai', '>=', $request->tanggal);
                  });
        }

        $announcements = $query->paginate(9)->withQueryString();

        return view('announcements.index', compact('announcements'));
    }

    public function show(Announcement $announcement)
    {
        return view('announcements.show', compact('announcement'));
    }

    // Admin methods
    public function create()
    {
        return view('admin.announcements.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kategori' => 'required|in:Akademik,Event,Beasiswa,Magang,Organisasi',
            'fakultas' => 'nullable|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'gambar' => 'nullable|image|max:2048',
            'lampiran' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
        ]);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('announcements', 'public');
        }

        if ($request->hasFile('lampiran')) {
            $data['lampiran'] = $request->file('lampiran')->store('documents', 'public');
        }

        $data['admin_id'] = auth()->id();
        Announcement::create($data);

        return redirect()->route('admin.announcements.index')->with('success', 'Pengumuman berhasil ditambahkan.');
    }

    public function edit(Announcement $announcement)
    {
        return view('admin.announcements.edit', compact('announcement'));
    }

    public function update(Request $request, Announcement $announcement)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kategori' => 'required|in:Akademik,Event,Beasiswa,Magang,Organisasi',
            'fakultas' => 'nullable|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'gambar' => 'nullable|image|max:2048',
            'lampiran' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
        ]);

        if ($request->hasFile('gambar')) {
            if ($announcement->gambar) Storage::disk('public')->delete($announcement->gambar);
            $data['gambar'] = $request->file('gambar')->store('announcements', 'public');
        }

        if ($request->hasFile('lampiran')) {
            if ($announcement->lampiran) Storage::disk('public')->delete($announcement->lampiran);
            $data['lampiran'] = $request->file('lampiran')->store('documents', 'public');
        }

        $announcement->update($data);

        return redirect()->route('admin.announcements.index')->with('success', 'Pengumuman berhasil diperbarui.');
    }

    public function destroy(Announcement $announcement)
    {
        if ($announcement->gambar) Storage::disk('public')->delete($announcement->gambar);
        if ($announcement->lampiran) Storage::disk('public')->delete($announcement->lampiran);

        $announcement->delete();

        return redirect()->route('admin.announcements.index')->with('success', 'Pengumuman berhasil dihapus.');
    }

    public function adminIndex()
    {
        $announcements = Announcement::with('admin')->latest()->paginate(15);
        return view('admin.announcements.index', compact('announcements'));
    }
}
