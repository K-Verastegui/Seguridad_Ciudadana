<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    public $table='reportes';
    public $primaryKey='id';
    //public $timestamps = false;
    protected $fillable = ['description','aprhendido','objetos','estado','incidente_id'];
}
