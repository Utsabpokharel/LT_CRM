<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Mail\PasswordChange;
use App\Models\Admin\AllUser;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class PasswordSettingsController extends Controller
{
    public function changepassword()
    {
        return view('Admin.Alluser.changepassword');
    }
    public function password_update(Request $request)
    {
        $request->validate([
            'old_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
        AllUser::find(Auth::user()->id)->update(['password' => Hash::make($request->new_password)]);
        Mail::to(Auth::user()->email)->send(new PasswordChange);
        Auth::logout();
        return redirect()->route('login')->with('success', 'Your Password has been changed,Please Login again.');
        Auth::logoutOtherDevices(request('password'));
    }
}
