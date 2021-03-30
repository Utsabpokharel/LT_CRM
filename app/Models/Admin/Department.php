<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $guarded = [];
    
    public function employee(){
        return $this->hasMany('App\Models\Admin\Employee');
    }
}
