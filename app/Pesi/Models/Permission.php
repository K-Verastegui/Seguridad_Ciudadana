<?php

namespace App\Pesi\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'name', 'slug', 'description'
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Pesi\Models\Role')->withTimestamps();
    }
}
