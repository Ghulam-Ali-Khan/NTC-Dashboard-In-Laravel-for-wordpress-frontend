<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function fetchUsers(Request $req){
       

        return view('web.users');
    }
}
