<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coordinate extends Model
{
    //
    protected $fillable = ['lat','long','company_id'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}