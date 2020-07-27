<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = ['description','status'];

    public function companies()
    {
        return $this->belongsTo(Company::class);
    }
}
