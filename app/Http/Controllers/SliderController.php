<?php

namespace App\Http\Controllers;

use App\Language;
use App\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locale = Lang::locale();
        $l = Language::where('code',$locale)->value('id');
        $lang = Language::find($l);
        $slider = $lang->sliders()->where('trash',0)->paginate(10);
        return view('admin.sliders.index',compact('slider','l'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locale = Lang::locale();
        $lang=[];
        if(Session::has('slider_lang_id')){
            $lang = Session::get('slider_lang_id');
        }
        $language = Language::whereNotIn('id',$lang)->where('active',1)->pluck('name','id');
        $l = Language::where('code',$locale)->value('id');
        $lang = Language::find($l);
        return view('admin.sliders.create',compact('language'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'language_id' => 'required',
            'description'      =>'required',
            'image' => 'required|image',
        ],[
            'language_id.required'     =>trans('label.choose_item'),
            'description' => trans('label.fill'),
            'image.required'        =>trans('label.image_required'),
            'image.image'        =>trans('label.image_mimes'),
        ]);

        $array_one[$request->language_id]=$request->language_id;
        if($request->session()->has('slider_lang_id')){
            $lang = $request->session()->get('slider_lang_id');
            $request->session()->forget('slider_lang_id');
            $request->session()->put('slider_lang_id',$lang+$array_one);
        }else{
            $request->session()->put('slider_lang_id',$array_one);
        }

        $id =0;
        if($request->session()->has('slider_id')){
            $sli = $request->session()->get('slider_id');
            foreach ($sli as $s){
                $id = $s;
            }
        }

        $array_lang = $request->session()->get('slider_lang_id');
        $language = Language::whereNotIn('id',$array_lang)->pluck('name','id');
        if(!count($language)){
            $request->session()->forget('slider_lang_id');
            $request->session()->forget('slider_id');
            $language = Language::pluck('name','id');
        }
        $check = Slider::where('id',$id)->get();
        if (!count($check)) {
            $time =Carbon::now()->format('s');
            $imageSlider="default.png";
            if($file =$request->file('image')){
                $imageSlider=$time."_".$file->getClientOriginalName();
                $file->move('imageSlider',$imageSlider);
            }
            $slider = new Slider();
            $slider->image = $imageSlider;
            $slider->trash = 0;
            $slider->user_id = Auth::user()->id;
            $slider->save();
            $id = $slider->id;

            $request->session()->put('slider_id', [$id => $id]);
            $slider->languages()->attach($request->language_id, ['description'=>$request->description]);
            return redirect()->back();
        } else {
            DB::table('language_slider')->insert(['language_id' => $request->language_id, 'slider_id' => $id, 'description' => $request->description]);
            if (!$request->session()->has('slider_lang_id')) {
                $id = 0;
            }
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$langId)
    {
        $lang = Language::find($langId);
        $data = $lang->sliders()->where('slider_id',$id)->get();
        return view('admin.sliders.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'description'      =>'required',
        ],[
            'description' => trans('label.fill'),
        ]);
        $sli = Slider::find($id);
        $time =Carbon::now()->format('s');
        $imageSlider="default.png";
        if($file =$request->file('imageEdit')){
            $imageSlider=$time."_".$file->getClientOriginalName();
            $file->move('imageSlider',$imageSlider);
            $photoName = $sli->image;
            $sli->image = $imageSlider;
            if($photoName!='default.png'){

                unlink(public_path('imageSlider/'.$photoName));
            }

        }
        $sli->save();
        DB::table('language_slider')->where('id',$request->pivotId)->update(['description'=>$request->description]);
        return redirect(route('slider.create'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sli = Slider::find($id);
        $sli->trash = 1;
        $sli->save();
    }
}
