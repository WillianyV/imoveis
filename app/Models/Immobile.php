<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Immobile extends Model
{
    use HasFactory;
    protected $table = 'immobiles';
    protected $fillable = ['title','ground','living_room','bathroom','room','garage','descrytion','price','city_id','type_id','goal_id'];

    //no modelo endereco tem um imovel
    public function address(){
        //relacionamento 1 - 1
        //classe onde tem Um imovel (endereco) e a chave estrangueira
        return $this->hasOne(Address::class, 'immobile_id');
    }

    public function city(){
        //relacionamento 1 - N
        return $this->belongsTo(City::class, 'city_id');
    }

    public function type(){
        //relacionamento 1 - N
        return $this->belongsTo(City::class, 'type_id');
    }

    public function goal(){
        //relacionamento 1 - N
        return $this->belongsTo(City::class, 'goal_id');
    }

    public function proximity(){
        //relacionamento N - N
        return $this->belongsToMany(Proximity::class, 'immobile_proximitie','immobile_id','proximity_id')->withTimestamps();
        //nome da tabela intermediaria (immobile_proximitie) 
        // e a chave estrangeira da tabela pivot com relação ao modelo  'immobile_id' 
        // e a chave estrangeira da tabela pivot com relação ao  OUTRO modelo 'proximity_id'     
    }

}
