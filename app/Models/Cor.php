<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cor extends Model
{
    use HasFactory;

    protected $table = 'cor';
    protected $fillable = ['nome', 'descrição','data'];

    public function relViatura(){
        return $this->hasMany('App\Models\Viatura','cor');
    }
}
