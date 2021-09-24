<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    public $table = 'personas';
    public $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['dni','nombre','celular','correo'];

    public function incidentes()
    {
        return $this->hasOne('App\Incidente','dni','dni');
    }
}
