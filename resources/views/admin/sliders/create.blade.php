@extends('admin.master')

@section('content')
    <br>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading {{\Illuminate\Support\Facades\Lang::locale()==='kh' ? 'kh-moul' : 'time-roman'  }}">
                {{trans('label.slide_show')}}
            </div>
            <div class="panel-body">
                <div id="editSlide">
                {!! Form::open(['action'=>'SliderController@store','method'=>'POST','files'=>true]) !!}
                <div class="row">
                    <div class="col-md-5">
                        <div class="row">
                            <input type="hidden" name="slider_id" id="slider_id" value="0">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <span class="{{\Illuminate\Support\Facades\Lang::locale()=='kh'? 'kh-os required' : 'arial required'}}">{{trans('label.language_name')}}</span>
                                    {!! Form::select('language_id',$language,null,['class'=>Lang::locale()=='kh'? 'kh-os edit-form-control text-blue height-35' : 'arial edit-form-control text-blue height-35','id'=>'lang','placeholder'=>trans('label.choose_item')])!!}
                                    @if($errors->has('language_id'))
                                        <span class="text-danger">
                                        {{$errors->first('language_id')}}
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <span class="{{\Illuminate\Support\Facades\Lang::locale()=='kh'? 'kh-os required' : 'arial required'}}">{{trans('label.description')}}</span>
                                    {!! Form::textarea('description',null,['class'=>Lang::locale()=='kh'? 'kh-os edit-form-control text-blue' : 'arial edit-form-control text-blue','rows'=>7,'placeholder'=>trans('label.description')])!!}
                                    @if($errors->has('description'))
                                        <span class="text-danger">
                                            {{$errors->first('description')}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <span class="{{\Illuminate\Support\Facades\Lang::locale()=='kh'? 'kh-os required' : 'arial required'}}">{{trans('label.photo')}}</span>
                                    <input type="file" class="edit-form-control" id="image" onchange="loadFile(event)" name="image" accept="image/x-png,image/gif,image/jpeg" style="display: none;">
                                    <label for="image" class="cursor-pointer"><img src="{{asset('/imageSlider/default.png')}}" alt="" class="img-responsive" id="preView" style="border: 1px solid #346895; padding: 1px;margin-top:2px; border-radius: 1px;"></label>
                                    @if($errors->has('image'))
                                        <span class="text-danger">
                                                {{$errors->first('image')}}
                                            </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="form-group">
                    {!! Form::submit(trans('label.create'),['class'=>Lang::locale()==='kh' ? 'kh-os btn btn-success btn-sm':'arial btn btn-success btn-sm']) !!}
                    {!! Form::reset(trans('label.reset'),['class'=>Lang::locale()==='kh' ? 'kh-os btn btn-warning btn-sm':'arial btn btn-warning btn-sm']) !!}
                </div>
                {!! Form::close() !!}
                </div>

            </div>
            <div class="panel-footer">
                <div class="container-fluid">
                    <div id="viewSlider">
                        <div class="center">
                            <i class="fa fa-spinner fa-spin" style="font-size:24px"> </i> <span>&nbsp; Wait...</span>
                        </div>
                    </div>
                </div>
            </div>

            <div id="testing">

            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">

        var loadFile = function(event) {
            var output = document.getElementById('preView');
            output.src = URL.createObjectURL(event.target.files[0]);
        };
        var loadFileEdit = function(event) {
            var output = document.getElementById('preViewEdit');
            output.src = URL.createObjectURL(event.target.files[0]);
        };


        function getViewSlider() {
            $.ajax({
                type:'get',
                url:"{{route('slider.index')}}",
                dataType:'html',
                success:function (data) {
                    $('#viewSlider').html(data);
                },
                error:function (error) {
                    console.log(error);
                }
            });
        }
        $(document).ready(function () {
            getViewSlider();
        });


        function deleteSlider(id) {
            swal({
                title: "{{trans('label.are_you_sure')}}",
                text: "{{trans('label.are_you_sure_delete')}}",
                type: "warning",
                showCancelButton:true,
                closeOnConfirm: false,
                cancelButtonText: "{{trans('label.no')}}",
                confirmButtonText: "{{trans('label.yes')}}",
                confirmButtonColor: "#ec6c62"
            }, function() {
                $.ajax({
                    url : "{{url('/slider/delete')}}"+"/"+id,
                    type: "get",
                    dataType: 'html'
                })
                    .done(function(data) {
                        swal("Deleted!", "Your file was successfully deleted!", "success");
                        $(document).ready(function () {
                            getViewSlider();
                        });
                    })
                    .error(function(data) {
                        swal("Oops", "We couldn't connect to the server!", "error");
                    });
            });
        }

        function cancel() {
            window.location.reload();
        }

    </script>
@endsection