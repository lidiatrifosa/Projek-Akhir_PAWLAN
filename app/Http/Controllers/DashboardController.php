<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\User;
use App\Models\Bookmark;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_announcements' => Announcement::count(),
            'total_users' => User::where('role', 'mahasiswa')->count(),
            'total_bookmarks' => Bookmark::count(),
            'by_kategori' => Announcement::selectRaw('kategori, count(*) as total')
                                ->groupBy('kategori')->pluck('total', 'kategori'),
        ];

        $recent = Announcement::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recent'));
    }
}
