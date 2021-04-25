<?php

namespace App\Models\Enquiry;

use Illuminate\Database\Eloquent\Model;

class EnquiryResponse extends Model
{
   protected $guarded = [];

   public function enquiry(){
      return $this->belongsTo('App\Models\Enquiry\Enquiry','enquiry_id');
  }
}