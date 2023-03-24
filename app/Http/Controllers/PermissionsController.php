<?php

namespace App\Http\Controllers;

use App\Models\Permissions;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{
    public function fetchPermissions(Request $req){
        $permissions = Permissions::all();

        $main_branches = Permissions::where('branch', 'Main')->get();
       
        // dd($main_branches);
        return view('web.permissions',compact('permissions','main_branches'));
    }

    public function insertPermission(Request $req){
        $name = $req->get('permission-name');
  
        $branch = $req->get('permissions-branch');
        $main_branch = $req->get('permissions-main-branch');
        

        if(($main_branch == "Null")||( $branch=="Main")){
            $main_branch = 0;
        }

        $permission = new Permissions();

        
        $permission->name = $name;
        $permission->branch = $branch;
        $permission->parent_id = $main_branch;
        $permission->save();

        return redirect('/permissions');
    }

    public function updatePermission(Request $req){
        $id = $req->get('u-id');
        $name = $req->get('u-permission-name');
        $branch = $req->get('u-permission-branch');
        $main_branch = $req->get('u-permission-main-branch');

        $permission =   Permissions::find( $id);
        
        $permission->name = $name;
        $permission->branch = $branch;
        $permission->main_branch = $main_branch;
        $permission->save();

        return redirect('/permissions');
    }

    public function destroy(Permissions $permission, $id)
    {
        $Permission = Permissions::findOrFail($id);
        if ($Permission)
        $Permission->delete();
        return redirect('/permissions');
    }
}
