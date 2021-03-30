<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class AllUser extends Model
{
    protected $fillable = ['username','email','status','password','role'];

    public function roles(){
        return $this->belongsTo('App\Models\Admin\Role','role');
    }
}
