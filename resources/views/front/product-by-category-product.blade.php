@extends('welcome')

@section('content')
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="container-product">
                    <div class="heading padding-product">
                        <div class="section-header">
                            <h2 class="{{Lang::locale()=='kh'? 'kh-os' : 'time-roman'}}">{{$categoryProductName}}</h2>

                        </div>
                        {{--<small style="font-family: 'Khmer OS Freehand';">{{trans('label.total'). " : " .count($product)}}</small>--}}
                    </div>
                    <div class="row">
                        @foreach($product as $prod)

                            <div class="col-lg-6">
                                <a href="{{url('/product-detail/'.$prod->id)}}">
                                    <div class="product-body padding-14" id="hoverProduct">
                                        <img src="{{asset('mainProduct/'.$prod->photo)}}" class="show-product" alt="">
                                        @foreach($prod->languages()->where('language_id',$lang)->get() as $pro)
                                            <div class="{{Lang::locale()=='kh'? 'tittle-product' : 'time-roman'}}">
                                                {{$pro->pivot->name}}
                                            </div>
                                            <div>
                                                <small style="color: #eb5516; font-family: 'Khmer OS';"><b>{{trans('label.brand')." : ".$prod->brand->name}}</b></small>
                                                / <small>{{\Carbon\Carbon::parse($prod->created_at)->format('d-M-Y')}}</small>
                                            </div>
                                            <div class="font-size-12 {{Lang::locale()=='kh'? 'kh-os-no-bold' : 'arial'}}">
                                                {{str_limit($pro->pivot->summary,116)}}
                                            </div>
                                        @endforeach
                                        <div style="clear: both;"></div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <br>
                    @if(count($product))
                        @if($proCount)
                            @if($get)
                                <div class="pagination">
                                    <div id="pageId">
                                    <a href="/product-by-category/{{$categoryId}}?page={{$_GET['page']-1<1? 1 :$_GET['page']-1}}" class="page {{Lang::locale()=='kh'?'kh-os':''}}">{{trans('label.previous')}}</a>
                                    @for($i=1; $i<=$proCount; $i++)
                                    <a href="http://localhost/product-by-category/{{$categoryId}}?page={{$i}}" class="page {{$i==$_GET['page']?'active':''}}">{{$i}}</a>
                                    @endfor
                                    <a href="http://localhost/product-by-category/{{$categoryId}}?page={{$_GET['page']+1>$proCount ? $proCount :$_GET['page']+1 }}" class="page {{Lang::locale()=='kh'?'kh-os':''}}" >{{trans('label.next')}}</a>
                                    </div>
                                </div>
                            @else
                                <div class="pagination">
                                    <a href="http://localhost/product-by-category/{{$categoryId}}?page={{1}}" class="page {{Lang::locale()=='kh'?'kh-os':''}}">{{trans('label.previous')}}</a>
                                    @for($i=1; $i<=$proCount; $i++)
                                    <a href="http://localhost/product-by-category/{{$categoryId}}?page={{$i}}" class="page {{$i==1?'active':''}}">{{$i}}</a>
                                    @endfor
                                    <a href="http://localhost/query-category/{{$categoryId}}?page={{1+1}}" class="page {{Lang::locale()=='kh'?'kh-os':''}}" >{{trans('label.next')}}</a>
                                </div>
                            @endif
                        @endif
                    @endif
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





