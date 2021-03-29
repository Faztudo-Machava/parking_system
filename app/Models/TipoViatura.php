<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoViatura extends Model
{
    use HasFactory;

    protected $table = 'tipo_viatura';
    protected $fillable = ['nome', 'descrição','data'];

    public function relViatura(){
        return $this->hasMany('App\Models\Viatura','tipo');
    }


}
