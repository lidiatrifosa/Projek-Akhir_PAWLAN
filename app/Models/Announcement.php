<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
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
