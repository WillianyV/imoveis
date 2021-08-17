<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proximity extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'proximities';
    protected $fillable = ['name'];

    public function immobile(){
        // relacionamento N - N
        return $this->belongsToMany(Immobile::class, 'immobile_proximitie','proximity_id','immobile_id')->withTimestamps();
    }
}
