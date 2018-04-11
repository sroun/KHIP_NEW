@extends('admin.master')

@section('content')
    <br>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading {{\Illuminate\Support\Facades\Lang::locale()==='kh' ? 'kh-moul' : 'time-roman'  }}">
                {{trans('label.language')}}
            </div>
            <div class="panel-body">
                <div class="row">
                    {!! Form::open(['method'=>'post','id'=>'language']) !!}
                    <input type="hidden" value="{{csrf_token()}}">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <span class="{{\Illuminate\Support\Facades\Lang::locale()=='kh'? 'kh-os' : 'arial'}}">{{trans('label.language_code')}}</span>
                                    {!! Form::text('code',null,['class'=>'edit-form-control text-blue','id'=>'code','required'=>'true','placeholder'=>trans('label.placeholder_code')])!!}
                                    @if($errors->has('code'))
                                        <span class="text-danger">
                                            {{$errors->first('code')}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <span class="{{\Illuminate\Support\Facades\Lang::locale()=='kh'? 'kh-os' : 'arial'}}">{{trans('label.language_name')}}</span>
                                    {!! Form::text('name',null,['class'=>'edit-form-control text-blue','required'=>'true','placeholder'=>trans('label.placeholder_name')])!!}
                                    @if($errors->has('name'))
                                        <span class="text-danger">
                                             {{$errors->first('name')}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::submit(trans('label.create'),['class'=>Lang::locale()==='kh' ? 'kh-os btn btn-success btn-sm':'arial btn btn-success btn-sm']) !!}
                            {!! Form::reset(trans('label.reset'),['class'=>Lang::locale()==='kh' ? 'kh-os btn btn-warning btn-sm':'arial btn btn-warning btn-sm']) !!}
                        </div>

                    </div>
                    {!! Form::close() !!}
                    <div class="col-md-8">
                        <div id="viewLanguage">

                        </div>
                    </div>
                </div>

                <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                    <div id="editlanguage">

                    </div>
                </div>

            </div>
            <div class="panel-footer">

            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        function getViewLanguage() {
            $.ajax({
                type:'get',
                url:"{{route('language.index')}}",
                dataType:'html',
                success:function (data) {
                    $('#viewLanguage').html(data);
                },
                error:function (error) {
                    console.log(error);
                }
            });
        }
        $(document).ready(function () {
            getViewLanguage();
        });

        $('#language').submit(function (e) {
            e.preventDefault();
            var data = $('#language').serialize();
            if($('#code').val().length<6){
                $.ajax({
                    type : 'post',
                    url  : "{{route('language.store')}}",
                    dataType: 'html',
                    data : data,
                    beforeSend:function () {
                    },
                    success:function (data) {
                        $('#language')[0].reset();
                        $(document).ready(function () {
                            getViewLanguage();
                        });
                    }
                });
            }
        });

        function updatePos(id) {
            $.ajax({
                type:'get',
                url:"{{url('/language/edit')}}"+"/"+id,
                dataType:'html',
                success:function (data) {
                    $('#editlanguage').html(data);
                },
                error:function (error) {
                    console.log(error);
                }
            });
        }

        function deleteLanguage(id) {
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
                    url : "{{url('/language/delete')}}"+"/"+id,
                    type: "get",
                    dataType: 'html'
                })
                    .done(function(data) {
                        swal("Deleted!", "Your file was successfully deleted!", "success");
                        $(document).ready(function () {
                            getViewLanguage();
                        });
                    })
                    .error(function(data) {
                        swal("Oops", "We couldn't connect to the server!", "error");
                    });
            });
        }
    </script>
@endsection