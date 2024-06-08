<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    public function my_data(){
        return view('test');
    }

    public function receiveData(Request $request){
        $fname = $request->fname;
        $lname = $request->lname;
        return view('test1', compact('fname', 'lname'));
    }
}