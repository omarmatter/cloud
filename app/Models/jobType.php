<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class jobType extends Model
{


    function employee(){
        return $this->hasMany(employee::class);
    }
}
