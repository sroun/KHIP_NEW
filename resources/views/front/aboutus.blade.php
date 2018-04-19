@extends('welcome')

@section('content')
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="container-product">
                    <div class="heading padding-product">
                        <h4 class="{{Lang::locale()=='kh'? 'kh-os' : 'time-roman'}}">{{$categoryName}}</h4>
                    </div>
                    <div class="content-aboutus padding-14">
                        @foreach($aboutus as $a)
                            @foreach($a->languages()->where('language_id',$lang)->get() as $ab)
                                {!! $ab->pivot->description !!}
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection

@section('script')

@endsection