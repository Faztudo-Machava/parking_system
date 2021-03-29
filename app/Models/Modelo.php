<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    use HasFactory;

    protected $table = 'modelo';

    public function relFabricante(){
        return $this->hasOne('App\Models\Fabricante','id', 'fabricante');
    }

    public function relViatura(){
        return $this->hasMany('App\Models\Viatura','modelo');
    }
}
