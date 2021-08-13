<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $table = 'cities';
    protected $fillable = ['name'];

    //QUEM É O DONO DO RELACIONAMENTO?
    //quem não possui a chave estrangueira
    public function immobile(){
        // relacionamento 1 - N
        return $this->hasMany(Immobile::class,'city_id');
    }
}
