<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fabricante extends Model
{
    use HasFactory;

    protected $table = 'fabricante';
    protected $fillable = ['nome', 'descrição','data'];

    public function relModelo(){
        return $this->hasMany('App\Models\Modelo','fabricante');
    }
}
