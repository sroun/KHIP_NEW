<div style="margin-top: 10%;" class="modal-dialog modal-sm" role="document">
    <div class="modal-content" style="border-radius: 10px;">
            <div class="panel panel-default">
                <div class="panel-body">
                    {!! Form::model($user,['action'=>['UserController@resetPasswordSuccess',$user->id],'method'=>'patch']) !!}
                    <div class="row">
                        <div class="col-lg-12">
                            {!! Form::label('password','&nbsp;Password',['class'=>'edit-label']) !!}
                            {!! Form::password('password',['class'=>'edit-form-control','pattern'=>'.{8,}','placeholder'=>'Password','onchange'=>"this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 8 characters' : '');
                            if(this.checkValidity()) form.confirm_pass.pattern = this.value;",'required'=>true ]) !!}
                            @if($errors->has('password'))
                                <span class="text-danger">{{$errors->first('password')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            {!! Form::label('confirm','&nbsp;Confirm',['class'=>'edit-label']) !!}
                            {!! Form::password('confirm',['class'=>'edit-form-control','placeholder'=>'Confirm password','pattern'=>'.{8,}','onchange'=>"this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');", 'required'=>true ]) !!}

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            {!! Form::submit('Save',['class'=>'btn btn-success btn-sm']) !!}
                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                        </div>

                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
    </div>
</div>