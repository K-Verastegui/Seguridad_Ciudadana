<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    public $table='bitacora';
    public $primaryKey='id';
    //public $timestamps = false;
    protected $fillable = ['user','equipo','descripcion','tabla'];
}
