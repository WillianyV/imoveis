<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Goal extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'goals';
    protected $fillable = ['name'];

    public function immobile(){
        // relacionamento 1 - N
        return $this->hasMany(Immobile::class,'goal_id');
    }
}
