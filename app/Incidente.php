<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incidente extends Model
{
    public $table='incidencias';
    public $primaryKey='id';
    protected $fillable = ['dni','categoria','longitud','latitud','descripcion','created_at','foto','seguido'];

    public function users()
    {
        return $this->belongsToMany('App\user');
    }
}
