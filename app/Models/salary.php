<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class salary extends Model
{

    function  employee(){
        return $this->belongsTo(employee::class,"employee_id");
    }

}
