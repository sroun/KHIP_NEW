<?php

namespace App\Http\Controllers;

use App\Category;
use App\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Lang;

class frontController extends Controller
{
   public function productDetail(Request $re,$id){

       $locale = Lang::locale();
       $lang = Language::where('code',$locale)->value('id');
       $language = Language::find($lang);
       $pro = $language->products()->where('products.id',$id)->get();
       return view('front.product-detail',compact('pro','lang'));
   }
    public function careerDetail($id){

        $locale = Lang::locale();
        $lang = Language::where('code',$locale)->value('id');
        $language = Language::find($lang);
        $car = $language->careers()->where('careers.id',$id)->get();
        return view('front.career-detail',compact('car','lang'));
    }

   public function QueryByCategory($id){
       $locale = Lang::locale();
       $lang = Language::where('code',$locale)->value('id');
       $language = Language::find($lang);
       $cat = Category::find($id);

       if ($cat){
           $categoryName ="";
           $catName = $cat->languages()->where('language_id',$lang)->get();
           foreach ($catName as $c){
               $categoryName=$c->pivot->name;
           }

           $product = $cat->products()->orderBy('products.id','desc')->paginate(15);
           $aboutus = $cat->aboutuses()->where('category_id',$id)->get();
           $career = $cat->careers()->where('trash',0)->orderBy('careers.id','desc')->paginate(15);

           if(count($product)){
               return view('front.product',compact('product','lang','categoryName'));
           }else if(count($aboutus)) {
               return view('front.aboutus', compact('aboutus', 'lang', 'categoryName'));
           }else if(count($career)){
                   return view('front.career',compact('career','lang','categoryName'));
           }else{
               return view('front.none',compact('lang','categoryName'));
           }



       }else{
           return view('errors.404');
       }
   }
}
