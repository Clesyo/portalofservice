<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //

    protected $fillable = ['description', 'company_id'];


    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
