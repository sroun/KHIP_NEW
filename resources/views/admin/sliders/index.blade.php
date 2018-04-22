@if($slider->count())
<label class="{{Lang::locale()==='kh' ? 'kh-os' : 'arial'}}">{{trans('label.list_view')}}</label>
<div class="table-responsive">
    <table id="clienttable" class="table table-bordered table-striped table-hover {{Lang::locale()==='kh' ? 'kh-os' : 'arial'}}">
        <thead>
        <tr>
            <th class="center">{{trans('label.No')}}</th>
            <th class="center">{{trans('label.photo')}}</th>
            <th>{{trans('label.description')}}</th>
            <th>{{trans('label.created_by')}}</th>
            <th style="width:20%; !important;" class="center">{{trans('label.action')}}</th>
        </tr>
        </thead>
        <tbody>
        <?php $i=1;$logo='';?>
        @foreach($slider as $s)
            <tr>
                <td style="line-height: 50px" class="center">{{$i++}}</td>
                <td style="line-height: 50px" class="center"><img src='{{asset("imageSlider/$s->image")}}' alt="no image" style="background: white;border:1px solid #00A6C7;border-radius: 2px;padding:1px;height: 50px; width: 130px;"></td>
                <td style="line-height: 50px">{{str_limit($s->pivot->description,60)}}</td>
                <td style="line-height: 50px">{{$s->user->name}}</td>
                <td style="line-height: 50px" class="center">
                    <a href="{{url('slider/edit'.'/'.$s->id.'/'.$s->pivot->language_id)}}" class="cursor-pointer padding-7px"​​><i class="fa fa-edit"></i></a>
                    <a href="#" onclick="deleteSlider('{{$s->id}}')"><i class="fa fa-trash icon-delete"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@else
    <h4 class="{{Lang::locale()==='kh' ? 'kh-os text-danger' : 'arial text-danger'}}" style="line-height: 50px;text-align: center;">{{trans('label.data_not_found')}}</h4>
@endif