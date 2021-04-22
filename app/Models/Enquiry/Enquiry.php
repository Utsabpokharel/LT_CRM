<?php

namespace App\Models\Enquiry;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
   protected $guarded = [];
   public function category(){
      return $this->belongsTo('App\Models\Enquiry\EnquiryCategory','category_id');
  }

  public function source(){
      return $this->belongsTo('App\Models\Enquiry\EnquirySource','source_id');
  }

  public function customer(){
      return $this->belongsTo('App\Models\Admin\Customer','customer_id');
  }

  public function response(){
      return $this->hasMany(EnquiryResponse::class);

  }
}