<div class="modal-dialog modal-sm" role="document">
    <div class="panel panel-default">
        <div class="panel-heading {{Lang::locale()==='kh' ? 'kh-moul' : 'time-roman'}}">
            {{trans('label.edit')}}
        </div>
        {!! Form::model($lang,['action'=>['LanguageController@update',$lang->id],'method'=>'PATCH']) !!}
        <div class="panel-body">
            <span class="{{\Illuminate\Support\Facades\Lang::locale()=='kh'? 'kh-os' : 'arial'}}">{{trans('label.language_code')}}</span>
            {!! Form::text('code',null,['class'=>'edit-form-control','required'=>true,'placeholder'=>trans('label.placeholder_code')]) !!}

            <span class="{{\Illuminate\Support\Facades\Lang::locale()=='kh'? 'kh-os' : 'arial'}}">{{trans('label.language_name')}}</span>
            {!! Form::text('name',null,['class'=>'edit-form-control','required'=>true,'placeholder'=>trans('label.placeholder_name')])!!}

        </div>
        <div class="panel-footer">
            {!! Form::submit(trans('label.update'),['class'=>Lang::locale()==='kh' ? 'kh-os btn btn-primary btn-sm':'arial btn btn-primary btn-sm']) !!}
            <button data-dismiss="modal" class="btn btn-danger btn-sm"><span class="{{Lang::locale()=='kh'? 'kh-os' : 'arial'}}">{{trans('label.close')}}</span></button>
        </div>
        {!! Form::close() !!}
    </div>
</div>
</div>