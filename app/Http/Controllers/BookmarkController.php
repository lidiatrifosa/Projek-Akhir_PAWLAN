<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Announcement;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    public function index()
    {
        $bookmarks = auth()->user()->bookmarks()->with('announcement')->latest()->paginate(9);
        return view('bookmarks.index', compact('bookmarks'));
    }

    public function store(Request $request)
    {
        $request->validate(['announcement_id' => 'required|exists:announcements,id']);

        $exists = Bookmark::where('user_id', auth()->id())
                          ->where('announcement_id', $request->announcement_id)
                          ->exists();

        if (!$exists) {
            Bookmark::create([
                'user_id' => auth()->id(),
                'announcement_id' => $request->announcement_id,
            ]);
        }

        return back()->with('success', 'Pengumuman disimpan ke bookmark.');
    }

    public function destroy(Bookmark $bookmark)
    {
        abort_if($bookmark->user_id !== auth()->id(), 403);
        $bookmark->delete();
        return back()->with('success', 'Bookmark dihapus.');
    }
}
