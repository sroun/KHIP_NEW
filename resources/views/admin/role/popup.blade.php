
    <div class="modal-dialog modal-sm" role="document">
        <div class="panel panel-default">
            <div class="panel-heading">
                Update
            </div>
            {!! Form::model($role,['action'=>['RoleController@updateRole',$role->id],'method'=>'PATCH']) !!}
            <div class="panel-body">
                {!! Form::label('Role Name') !!}
                {!! Form::text('name',null,['class'=>'edit-form-control','required'=>true]) !!}
            </div>
            <div class="panel-footer">
                {!! Form::submit('Update',['class'=>'btn btn-success btn-sm']) !!}
                <input type="button" value="Close" data-dismiss="modal" class="btn btn-danger btn-sm">
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>