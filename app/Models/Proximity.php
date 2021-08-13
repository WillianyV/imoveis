<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proximity extends Model
{
    use HasFactory;
    protected $table = 'proximities';
    protected $fillable = ['name'];

    public function immobile(){
        // relacionamento N - N
        return $this->belongsToMany(Immobile::class, 'immobile_proximitie','proximity_id','immobile_id')->withTimestamps();
    }
}
