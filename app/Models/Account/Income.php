<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $guarded = [];
    public function category()
    {
        return $this->belongsTo('App\Models\Account\IncomeCategory', 'incomecategory');
    }
}
