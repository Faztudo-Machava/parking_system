<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Levantamento extends Model
{
    use HasFactory;

    protected $table = 'levantamento';

    public function relParqueamento(){
        return $this->hasOne('App\Models\Parqueamento','id','parqueamento');
    }

    public function relUser(){
        return $this->hasOne('App\Models\User','id','utilizador');
    }
}
