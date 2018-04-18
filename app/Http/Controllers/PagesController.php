<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return view('pages.index');
    } 

    public function about(){
        $data = array(
            'title' => 'About',
            'group' => 'FOX-TROT',
            'members' => ['Yinan Wang', 'Jialu Wang', 'Shujue Wang', 'Dixing Xu', 'Zeying Zhang', 'Haoru Xiao', 'Yutong Liu'],
        );
        return view('pages.about')->with($data);
    } 

}