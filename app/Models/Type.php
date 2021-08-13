<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    protected $table = 'types';
    protected $fillable = ['name'];

    public function immobile(){
        // relacionamento 1 - N
        return $this->hasMany(Immobile::class,'type_id');
    }
}
