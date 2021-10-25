<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    protected $guarded = ['id'];
    
    use HasFactory;
    //Relacion uno a uno
    public function lesson(){
        return $this->hasOne('App\Models\Lesson');
    }
}
 