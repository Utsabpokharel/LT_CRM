<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\AllUser;

class DashboardController extends Controller
{
    public function index()
    {
         $usr=AllUser::count();
        // dd($user);
        return route('welcome',compact('usr'));
    }
}
