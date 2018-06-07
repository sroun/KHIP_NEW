@extends('welcome')

@section('content')
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="container-product">
                    <div class="heading padding-product">
                        <div class="section-header">
                            <h2 class="{{Lang::locale()=='kh'? 'kh-os' : 'time-roman'}}">{{$categoryName}}</h2>
                        </div>
                    </div>
                    <div class="content-aboutus padding-14">
                        @foreach($promotion as $p)
                            @foreach($p->languages()->where('language_id',$lang)->get() as $pro)
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="border border-radius padding-14">
                                                {!! $pro->pivot->description !!}
                                                <div class="padding-14">
                                                    <small><i class="fa fa-calendar margin-right-10"></i>{{\Carbon\Carbon::parse($p->created_at)->format('d-M-Y')}}</small><br>
                                                    <small><i class="fa fa-clock-o margin-right-10"></i>{{\Carbon\Carbon::parse($p->created_at)->format('h:i a')}}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
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
                                                <div class=" font-size-12 {{Lang::locale()=='kh'? 'kh-os' : 'arial'}}">
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
    </div>
@endsection

@section('script')

@endsection