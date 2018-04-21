@extends('welcome')

@section('content')
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="container-product">
                    <div class="heading padding-product">
                        <div class="section-header">
                            <h2 class="{{Lang::locale()=='kh'? 'kh-os' : 'time-roman'}}">{{$categoryName}}</h2>

                        </div>
                        {{--<small style="font-family: 'Khmer OS Freehand';">{{trans('label.total'). " : " .count($product)}}</small>--}}
                    </div>
                    <div>
                        @php
                            $catproId = 0;
                        @endphp
                    @foreach($product as $prod)
                        @foreach($prod->categoryproduct->languages()->where('language_id',$lang)->get() as $catPro)
                                    @if($catproId!=$prod->categoryproduct->id)
                                    <div class="padding-14">
                                        <div class="underline-tittle {{Lang::locale()=='kh'? 'tittle-product' : 'time-roman'}}">
                                            {{$catPro->pivot->name}}
                                            @php($catproId=$prod->categoryproduct->id)
                                            <a href='{{url("product-by-category/".$prod->categoryproduct->id)}}' class="pull-right  {{Lang::locale()=='kh'? 'kh-os-no-bold font-size-12' : 'arial'}}">{{trans('label.other')}}</a>
                                        </div>
                                        @php
                                            $productbycat =\App\Product::where([['categoryproduct_id',$catproId],['trash',0]])->orderBy('id','desc')->limit(4)->get();
                                        @endphp
                                        <br>
                                        <div class="container-fluid">
                                            <div class="row">
                                                @foreach($productbycat as $pp)
                                                    @foreach($pp->languages()->where('language_id',$lang)->get() as $pro)
                                                        <div class="col-lg-3 col-md-6 col-sm-12" >
                                                            <div class="form-group">
                                                                <a href="{{url('/product-detail/'.$pp->id)}}">
                                                                    <div>
                                                                        <div class="item-news container" id="item-news">
                                                                            <img src="{{asset('mainProduct/'.$pp->photo)}}" alt="No image" class="width-100 height-150">
                                                                            {{--@foreach($n->languages()->where('language_id',$lang)->get() as $new)--}}
                                                                            <div class="margin-top-5 line-height-25 orange {{Lang::locale()=='kh'? 'kh-os' : 'tittle-product'}}">
                                                                                {{str_limit($pro->pivot->name,70)}}
                                                                            </div>
                                                                            <div class="padding-5 font-size-12 {{Lang::locale()=='kh'? 'kh-os-no-bold' : 'arial'}}">
                                                                                {{str_limit($pro->pivot->summary,150)}}
                                                                            </div>
                                                                            <div class="padding-5">
                                                                                <small><i class="fa fa-calendar margin-right-10"></i>{{\Carbon\Carbon::parse($prod->created_at)->format('d-M-Y')}}</small><br>
                                                                                <small><i class="fa fa-clock-o margin-right-10"></i>{{\Carbon\Carbon::parse($prod->created_at)->format('h:i a')}}</small>
                                                                            </div>
                                                                            {{--@endforeach--}}
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                        @endforeach
                            {{--<div class="col-lg-6">--}}
                                {{--<a href="{{url('/product-detail/'.$prod->id)}}">--}}
                                    {{--<div class="product-body padding-14" id="hoverProduct">--}}
                                        {{--<img src="{{asset('mainProduct/'.$prod->photo)}}" class="show-product" alt="">--}}
                                        {{--@foreach($prod->languages()->where('language_id',$lang)->get() as $pro)--}}
                                            {{--<div class="{{Lang::locale()=='kh'? 'tittle-product' : 'time-roman'}}">--}}
                                                {{--{{$pro->pivot->name}}--}}
                                            {{--</div>--}}
                                            {{--<div>--}}
                                                {{--<small style="color: #eb5516; font-family: 'Khmer OS';"><b>{{trans('label.brand')." : ".$prod->brand->name}}</b></small>--}}
                                                {{--/ <small>{{\Carbon\Carbon::parse($prod->created_at)->format('d-M-Y')}}</small>--}}
                                            {{--</div>--}}
                                            {{--<div class="font-size-12 {{Lang::locale()=='kh'? 'kh-os-no-bold' : 'arial'}}">--}}
                                                {{--{{str_limit($pro->pivot->summary,116)}}--}}
                                            {{--</div>--}}
                                        {{--@endforeach--}}
                                        {{--<div style="clear: both;"></div>--}}
                                    {{--</div>--}}
                                {{--</a>--}}
                            {{--</div>--}}
                    @endforeach
                    </div>
                    {{--@if(count($product))--}}
                        {{--@if($proCount)--}}
                            {{--@if($get)--}}
                                {{--<div class="pagination">--}}
                                    {{--<div id="pageId">--}}
                                        {{--<a href="http://localhost/query-category/{{$cat->id}}?page={{$_GET['page']-1}}" class="page {{Lang::locale()=='kh'?'kh-os':''}}">{{trans('label.previous')}}</a>--}}
                                        {{--@for($i=1; $i<=$proCount; $i++)--}}
                                            {{--<a href="http://localhost/query-category/{{$cat->id}}?page={{$i}}" class="page {{$i==$_GET['page']?'active':''}}">{{$i}}</a>--}}
                                        {{--@endfor--}}
                                        {{--<a href="http://localhost/query-category/{{$cat->id}}?page={{$_GET['page']+1}}" class="page {{Lang::locale()=='kh'?'kh-os':''}}" >{{trans('label.next')}}</a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--@else--}}
                                {{--<div class="pagination">--}}
                                        {{--<a href="http://localhost/query-category/{{$cat->id}}?page={{1}}" class="page {{Lang::locale()=='kh'?'kh-os':''}}">{{trans('label.previous')}}</a>--}}
                                        {{--@for($i=1; $i<=$proCount; $i++)--}}
                                            {{--<a href="http://localhost/query-category/{{$cat->id}}?page={{$i}}" class="page {{$i==1?'active':''}}">{{$i}}</a>--}}
                                        {{--@endfor--}}
                                        {{--<a href="http://localhost/query-category/{{$cat->id}}?page={{1+1}}" class="page {{Lang::locale()=='kh'?'kh-os':''}}" >{{trans('label.next')}}</a>--}}
                                {{--</div>--}}
                            {{--@endif--}}
                        {{--@endif--}}
                    {{--@endif--}}
                </div>
                <br>

            </div>
            {{--<div class="col-lg-3">--}}

            {{--</div>--}}
        </div>
    </div>
@endsection

@section('script')
    <script>

    </script>
@endsection





