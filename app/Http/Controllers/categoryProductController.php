<?php

namespace App\Http\Controllers;

use App\Categoryproduct;
use App\Language;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;

class categoryProductController extends Controller
{
    public function index()
    {
        $locale = Lang::locale();
        $id = Language::where('code',$locale)->value('id');
        $l  = Language::find($id);
        $categoryproduct = $l;
        return view('admin.categoryproduct.view',compact('categoryproduct'));
    }


    public function create()
    {
       $lang    = Language::pluck('name','id');
       $locale = Lang::locale();
       $id = Language::where('code',$locale)->value('id');
       $l  = Language::find($id);
       $categoryProduct = $l->categoryproducts()->pluck('name','categoryproducts.id');
       return view('admin.categoryproduct.create',compact('lang','categoryProduct'));
    }

    public function changeParent($id){
        $l  = Language::find($id);
        $categoryProduct = $l->categoryproducts()->pluck('name','categoryproducts.id');
        return response()->json($categoryProduct);
    }

    public function store(Request $request)
    {
        if($request->ajax()){
           $catPro_id = 0;
           $language_id = $request->language_id;

            if($request->session()->has('Language')){
                $getLanguage = $request->session()->get('Language');
                $request->session()->forget('Language');
                $request->session()->put('Language',$getLanguage+[$language_id=>$language_id]);
            }else{
                $request->session()->put('Language',[$language_id=>$language_id]);
            }

            if($request->session()->has('categoryproduct_id')){
                $cat = $request->session()->get('categoryproduct_id');
                $catPro_id = $cat['categoryProduct'];
            }

            $languageID = $request->session()->get('Language');
            $language   = Language::whereNotIn('id',$languageID)->get();

            if(count($language)){
                $language = Language::whereNotIn('id',$languageID)->pluck('name','id');
            }else{
                $request->session()->forget('Language');
                $request->session()->forget('categoryproduct_id');
                $language = Language::pluck('name','id');
            }

            $categoryProdcut = Categoryproduct::where('id',$catPro_id)->get();
            if(count($categoryProdcut)){
                DB::table('categoryproduct_language')->insert(['language_id'=>$language_id,'categoryproduct_id'=>$catPro_id,'name'=>$request->name]);
            }else{
                $catPro = new Categoryproduct();
                if($request->parent_num){
                    $catPro->parent = $request->parent_num;
                }
                $catPro->date = Carbon::now()->toDateString();
                if ($request->publish=='on'){
                    $catPro->publish =1;
                }else{
                    $catPro->publish =0;
                }
                $catPro->trash =0;
                $catPro->user_id = Auth::user()->id;
                $catPro->user_modify =0;
                $catPro->save();
                $id = $catPro->id;
                $catPro->languages()->attach($language_id,['name'=>$request->name]);
                $request->session()->put('categoryproduct_id',['categoryProduct'=>$id]);
            }
            return response()->json(['language'=>$language]);
        }
    }


    public function show($id)//delete categoryProduct
    {
        $catPro = Categoryproduct::find($id);
        $catPro->trash=1;
        $catPro->save();
    }


    public function edit($id,$langId)
    {
        $l = Language::find($langId);
        $data = $l->categoryproducts()->where('categoryproduct_id',$id)->get();
        $parent = $l->categoryproducts()->where('trash',0)->pluck('name','categoryproduct_id');
        return view('admin.categoryproduct.edit',compact('data','parent'));
    }

    public function update(Request $request, $id)
    {
        $cate = Categoryproduct::find($id);
        if($request->parent_num) {
            $cate->parent = $request->parent_num;
        }else{
            $cate->parent = 0;
        }
        if ($request->publishedit=='on'){
            $cate->publish = 1;
        }else{
            $cate->publish = 0;
        }
        $cate->save();
        DB::table('categoryproduct_language')->where('id',$request->pivotId)->update(['name'=>$request->name]);
        return redirect()->back();
    }


    public function destroy($id)
    {
        //
    }
}
