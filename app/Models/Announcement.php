<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = ['judul', 'deskripsi', 'kategori', 'fakultas', 'gambar', 'lampiran', 'tanggal_mulai', 'tanggal_selesai', 'admin_id'];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
    ];

    public function admin()
{
    return $this->belongsTo(User::class, 'admin_id');
}

public function bookmarks()
{
    return $this->hasMany(Bookmark::class);
}

public function bookmarkedByUsers()
{
    return $this->belongsToMany(
        User::class,
        'bookmarks',
        'announcement_id',
        'user_id'
    );
}
}
