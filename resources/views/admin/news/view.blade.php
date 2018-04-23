<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="border-radius: 10px;">
        <div class="panel panel-default">
            <div class="panel-heading {{\Illuminate\Support\Facades\Lang::locale()==='kh' ? 'kh-moul' : 'time-roman'  }}">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                {{trans('label.detail')}}
            </div>
            <div class="panel-body">
                @foreach($news as $n)
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="text-blue {{\Illuminate\Support\Facades\Lang::locale()==='kh' ? 'kh-moul' : 'time-roman'  }} ">{{$n->pivot->title}}</h4>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-12">
                            {!! $n->pivot->content !!}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
