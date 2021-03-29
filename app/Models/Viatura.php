<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viatura extends Model
{
    use HasFactory;

    protected $table = 'viatura';

    public function relTipo(){
        return $this->hasOne('App\Models\TipoViatura','id','tipo');
    }

    public function relModelo(){
        return $this->hasOne('App\Models\Modelo','id','modelo');
    }

    public function relCor(){
        return $this->hasOne('App\Models\Cor','id','cor');
    }
}
