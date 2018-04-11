<?php

namespace App\Http\Controllers;

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
}
