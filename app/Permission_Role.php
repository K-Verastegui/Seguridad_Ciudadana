<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission_Role extends Model
{
    public $table='permission_role';
    public $primaryKey='id';
    //public $timestamps = false;
    protected $fillable = ['role_id ','permission_id '];

}
