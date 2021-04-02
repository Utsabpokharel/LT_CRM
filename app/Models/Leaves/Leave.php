<?php

namespace App\Models\Leaves;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $guarded=[];
    public function applied()
    {
        return $this->belongsTo('App\Models\Admin\AllUser', 'applied_by');
    }
    public function checked()
    {
        return $this->belongsTo('App\Models\Admin\AllUser', 'checked_by');
    }
    public function leavetype()
    {
        return $this->belongsTo('App\Models\Leaves\LeaveType', 'leave_type');
    }
}