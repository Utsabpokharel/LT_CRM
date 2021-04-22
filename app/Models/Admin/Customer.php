<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded = [];

    public function enquiry()
    {
        return $this->hasMany('App\Models\Enquiry\Enquiry');
    }
}
