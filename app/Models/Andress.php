<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Andress extends Model
{
    //

    protected $fillable = ['cep','andress','number','complement','neighborhood','uf','city','company_id'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
