@extends('admin.master')
@section('content')
    <div class="container-fluid">
        <br>
            <div class="panel panel-default">
                {{--Create Users--}}
                        <div class="{{\Illuminate\Support\Facades\Lang::locale()==='kh' ? 'kh-moul panel-heading' : 'time-roman panel-heading'  }}">
                            {{trans('label.user')}}
                        </div>
                        <div class="panel-body">
                                {!! Form::open(['action'=>'UserController@stored','method'=>'POST','files'=>true]) !!}
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <span class="{{Lang::locale()=='kh'? 'kh-os required' : 'arial'}}">{{trans('label.name')}}</span>
                                                    {!! Form::text('name',null,['class'=>Lang::locale()=='kh'? 'kh-os edit-form-control text-blue height-35' : 'arial edit-form-control text-blue height-35','required'=>'true','placeholder'=>trans('label.name')]) !!}
                                                    @if($errors->has('name'))
                                                        <span class="text-danger">{{$errors->first('name')}}</span>
                                                    @endif
                                                </div>
                                                <div class="col-lg-3">
                                                    <span class="{{Lang::locale()=='kh'? 'kh-os required' : 'arial'}}">{{trans('label.user_name')}}</span>
                                                    {!! Form::text('username',null,['class'=>Lang::locale()=='kh'? 'kh-os edit-form-control text-blue height-35' : 'arial edit-form-control text-blue height-35','required'=>'true','placeholder'=>trans('label.user_name')]) !!}
                                                    @if($errors->has('username'))
                                                        <span class="text-danger">{{$errors->first('username')}}</span>
                                                    @endif

                                                </div>
                                                <div class="col-lg-6">
                                                    <span class="{{Lang::locale()=='kh'? 'kh-os required' : 'arial'}}">{{trans('label.email')}}</span>
                                                    {!! Form::email('email',null,['class'=>Lang::locale()=='kh'? 'kh-os edit-form-control text-blue height-35' : 'arial edit-form-control text-blue height-35','required'=>'true','placeholder'=>trans('label.user_name')]) !!}
                                                    @if($errors->has('email'))
                                                        <span class="text-danger">{{$errors->first('email')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <span class="{{Lang::locale()=='kh'? 'kh-os required' : 'arial'}}">{{trans('label.password')}}</span>
                                                    {!! Form::password('password',['class'=>'edit-form-control','pattern'=>'.{8,}','placeholder'=>'Password','onchange'=>"this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 8 characters' : '');
                                                    if(this.checkValidity()) form.confirm_pass.pattern = this.value;",'required'=>true ]) !!}
                                                    @if($errors->has('password'))
                                                        <span class="text-danger">{{$errors->first('password')}}</span>
                                                    @endif
                                                </div>
                                                <div class="col-lg-3">
                                                    <span class="{{Lang::locale()=='kh'? 'kh-os required' : 'arial'}}">{{trans('label.confirm')}}</span>
                                                    {!! Form::password('confirm_pass',['class'=>'edit-form-control','placeholder'=>'Confirm password','pattern'=>'.{8,}','onchange'=>"this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');", 'required'=>true ]) !!}

                                                </div>

                                                <div class="col-lg-3">
                                                    <span class="{{Lang::locale()=='kh'? 'kh-os required' : 'arial'}}">{{trans('label.role')}}</span>
                                                    {!! Form::select('role',$role,null,['class'=>'edit-form-control','placeholder'=>'Role name', 'required'=>true ]) !!}
                                                    @if($errors->has('role'))
                                                        <span class="text-danger">{{$errors->first('role')}}</span>
                                                    @endif
                                                </div>
                                                <div class="col-lg-3">
                                                    <span class="{{Lang::locale()=='kh'? 'kh-os required' : 'arial'}}">{{trans('label.position')}}</span>
                                                    {!! Form::select('position',$position,null,['class'=>'edit-form-control','placeholder'=>'Position name', 'required'=>true ]) !!}
                                                    @if($errors->has('position'))
                                                        <span class="text-danger">{{$errors->first('position')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="row">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-8 col-xs-5 col-sm-2">
                                                    <div class="form-group">
                                                        <img src="{{asset('/photo/default_user.png')}}" alt="" id="preView" style="height: 80px; width: 80px; border-radius: 50px; border: 2px solid #346895; padding: 2px;">
                                                    </div>
                                                </div>
                                                <div class="col-md-2"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2"></div>
                                                <div class="col-lg-8">
                                                    <div class="form-group">
                                                        <label for="image" class="btn btn-primary" style="padding: 4px 16px;">Browse</label>
                                                        <input type="file" class="edit-form-control" id="image" onchange="loadFile(event)" accept="image/*" name="image" style="display: none;">
                                                        {{--{!! Form::file('image',['class'=>'btn display-none']) !!}--}}
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

                                            {!! Form::submit('Create',['class'=>'btn btn-success btn-sm' ]) !!}
                                            {!! Form::reset('Clear',['class'=>'btn btn-warning btn-sm' ]) !!}
                                            <a href="{{URL::to('/')}}" class="btn btn-default btn-sm">Close</a>

                                        </div>
                                    </div>

                                {!! Form::close() !!}
                        </div>

                <hr>
                {{--End Create Users--}}

                {{--Users Views--}}
                    <div class="container-fluid">
                        <div class="panel panel-default">
                            <div class="panel-heading">User Views</div>
                            <div class="panel-body">
                                    <!-- /.box-header -->
                                    <div id="box-body">

                                    </div>
                                    <!-- /.box-body -->
                            </div>
                            <!-- Modal -->
                            <div id="myModal" class="modal fade" role="dialog">
                                <div id="editUser">

                                </div>
                            </div>
                            <!-- Modal -->
                            <div id="viewUser" class="modal fade" role="dialog">
                                <div id="viewUser">

                                </div>
                            </div>
                            {{--reset password--}}

                            <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                <div id="resetPassword">

                                </div>
                            </div>

                        </div>
                    </div>
                {{--End User Views--}}
            </div>
    </div>
@endsection

@section('script')

    <script type="text/javascript">
        function getTableUser() {
            $.ajax({
                type: 'get',
                url: "{{url('/admin/get/user')}}",
                dataType: 'html',
                success: function (data) {
                    $('#box-body').html(data);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }

        $(document).ready(function () {
            getTableUser();
        });


        var loadFile = function(event) {
            var output = document.getElementById('preView');
            output.src = URL.createObjectURL(event.target.files[0]);
        };
        var loadFileEdit = function(event) {
            var output = document.getElementById('preViewEdit');
            output.src = URL.createObjectURL(event.target.files[0]);
        };

        function editUser(id) {
            $.ajax({
                type: 'get',
                url:"{{url('/admin/user/edit')}}"+"/"+id,
                dataType: 'html',
                success:function (data) {
                     $('#editUser').html(data);
                },
                error:function (error) {
                    console.log(error);
                }

            });

        }
        function viewUser(id) {
            $.ajax({
                type: 'get',
                url:"{{url('/admin/user/view')}}"+"/"+id,
                dataType: 'html',
                success:function (data) {
                    $('#viewUser').html(data);
                },
                error:function (error) {
                    console.log(error);
                }

            });

        }

            function deleteUser(id) {
                swal({
                    title: "Are you sure?",
                    text: "Are you sure that you want to delete this user ?",
                    type: "warning",
                    showCancelButton:true,
                    closeOnConfirm: false,
                    confirmButtonText: "Yes",
                    confirmButtonColor: "#ec6c62"
                }, function() {
                    $.ajax({
                        url : "{{url('admin/user/delete')}}"+"/"+id,
                        type: "get",
                        dataType: 'html'
                    })
                        .done(function(data) {
                            swal("Deleted!", "Your file was successfully deleted!", "success");
                            $(document).ready(function () {
                                getTableUser();
                            });
                        })
                        .error(function(data) {
                            swal("Oops", "We couldn't connect to the server!", "error");
                        });
                });
            }

            function resetPassword(id) {
                $.ajax({
                    type: 'get',
                    url:"{{url('/admin/reset/password')}}"+"/"+id,
                    dataType: 'html',
                    success:function (data) {
                        $('#resetPassword').html(data);
                    },
                    error:function (error) {
                        console.log(error);
                    }

                });
            }

    </script>

@endsection


