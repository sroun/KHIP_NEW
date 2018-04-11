
    <div class="modal-dialog">
    {!! Form::model($user,['action'=>['UserController@update',$user->id],'method'=>'PATCH','files'=>true]) !!}

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit User</h4>
            </div>
            <div class="modal-body">
                <div >
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-lg-6">
                                        {!! Form::label('name','&nbsp;Name',['class'=>'edit-label']) !!}
                                        {!! Form::text('name',null,['class'=>'edit-form-control','placeholder'=>'Name', 'required'=>true ]) !!}
                                        @if($errors->has('name'))
                                            <span class="text-danger">{{$errors->first('name')}}</span>
                                        @endif
                                    </div>
                                    <div class="col-lg-6">
                                        {!! Form::label('user_name','&nbsp;User Name',['class'=>'edit-label']) !!}
                                        {!! Form::text('username',null,['class'=>'edit-form-control','placeholder'=>'User Name', 'required'=>true ]) !!}
                                        @if($errors->has('username'))
                                            <span class="text-danger">{{$errors->first('username')}}</span>
                                        @endif

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        {!! Form::label('Role','&nbsp;Role',['class'=>'edit-label margin-left-5px']) !!}
                                        {!! Form::select('role_id',$role,null,['class'=>'edit-form-control','placeholder'=>'Role name', 'required'=>true ]) !!}
                                        @if($errors->has('role'))
                                            <span class="text-danger">{{$errors->first('role')}}</span>
                                        @endif
                                    </div>
                                    <div class="col-lg-6">
                                        {!! Form::label('Position','&nbsp;Position',['class'=>'edit-label']) !!}
                                        {!! Form::select('position_id',$position,null,['class'=>'edit-form-control','placeholder'=>'Position name', 'required'=>true ]) !!}
                                        @if($errors->has('position'))
                                            <span class="text-danger">{{$errors->first('position')}}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8 col-xs-5 col-sm-2">
                                        <div class="form-group">
                                            <img src='{{asset("/photo/$user->photo")}}' alt="" id="preViewEdit" style="height: 80px; width: 80px; border-radius: 50px; border: 2px solid #346895; padding: 2px;">
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label for="imageEdit" class="btn btn-primary" style="padding: 4px 16px;">Browse</label>
                                            <input type="file" name="imageEdit" class="edit-form-control" id="imageEdit" onchange="loadFileEdit(event)" accept="image/*"style="display: none;">
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
                </div>
            </div>
            <div class="modal-footer">
                {!! Form::submit('Update',['class'=>'btn btn-success btn-sm pull-left' ]) !!}
                <a href="#" data-dismiss="modal" class="btn btn-default btn-sm pull-left">Close</a>
            </div>

        </div>
    {!! Form::close() !!}
</div>

    <script type="text/javascript">
        var loadFileEdit = function(event) {
            var output = document.getElementById('preViewEdit');
            output.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>






