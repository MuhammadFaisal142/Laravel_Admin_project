<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function UserDashboard(){
        return view('user.users');
    }//End Method
}
