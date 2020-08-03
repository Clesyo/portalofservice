<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    public function announcement()
    {
        return $this->belongsTo(Announcement::class);
    }
}
