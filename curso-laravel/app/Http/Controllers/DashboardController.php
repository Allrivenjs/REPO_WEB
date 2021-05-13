<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request){
        $title=$request->query('title','Valor default');
        return view('Dashboard',[
            'title'=>$title
        ]);
    }
}
