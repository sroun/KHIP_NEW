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
                    @foreach($career as $car)
                        <a href="{{url('/career-detail/'.$car->id)}}">
                            <table cellpadding="20px" class="career-body">
                                @foreach($car->languages()->where('language_id',$lang)->get() as $c)
                                    <tr>
                                        <td>
                                            <div class="{{Lang::locale()=='kh'? 'career-title-kh' : 'career-title-en'}}">
                                                {{$c->pivot->title}}<br>
                                            </div>
                                        </td>
                                        <td class="{{Lang::locale()=='kh'? 'career-kh' : 'career-en'}}" width="15%">
                                            <div>
                                                {{$car->location}}
                                            </div>
                                        </td>
                                        <td class="center {{Lang::locale()=='kh'? 'career-kh' : 'career-en'}}" width="12%">
                                            <?php
                                                echo \Illuminate\Support\Facades\DB::table('jobtype_language')->select('name')->where('jobtype_id',$car->jobtype_id)->where('language_id',$lang)->value('name');
                                            ?>
                                        </td>
                                        <td style="text-align: right;" width="13%" class="{{Lang::locale()=='kh'? 'career-kh' : 'career-en'}}">
                                            <div style="color: red">
                                                <i class="fa fa-calendar margin-right-10"></i>{{\Carbon\Carbon::parse($car->close_date)->format('d-M-Y')}}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </a>
                    @endforeach
                    @if(count($career)>=15)
                        <div class="pagination">
                            <div class="container padding-product">
                                {{$career->links()}}
                            </div>
                        </div>
                    @endif
                </div>
                <br>
            </div>
        </div>
    </div>
@endsection
@section('script')

@endsection