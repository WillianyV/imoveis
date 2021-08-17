<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'addresses';
    protected $fillable = ['street','house_number','complement','district','immobile_id'];

    //O endereco pertence a um imovel, ou seja, a chave estangeira ('immobile_id') pertence a classe Imobille
    public function immobile(){
        return $this->belongsTo(Immobile::class,'immobile_id');
    }
}
