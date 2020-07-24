<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //
    protected $fillable = ['label','name', 'module_id', 'type'];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
