<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Information;
use App\User;
use Auth;

class InformationController extends Controller
{
    public function index (){
        $information = Information::all();

        // $posts = Auth::User()->informations->latest()->get();

        // dd($posts);
        
        return view('student.information',compact('information'));
    }
}
