<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Carbon\Carbon;
use App\User;
use App\Timeline;
use App\Topic;
use App\Notice;
use App\Activity;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assign = [];

        $weekDate = Carbon::today()->subWeek();
        $monthDate = Carbon::today()->subMonth();

        $assign['all']['user_num']              =       User::count();
        $assign['all']['notice_num']            =       Notice::withTrashed()->count();
        $assign['all']['timeline_num']          =       Timeline::count();
        $assign['all']['topic_num']             =       Topic::count();

        $assign['week']['user_num']              =       User::where('created_at', '>=', $weekDate)->count();
        $assign['week']['notice_num']            =       Notice::where('created_at', '>=', $weekDate)->withTrashed()->count();
        $assign['week']['timeline_num']          =       Timeline::where('created_at', '>=', $weekDate)->count();
        $assign['week']['topic_num']             =       Topic::where('created_at', '>=', $weekDate)->count();

        $assign['month']['user_num']              =       User::where('created_at', '>=', $monthDate)->count();
        $assign['month']['notice_num']            =       Notice::where('created_at', '>=', $monthDate)->withTrashed()->count();
        $assign['month']['timeline_num']          =       Timeline::where('created_at', '>=', $monthDate)->count();
        $assign['month']['topic_num']             =       Topic::where('created_at', '>=', $monthDate)->count();

        return view('admin.home.index', $assign);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
