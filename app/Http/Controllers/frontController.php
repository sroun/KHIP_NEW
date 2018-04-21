<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Category;
use App\Language;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Lang;

class frontController extends Controller
{
   public function productByProductCategory(Request $request,$categoryId){
       $get = $request->get('page');
       $locale = Lang::locale();
       $lang = Language::where('code',$locale)->value('id');
       $language = Language::find($lang);
       $language->categoryproducts;
       $categoryProductName ="";
       $catName = $language->categoryproducts()->where([['language_id',$lang],['categoryproducts.id',$categoryId]])->get();
       foreach ($catName as $c){
           $categoryProductName=$c->pivot->name;
       }
       $product = Product::where([['categoryproduct_id',$categoryId],['trash',0]])->paginate(2);
       if(count($product)){
           $pro = Product::where([['categoryproduct_id',$categoryId],['trash',0]])->get();
           $proCount = $proCount=round(count($pro)/2);
           return view('front.product-by-category-product',compact('categoryProductName','lang','product','categoryId','proCount','get'));
       }else{
           return view('errors.404');
       }
   }


   public function productDetail(Request $re,$id){

       $locale = Lang::locale();
       $lang = Language::where('code',$locale)->value('id');
       $language = Language::find($lang);
       $pro = $language->products()->where('products.id',$id)->get();
       if(count($pro)){
           return view('front.product-detail',compact('pro','lang'));
       }else{
           return view('errors.404');
       }
   }

   public function QueryByCategory(Request $request,$id){
       $locale = Lang::locale();
       $lang = Language::where('code',$locale)->value('id');
       $language = Language::find($lang);
       $cat = Category::find($id);
       if ($cat){
           $get = $request->get('page');
           $categoryName ="";
           $catName = $cat->languages()->where('language_id',$lang)->get();
           foreach ($catName as $c){
               $categoryName=$c->pivot->name;
           }

           $product = $cat->products()->orderBy('categoryproduct_id','desc')->paginate(18);
           $aboutus = $cat->aboutuses()->where('category_id',$id)->get();
           $news = $cat->activities()->orderBy('activities.id','desc')->paginate(2);

           if(count($product)){
//               $pro = Product::where('trash',0)->get();
//               $proCount=round(count($pro)/18);
               return view('front.product',compact('product','lang','categoryName'));

           }else if(count($aboutus)){

               return view('front.aboutus',compact('aboutus','lang','categoryName','cat','get'));

           }else if(count($news)){
               $pro = Activity::where('trash',0)->get();
               $proCount=round(count($pro)/2);
               return view('front.news',compact('news','lang','categoryName','cat','get','proCount'));

           }
           else{
               return view('front.none',compact('lang','categoryName'));
           }
       }else{
           return view('errors.404');
       }
   }
}
