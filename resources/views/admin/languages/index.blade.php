@if($language->count())
<label class="{{Lang::locale()==='kh' ? 'kh-os' : 'arial'}}">{{trans('label.table_language')}}</label>
<div class="table-responsive">
    <table id="example1" class="table table-bordered table-striped table-hover {{Lang::locale()==='kh' ? 'kh-os' : 'arial'}}">
        <thead>
        <tr>
            <th class="center">{{trans('label.No')}}</th>
            <th>{{trans('label.language_code')}}</th>
            <th>{{trans('label.language_name')}}</th>
            <th>{{trans('label.created_by')}}</th>
            <th style="width:20%; !important;" class="center">{{trans('label.action')}}</th>
        </tr>
        </thead>
        <tbody>
        <?php $i=1;?>
        @foreach($language as $p)
            <tr>
                <td class="center">{{$i++}}</td>
                <td>{{$p->code}}</td>
                <td>{{$p->name}}</td>
                <td>{{\App\User::where('id',$p->user_id)->value('name')}}</td>
                <td class="center">
                    <a href="#" onclick="updatePos('{{$p->id}}')" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-edit icon-edit"></i> </a>
                    <a href="#" onclick="deleteLanguage('{{$p->id}}')"><i class="fa fa-trash icon-delete"></i></a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@else
    <h4 class="{{Lang::locale()==='kh' ? 'kh-os text-danger' : 'arial text-danger'}}" style="line-height: 50px;text-align: center;">{{trans('label.data_not_found')}}</h4>
@endif