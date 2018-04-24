@extends('admin.master')

@section('content')
    <br>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading {{\Illuminate\Support\Facades\Lang::locale()==='kh' ? 'kh-moul' : 'time-roman'  }}">
                {{trans('label.client')}}
            </div>
            <div class="panel-body">
                <div id="editCli">
                {!! Form::open(['action'=>'ClientController@store','method'=>'POST','files'=>true]) !!}
                <div class="row">
                    <div class="col-md-10">
                        <div class="row">
                            <input type="hidden" name="client_id" id="client_id" value="0">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <span class="{{\Illuminate\Support\Facades\Lang::locale()=='kh'? 'kh-os' : 'arial'}}">{{trans('label.language_name')}}</span>
                                    {!! Form::select('language_id',$language,null,['class'=>Lang::locale()=='kh'? 'kh-os edit-form-control text-blue height-35' : 'arial edit-form-control text-blue height-35','required'=>'true','id'=>'lang','placeholder'=>trans('label.choose_item')])!!}
                                    @if($errors->has('language_id'))
                                        <span class="text-danger">
                                        {{$errors->first('language_id')}}
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <span class="{{\Illuminate\Support\Facades\Lang::locale()=='kh'? 'kh-os' : 'arial'}}">{{trans('label.institution')}}</span>
                                    {!! Form::text('title',null,['class'=>Lang::locale()=='kh'? 'kh-os edit-form-control text-blue height-35' : 'arial edit-form-control text-blue height-35','required'=>'true','placeholder'=>trans('label.institution')])!!}
                                    @if($errors->has('title'))
                                        <span class="text-danger">
                                            {{$errors->first('title')}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <span class="{{\Illuminate\Support\Facades\Lang::locale()=='kh'? 'kh-os' : 'arial'}}">{{trans('label.category_name')}}</span>
                                    {!! Form::select('category_id',$category,0,['class'=>Lang::locale()=='kh'? 'kh-os edit-form-control text-blue height-35' : 'arial edit-form-control text-blue height-35','id'=>'par','placeholder'=>trans('label.choose_item')])!!}
                                    @if($errors->has('category_id'))
                                        <span class="text-danger">
                                        {{$errors->first('category_id')}}
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <span class="{{\Illuminate\Support\Facades\Lang::locale()=='kh'? 'kh-os' : 'arial'}}">{{trans('label.url')}}</span>
                                    {!! Form::text('url',null,['class'=>Lang::locale()=='kh'? 'kh-os edit-form-control text-blue height-35' : 'arial edit-form-control text-blue height-35','required'=>'true','placeholder'=>trans('label.placeholder_url')])!!}
                                    @if($errors->has('url'))
                                        <span class="text-danger">
                                            {{$errors->first('url')}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-2">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8 col-xs-5 col-sm-2">
                                <div class="form-group">
                                    {{--<span style="margin-left: 25px;" class="{{\Illuminate\Support\Facades\Lang::locale()=='kh'? 'kh-os' : 'arial'}}">{{trans('label.logo')}}</span>--}}
                                    <img src="{{asset('clientlogo/logo.png')}}" alt="" id="preView" style="height: 90px; width: 90px; border-radius: 50px; border: 2px solid #346895; padding: 2px;">
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="image" class="{{Lang::locale()=='kh'? 'kh-os btn btn-danger' : 'arial btn btn-danger'}}" style="padding: 4px 16px;margin-left: 5px;">{{trans('label.browse')}}</label>
                                    <input type="file" class="edit-form-control" id="image" onchange="loadFile(event)" accept="image/*" name="image" style="display: none;">
                                    @if($errors->has('image'))
                                        <span class="text-danger">{{$errors->first('image')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="{{\Illuminate\Support\Facades\Lang::locale()=='kh'? 'kh-os checkbox checkbox-primary' : 'arial checkbox checkbox-primary'}}">
                                {!! Form::checkbox('publish',1,null,['id'=>'publish']) !!}
                                <label for="publish">
                                    {{trans('label.publish')}}
                                </label>
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

                <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                    <div id="editCat"></div>
                </div>

            </div>
            <div class="panel-footer">
                <div class="container-fluid">
                    <div id="viewClient">
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


        $('#lang').on('change',function () {
            var langId = $(this).val();
            $.ajax({
                type:'get',
                url:"{{url('get/select/parent')}}"+'/'+langId,
                dataType:'json',
                success:function (data) {
                    var serialnumber="<option value=''>{{trans('label.choose_item')}}</option>";
                    $.map(data,function(value ,key){
                        serialnumber+="<option value=" + key + ">" + value + "</option>";
                    });
                    $('#par').html(serialnumber);
                },
                error:function (error) {
                    console.log(error);
                }
            });
        });

        function getViewClient() {
            $.ajax({
                type:'get',
                url:"{{route('client.index')}}",
                dataType:'html',
                success:function (data) {
                    $('#viewClient').html(data);
                    $('#clienttable').dataTable();
                },
                error:function (error) {
                    console.log(error);
                }
            });
        }
        $(document).ready(function () {
            getViewClient();
        });


        function deleteClient(id) {
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
                    url : "{{url('/client/delete')}}"+"/"+id,
                    type: "get",
                    dataType: 'html'
                })
                    .done(function(data) {
                        swal("Deleted!", "Your file was successfully deleted!", "success");
                        $(document).ready(function () {
                            getViewClient();
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