<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'cliente';
    protected $fillable = ['nome', 'apelido', 'email','saldo','genero','data'];

    public function relParqueamento(){
        return $this->hasMany('App\Models\Parqueamento','cliente');
    }
}
