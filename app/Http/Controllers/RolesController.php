<?php

namespace App\Http\Controllers;
use App\Models\Roles;
use App\Models\Permissions;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function fetchRoles(Request $req){
        $roles = Roles::all();
        $permissions = Permissions::where('parent_id',0)->get();

        
       
        // dd($main_branches);
        return view('web.roles',compact('roles','permissions'));
    }
    public function insertRole(Request $req){

        
        $parent = $req->get('parent');
        $child = $req->get('child');
  
        
        dd($parent,$child);
        

        

        return redirect('/roles');
    }
}
