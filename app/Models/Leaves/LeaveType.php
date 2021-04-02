<?php

namespace App\Models\Leaves;

use Illuminate\Database\Eloquent\Model;

class LeaveType extends Model
{
    protected  $guarded=[];
     public function leaves()
    {
        return $this->hasMany('App\Models\Leaves\Leave');
    }
}