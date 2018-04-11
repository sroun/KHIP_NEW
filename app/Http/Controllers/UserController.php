<?php

namespace App\Http\Controllers;

use App\Position;
use App\Role;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function create(){

        $role = Role::pluck('name','id');
        $position =Position::pluck('name','id');
        $user = User::where('active',1)->get();
        return view('admin.users.create',compact('role','position','user'));
    }


    public function stored(Request $request){
        $this->validate($request,[
            'name'          =>'required',
            'username'      =>'required',
            'email'         =>'required|unique:users',
            'password'      =>'required',
            'confirm_pass'  =>'required',
            'role'          =>'required',
            'position'      =>'required',
            'image'         =>'image|mimes:jpeg,png'
        ],[
            'name.required'         =>'field name required',
            'username.required'     =>'field user name required',
            'email.required'        =>'field email required',
            'email.unique'          =>'Email already existed',
            'role.required'         =>'please choose one role',
            'position.required'     =>'please choose on position',
            'image.image'           =>'only image'
        ]);
        $time =Carbon::now()->toDateString();
        $name="default_user.png";
        if($file =$request->file('image')){
            $name=$time."_".$file->getClientOriginalName();
            $file->move('photo',$name);
        }
        $user = new User();
        $user->role_id      =$request->input('role');
        $user->position_id  =$request->input('position');
        $user->name         =$request->input('name');
        $user->username     =$request->input('username');
        $user->email        =$request->input('email');
        $user->password     =bcrypt($request->input('password'));
        $user->photo        = $name;
        $user->active       =1;
        $user->save();

        return redirect()->back();
    }

    public function edit(Request $request,$id){

        if(is_numeric($id)){
            $user     = User::find($id);
            $role     = Role::pluck('name','id');
            $position = Position::pluck('name','id');
            return view('admin.users.edit',compact('user','role','position'));
        }
        return view('admin.errors.404');
    }

    public function update(Request $request,$id){
        $time =Carbon::now()->toDateString();
        $ds = DIRECTORY_SEPARATOR;
        $user = User::findOrFail($id);
        $oldName = $user->photo;
        $user->name     = $request->input('name');
        $user->username = $request->input('username');
        $user->role_id  = $request->input('role_id');
        $user->position_id = $request->input('position_id');
        if($file =$request->file('imageEdit')){
            if($oldName!="default_user.png"){
                unlink(public_path('photo'.$ds.$oldName));
            }
            $name=$time."_".$file->getClientOriginalName();
            $file->move('photo',$name);
            $user->photo = $name;
        }
        $user->save();
        return redirect()->back();
    }
    public function delete($id){
        $us = User::findOrFail($id);
        $us->active=0;
        $us->save();
    }
    public function getUserList(){

        $user = User::where('active',1)->get();
        return view('admin.users.table_list_user',compact('user'));
    }

    public function viewUser($id){
        if(is_numeric($id)) {
            $user = User::findOrFail($id);
            return view('admin.users.view', compact('user'));
        }
        return view('admin.errors.404');
    }

    public function resetPassword($id){
        $user = User::findOrFail($id);
        return view('admin.users.resetPassword',compact('user'));
    }
    public function resetPasswordSuccess(Request $request,$id){
        $user = User::findOrFail($id);
        $user->password =bcrypt($request->input('password'));
        $user->save();
        return redirect()->back();
    }
}
