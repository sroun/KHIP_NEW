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
                                @foreach($pro as $p)
                                    <h6 style="line-height: 30px;" class="text-info {{Lang::locale()==='kh' ? 'kh-moul' : 'time-roman'}}">{{$p->pivot->name}}</h6>
                                    <small><i class="fa fa-calendar margin-right-10"></i>{{\Carbon\Carbon::parse($p->created_at)->format('d-M-Y')}}</small><br>
                                    <small><i class="fa fa-clock-o margin-right-10"></i>{{\Carbon\Carbon::parse($p->created_at)->format('h:i a')}}</small>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="content-aboutus padding-14">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    @foreach($pro as $p)
                                        {!! $p->pivot->description !!}
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <h3 class="text-info {{Lang::locale()==='kh' ? 'kh-os' : 'time-roman'}}">{{trans('label.picdetail')}}</h3>
                        <div class="row">
                            <div class="col-lg-12">
                                @foreach($pro as $pros)
                                    @if(count($pros->photoproducts))
                                        @foreach($pros->photoproducts as $p)
                                            <div class="row no-gutters" style="float: left">
                                                <div class="portfolio-item wow fadeInUp">
                                                    <a href="{{asset("picDetailProduct/$p->name")}}" class="portfolio-popup">
                                                        <div class="item">
                                                            <img class="img-thumbnail" src='{{asset("picDetailProduct/$p->name")}}' alt="no image">
                                                            <div class="item-overlay top"></div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                @endforeach
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
                                @if(count($prod))
                                @foreach($prod as $pd)
                                    <a href="{{url('/product-detail/'.$pd->id)}}">
                                        <div class=" padding-14" id="hoverProduct">
                                            <img src="{{asset('mainProduct/'.$pd->photo)}}" class="show-product" alt="">
                                            @foreach($pd->languages()->where('language_id',$lang)->get() as $po)
                                                <div class=" {{Lang::locale()=='kh'? 'kh-os' : 'arial'}}">
                                                    {{$po->pivot->name}}
                                                </div>
                                            @endforeach
                                            <div style="clear: both;"></div>
                                        </div>
                                    </a>
                                @endforeach
                                    @else
                                    <h6 class="text-info padding-7px {{Lang::locale()==='kh' ? 'kh-os font-size-12' : 'arial'}}">{{trans('label.data_not_found')}}</h6>

                                @endif
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <br>
    </div>
@endsection

@section('script')

@endsection