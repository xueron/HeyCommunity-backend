<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth, Hash;
use App\User;

class AuthController extends Controller
{
    /**
     */
    public function getLogin()
    {
        return view('admin.auth.login');
    }

    /**
     */
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'phone'     =>  'required',
            'password'  =>  'required',
        ]);

        $User = User::where('phone', $request->phone)->where('is_admin', 1)->first();
        if ($User && Hash::check($request->password, $User->password)) {
            Auth::user()->login($User);
            return redirect()->route('admin.home');
        } else {
            return back()->withInput()->withErrors(['fail' => 'email or password error']);
        }
    }

    /**
     */
    public function anyLogout()
    {
        Auth::user()->logout();
        return redirect()->route('home');
    }

}

