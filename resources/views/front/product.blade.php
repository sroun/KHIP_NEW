@extends('welcome')

@section('content')
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="container-product">
                    <div class="heading padding-product">
                        <h4 class="{{Lang::locale()=='kh'? 'kh-os' : 'time-roman'}}">{{$categoryName}}</h4>
                        <small style="font-family: 'Khmer OS Freehand';">{{trans('label.total'). " : " .count($product)}}</small>
                    </div>
                    <br>
                    @foreach($product as $prod)
                        <a href="{{url('/product-detail/'.$prod->id)}}">
                            <div class="product-body padding-product" id="hoverProduct">
                                <img src="{{asset('mainProduct/'.$prod->photo)}}" class="show-product" alt="">
                                @foreach($prod->languages()->where('language_id',$lang)->get() as $pro)
                                    <div class="{{Lang::locale()=='kh'? 'tittle-product' : 'time-roman'}}">
                                        {{$pro->pivot->name}}
                                    </div>
                                    <div>

                                        <small style="color: #eb5516; font-family: 'Khmer OS';"><b>{{trans('label.brand')." : ".$prod->brand->name}}</b></small>
                                        / <small>{{\Carbon\Carbon::parse($prod->created_at)->format('d-M-Y')}}</small>
                                    </div>
                                    <div class="font-size-12 {{Lang::locale()=='kh'? 'kh-os-no-bold' : 'arial'}} margin-top-5">
                                        {{str_limit($pro->pivot->summary,200)}}
                                    </div>
                                @endforeach
                            </div>
                        </a>
                    @endforeach
                    @if(count($product)>=15)
                    <div class="pagination">
                        <div class="container padding-product">
                            {{$product->links()}}
                        </div>
                    </div>
                        @endif
                </div>
                <br>

            </div>
            <div class="col-lg-3">

            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection