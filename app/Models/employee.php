<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class employee extends Model
{
    use SoftDeletes;

    function  jobType(){
        return $this->belongsTo(jobType::class,"job_type_id");
    }

    function employeeSalary(){
        return $this->hasMany(salary::class);
    }

    function employeeMessage(){
        return $this->hasMany(message::class);
    }

    function employeeHoliday(){
        return $this->hasMany(holidays::class);
    }

}
