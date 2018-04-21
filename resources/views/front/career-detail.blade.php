@extends('welcome')

@section('content')
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-12">
                        @foreach($car as $c)
                            <h4 style="font-size: 20px;" class="text-info {{Lang::locale()=='kh'? 'kh-moul' : 'career-title-en'}}">{{$c->pivot->title}}</h4>
                            <small class="text-primary {{Lang::locale()=='kh'? 'career-date-kh' : 'career-date-en'}}">{{trans('label.publish_date')}} : {{\Carbon\Carbon::parse($c->publish_date)->format('d-M-Y')}}</small> &nbsp;&nbsp;&nbsp; <small class="text-danger {{Lang::locale()=='kh'? 'career-date-kh' : 'career-date-en'}}">{{trans('label.close_date')}} : {{\Carbon\Carbon::parse($c->close_date)->format('d-M-Y')}}</small>
                        @endforeach
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            @foreach($car as $c)
                                {!! $c->pivot->description !!}
                            @endforeach
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