<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Language;
use App\Position;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;

class DefaultController extends Controller
{
    public function index(){
        
        $role = Role::all();
        if(!count($role)){
            $Role = new Role();
            $Role->name = "administrator";
            $Role->description="Administrator";
            $Role->user_id=1;
            $Role->save();

            $Role = new Role();
            $Role->name = "user";
            $Role->description="Users";
            $Role->user_id=1;
            $Role->save();

            $Role = new Role();
            $Role->name = "guest";
            $Role->description="Guest";
            $Role->user_id=1;
            $Role->save();
        }

        $position = Position::all();
        if(!count($position)){
           $pos = new Position();
           $pos->name = "Administrator";
           $pos->description="Administrator";
           $pos->user_id=1;
           $pos->save();
        }

        $user = User::all();
        if(!count($user)){
           $users = new User();
           $users->active       =  1;
           $users->role_id      =   1;
           $users->position_id  =   1;
           $users->name         =   "Administrator";
           $users->username     =  "Administrator";
           $users->email        =  "Admin@gmail.com";
           $users->password     =  bcrypt('admin');
           $users->photo        =  "default_user.png";
           $users->save();

        }
        $lang = Language::all();
        if(!count($lang)){
            $lang = new Language();
            $lang->code = "en";
            $lang->icon="en.png";
            $lang->name="English";
            $lang->user_id=1;
            $lang->active=1;
            $lang->save();
            $lang = new Language();
            $lang->code = "kh";
            $lang->icon="kh.png";
            $lang->name="ខ្មែរ";
            $lang->user_id=1;
            $lang->active=1;
            $lang->save();
        }
        if(Auth::check()) {
            return view('admin.dashboard');
        }
        $locale = Lang::locale();
        $lang = Language::where('code',$locale)->value('id');
        $language = Language::find($lang);
        $pro = $language->products()->orderBy('products.id','desc')->limit(10)->get();
        $client = $language->clients()->where('trash',0)->get();
        $slider = $language->sliders()->where('trash',0)->get();
        $contact = Contact::limit(1)->get();
        $address="N/A";
        $phone="N/A";
        $email="N/A";
        foreach ($contact as $c){
            $address = $c->address;
            $phone = $c->phone_number;
            $email = $c->email;
        }
        return view('front.home',compact('pro','client','address','phone','email','slider'));
    }

    public function AdminPanel(){

        return view(' admin.dashboard');
    }


    public function locale(Request $request, $lang){
        $request->session()->put('locale',$lang);
    }

    public function frontLocale(Request $request, $lang){
        $request->session()->put('locale',$lang);
//        return redirect()->back();
//        return $request->session()->get('locale');
    }

}
