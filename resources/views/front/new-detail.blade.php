@extends('welcome')

@section('content')
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="container-product">
                    <div class="heading padding-product">
                        <div class="row">
                            <div class="col-lg-12">
                                @foreach($news as $p)
                                    <h6 style="line-height: 30px;" class="text-info {{Lang::locale()==='kh' ? 'kh-moul' : 'time-roman'}}">{{$p->pivot->title}}</h6>
                                    <small><i class="fa fa-calendar margin-right-10"></i>{{\Carbon\Carbon::parse($p->created_at)->format('d-M-Y')}}</small><br>
                                    <small><i class="fa fa-clock-o margin-right-10"></i>{{\Carbon\Carbon::parse($p->created_at)->format('h:i a')}}</small>
                                @endforeach
                            </div>
                        </div>
                        {{--<div class="section-header">--}}
                        {{--</div>--}}
                    </div>
                    <div class="content-aboutus padding-14">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    @foreach($news as $p)
                                        {!! $p->pivot->content !!}
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <div class="container-product">
                            <div class="heading padding-product">
                                <h6 class="text-info padding-7px {{Lang::locale()==='kh' ? 'kh-os font-size-12' : 'arial'}}">{{trans('label.other')}}</h6>
                            </div>
                            <div class="content-aboutus padding-14">
                                @foreach($newsR as $n)
                                    <a href="{{url('/new-detail/'.$n->id)}}">
                                        <div class=" padding-14" id="hoverProduct">
                                            <img src="{{asset('newsImages/'.$n->main_photo)}}" class="show-product" alt="">
                                            @foreach($n->languages()->where('language_id',$langId)->get() as $ns)
                                                <div class=" {{Lang::locale()=='kh'? 'kh-os' : 'arial'}}">
                                                    {{$ns->pivot->title}}
                                                </div>
                                                {{--<div class="font-size-12 {{Lang::locale()=='kh'? 'kh-os-no-bold' : 'arial'}}">--}}
                                                    {{--{{str_limit($ns->pivot->summary,116)}}--}}
                                                {{--</div>--}}
                                            @endforeach
                                            <div style="clear: both;"></div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

        </div>
    </div>
@endsection

@section('script')

@endsection