<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Database\Eloquent\Model;
use Hash, File;
use App\User;
use App\Timeline;
use App\Activity;

class SystemController extends Controller
{
    /**
     */
    public function getInstall()
    {
        if (!File::exists(base_path() . '/install.lock')) {
            // default user
            Model::unguard();
            \App\User::create([
                'nickname'      =>      'Rod',
                'email'         =>      'supgeek.rod@gmail.com',
                'phone'         =>      '17090402884',
                'password'      =>      Hash::make('hey community'),
            ]);

            \App\User::create([
                'nickname'      =>      'Robot',
                'email'         =>      'robot@hey-community.online',
                'phone'         =>      '12312312312',
                'password'      =>      Hash::make('hey community'),
            ]);
            Model::reguard();

            File::put(base_path() . '/install.lock', '');
        }

        //
        return redirect()->route('home');
    }

    /**
     */
    public function getState(Request $request)
    {
        if ($request->has('pw') && Hash::check($request->pw, '$2y$10$8e634fQcF26g5vlSrE89IubBRYsuVmNBjf/nWPNW85F8rLWSABt6S')) {
            $assign['users']        =   User::paginate();
            $assign['timelines']    =   Activity::all();
            $assign['activities']   =   Timeline::all();
            return view('admin.home.state', $assign);
        } else {
            return redirect()->route('home');
        }
    }
}
