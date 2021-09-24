<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noty extends Model
{
    public $table='noty';
    public $primaryKey='id';
    protected $fillable = ['categoria','fecha'];
}
