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
                <div>
                <br style="clear: both;">
                    <div class="container-fluid">
                        <div class="row">
                            @foreach($client as $cli)
                                @foreach($cli->languages()->where('language_id',$lang)->get() as $c)
                                    <div class="col-sm-6 col-md-4 col-lg-2">
                                        <div class="form-group">
                                            <?php $logo = $c->pivot->logo;?>
                                                <div class="item">
                                                    <a href="{{$c->pivot->url}}" target="_blank" class="btn popoverData" data-content="{{$c->pivot->title}}" rel="popover" data-placement="bottom" data-original-title="{{trans('label.institution')}}" data-trigger="hover"><img style="padding: 15px;" class="img-fluid" src='{{asset("clientlogo/$logo")}}' alt="y"></a>
                                                </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    </div>

                    @if(count($client)>=15)
                        <div class="pagination">
                            <div class="container padding-product">
                                {{$client->links()}}
                            </div>
                        </div>
                    @endif
            </div>

        </div>
    </div>
@endsection

@section('script')
    <script>
//        http://jsfiddle.net/9P64a/
        $('.popoverData').popover();
    </script>
@endsection





