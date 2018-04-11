<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function index(){
        $role = Role::all();
        return view('admin.role.index',compact('role'));
    }
    public  function createRole(Request $request){
            $this->validate($request,[
                'name'=>'required'
            ],[
                'name.required'=>'The field name required'
            ]);

            $role = new Role();

            $role->name = trim($request->input('name'));
            $role->user_id= Auth::user()->id;
            $role->save();
            return redirect('/role/view');
    }
    public function deleteRole(Request $request, $id){
          $role = Role::find($id);
          $role->delete();
          return redirect('/role/view');
    }
    public function edit($id){
        $role =Role::find($id);
        return view('admin.role.popup',compact('role'));
    }
    public function updateRole(Request $request,$id){
        $role = Role::find($id);
        $role->name=$request->input('name');
        $role->save();
        return redirect('/role/view');

    }


}
