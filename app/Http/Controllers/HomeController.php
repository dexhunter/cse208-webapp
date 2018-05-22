<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth', ['except'=>['index']]);
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $acts = Activity::all();
        return view('pages.index')->with(array('activities'=>$acts));
    }

    public function searchByPageView(Request $request)
    {
        $acts = Activity::all()->sortByDesc(function ($act){
            return $act->page_views;
        });
        // $acts = Activity::orderBy('page_views', 'desc')->paginate(10);
        return view('activities.index')->with(array('activities'=>$acts, 'title'=>null));
    }

    public function about()
    {
        return view('pages.about');
    }


}
