<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    
    Protected $fillable = ['name','email','phone'];

    public function images(){

        return $this->hasMany(ProjectPhoto::class);
    }

    
 

}//end classs
