<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    public function user()
{
    return $this->belongsTo(User::class);
}

public function announcement()
{
    return $this->belongsTo(Announcement::class);
}
}
