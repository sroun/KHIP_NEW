@extends('welcome')

@section('content')
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-12">
                        @foreach($pro as $p)
                            <h4 class="text-info {{Lang::locale()==='kh' ? 'kh-moul' : 'time-roman'}}">{{$p->pivot->name}}</h4>
                            <small><i class="fa fa-calendar margin-right-10"></i>{{\Carbon\Carbon::parse($p->created_at)->format('d-M-Y')}}</small><br>
                            <small><i class="fa fa-clock-o margin-right-10"></i>{{\Carbon\Carbon::parse($p->created_at)->format('h:i a')}}</small>
                        @endforeach
                    </div>
                </div>
                <br>
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
            <div class="row">
                <div class="col-lg-4">

                </div>
            </div>
        </div>
        <br>
    </div>
@endsection

@section('script')

@endsection