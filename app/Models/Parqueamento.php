<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parqueamento extends Model
{
    use HasFactory;

    protected $table = 'parqueamento';

    public function relViatura(){
        return $this->hasOne('App\Models\Viatura','id','viatura');
    }

    public function relVaga(){
        return $this->hasOne('App\Models\Vaga','id','vaga');
    }

    public function relUser(){
        return $this->hasOne('App\Models\User','id','utilizador');
    }

    public function relCliente(){
        return $this->hasOne('App\Models\Cliente','id','cliente');
    }

    public function relLevantamento(){
        return $this->hasMany('App\Models\Levantamento','parqueamento');
    }
}
