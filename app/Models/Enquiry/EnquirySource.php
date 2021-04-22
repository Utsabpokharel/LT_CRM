<?php

namespace App\Models\Enquiry;

use Illuminate\Database\Eloquent\Model;

class EnquirySource extends Model
{
    protected $guarded = [];
    
    public function enquiry()
    {
        return $this->hasMany('App\Models\Enquiry\Enquiry');
    }
}
