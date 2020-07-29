<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    protected $fillable = ['name', 'cpf_cnpj', 'email', 'telephone', 'whatsapp',
                            'status','user_id','category_id'];

    public function andress()
    {
        return $this->hasOne(Andress::class);
    }

    public function coodinate()
    {
        return $this->hasOne(Coordinate::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function category()
    {
        return $this->hasMany(Category::class);
    }
}
