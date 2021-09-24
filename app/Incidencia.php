<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    public $timestamps = false;
    protected $fillable = ['dni','categoria','longitud','latitud','descripcion','created_at','updated_at','foto','seguido','estado'];

    public function users()
    {
        return $this->belongsToMany('App\user');
    }
}
