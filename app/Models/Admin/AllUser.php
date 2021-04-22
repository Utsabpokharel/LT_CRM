<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AllUser extends Authenticatable
{
    use Notifiable;
    
    protected $fillable = ['username','email','status','password','role'];
    
    protected $hidden = ['password'];

    public function roles(){
        return $this->belongsTo('App\Models\Admin\Role','role');
    }
}
