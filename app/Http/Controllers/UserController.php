<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        return view('signUp.index');
    }

    public function show(Request $request){
        return view('signUp.confirm',compact('request'));
    }
}
