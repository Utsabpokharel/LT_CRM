<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Model;

class IncomeCategory extends Model
{
    protected $guarded = [];
    public function income()
    {
        return $this->hasMany('App\Models\Account\Income');
    }
}
