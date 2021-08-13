<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Immobile extends Model
{
    use HasFactory;
    protected $table = 'immobiles';
    protected $fillable = ['title','ground','living_room','bathroom','room','garage','descrytion','price','city_id','type_id','goal_id'];
}
