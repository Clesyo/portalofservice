<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    //
    protected $fillable = ['note','company_id', 'status'];

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
