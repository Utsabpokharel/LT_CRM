<?php

namespace App\Models\Task;

use Illuminate\Database\Eloquent\Model;

class ToDo extends Model
{
    protected $guarded = [];
    public function user_todo()
    {
        return $this->belongsTo('App\Models\Admin\AllUser', 'user_id');
    }
    public function ReUser_todo()
    {
        return $this->belongsTo('App\Models\Admin\AllUser', 'ReUser_id');
    }
    public function superadmin()
    {
        return $this->belongsTo('App\Models\Admin\Employee', 'assignedBy');
    }
    public function employee()
    {
        return $this->belongsTo('App\Models\Admin\Employee', 'assignedTo');
    }
    public function reassignto()
    {
        return $this->belongsTo('App\Models\Admin\Employee', 'reAssignedTo');
    }
}
