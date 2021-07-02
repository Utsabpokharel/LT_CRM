<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Model;

class ExpenseCategory extends Model
{
    protected $guarded = [];
    public function expense()
    {
        return $this->hasMany('App\Models\Account\Expense');
    }
}
