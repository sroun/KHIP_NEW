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
                    <div class="content-aboutus padding-product">
                        <br>
                        <p class="{{Lang::locale()=='kh'? 'kh-os-no-bold' : 'arial'}} center font-size-12">
                            {{trans('label.data_not_found')}}
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection

@section('script')

@endsection