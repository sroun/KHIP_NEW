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
                    </div>
                    <div class="content-aboutus padding-14">
                        <div class="row">
                            @foreach($news as $n)
                                <div class="col-lg-3 col-md-6 col-sm-12" >
                                    <div class="form-group">
                                        <a href="{{url('/new-detail/'.$n->id)}}">
                                            <div>
                                                <div class="item-news container" id="item-news">
                                                    <img src="{{asset('newsImages/'.$n->main_photo)}}" alt="No image" class="width-100 height-150">
                                                    @foreach($n->languages()->where('language_id',$lang)->get() as $new)
                                                        <div class="margin-top-5 line-height-25 orange {{Lang::locale()=='kh'? 'kh-os' : 'tittle-product'}}">
                                                            {{str_limit($new->pivot->title,50)}}
                                                        </div>
                                                        <div class="padding-5 font-size-12 {{Lang::locale()=='kh'? 'kh-os-no-bold' : 'arial'}}">
                                                            {{str_limit($new->pivot->main_content,120)}}
                                                        </div>
                                                        <div class="padding-5">
                                                            <small><i class="fa fa-calendar margin-right-10"></i>{{\Carbon\Carbon::parse($n->publish_date)->format('d-M-Y')}}</small><br>
                                                            <small><i class="fa fa-clock-o margin-right-10"></i>{{\Carbon\Carbon::parse($n->publish_date)->format('h:i a')}}</small>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                @if(count($news))
                                    @if($proCount)
                                        @if($get)
                                            <div class="pagination">
                                                <div id="pageId">
                                                    <a href="http://localhost/query-category/{{$cat->id}}?page={{$_GET['page']-1}}" class="page {{Lang::locale()=='kh'?'kh-os':''}}">{{trans('label.previous')}}</a>
                                                    @for($i=1; $i<=$proCount; $i++)
                                                        <a href="http://localhost/query-category/{{$cat->id}}?page={{$i}}" class="page {{$i==$_GET['page']?'active':''}}">{{$i}}</a>
                                                    @endfor
                                                    <a href="http://localhost/query-category/{{$cat->id}}?page={{$_GET['page']+1}}" class="page {{Lang::locale()=='kh'?'kh-os':''}}" >{{trans('label.next')}}</a>
                                                </div>
                                            </div>
                                        @else
                                            <div class="pagination">
                                                <a href="http://localhost/query-category/{{$cat->id}}?page={{1}}" class="page {{Lang::locale()=='kh'?'kh-os':''}}">{{trans('label.previous')}}</a>
                                                @for($i=1; $i<=$proCount; $i++)
                                                    <a href="http://localhost/query-category/{{$cat->id}}?page={{$i}}" class="page {{$i==1?'active':''}}">{{$i}}</a>
                                                @endfor
                                                <a href="http://localhost/query-category/{{$cat->id}}?page={{1+1}}" class="page {{Lang::locale()=='kh'?'kh-os':''}}" >{{trans('label.next')}}</a>
                                            </div>
                                        @endif
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection

@section('script')

@endsection