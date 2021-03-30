<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $guarded = [];

     public function department(){
        return $this->belongsTo('App\Models\Admin\Department','department');
    }
}
