@if($client->count())
<label class="{{Lang::locale()==='kh' ? 'kh-os' : 'arial'}}">{{trans('label.list_view')}}</label>
<div class="table-responsive">
    <table id="clienttable" class="table table-bordered table-striped table-hover {{Lang::locale()==='kh' ? 'kh-os' : 'arial'}}">
        <thead>
        <tr>
            <th class="center">{{trans('label.No')}}</th>
            <th>{{trans('label.logo')}}</th>
            <th>{{trans('label.date')}}</th>
            <th>{{trans('label.institution')}}</th>
            <th>{{trans('label.url')}}</th>
            <th class="center">{{trans('label.publish')}}</th>
            <th>{{trans('label.created_by')}}</th>
            <th style="width:20%; !important;" class="center">{{trans('label.action')}}</th>
        </tr>
        </thead>
        <tbody>
        <?php $i=1;$logo='';?>
        @foreach($client as $c)
            <tr>
                <?php $logo = $c->pivot->logo;?>
                <td style="line-height: 50px" class="center">{{$i++}}</td>
                <td style="line-height: 50px" class="center"><img src='{{asset("clientlogo/$logo")}}' alt="no image" style="background: white;border:2px solid #00A6C7;border-radius: 50px;padding:1px;height: 50px; width: 50px;"></td>
                <td style="line-height: 50px">{{ \Carbon\Carbon::parse($c->date)->format('d-M-Y')}}</td>
                <td style="line-height: 50px">{{str_limit($c->pivot->title,15)}}</td>
                    <td style="line-height: 50px">{{$c->pivot->url}}</td>
                <td style="line-height: 50px" class="center">
                    @if($c->publish==0)
                        <i class='fa fa-lock text-red text-sm'></i>
                    @else
                        <i class='fa fa-globe text-green text-sm'></i>
                    @endif
                </td>
                <td style="line-height: 50px">{{$c->user->name}}</td>
                <td style="line-height: 50px" class="center">
                    <a href="{{url('client/edit'.'/'.$c->id.'/'.$c->pivot->language_id)}}" class="cursor-pointer padding-7px"​​><i class="fa fa-edit"></i></a>
                    <a href="#" onclick="deleteClient('{{$c->id}}')"><i class="fa fa-trash icon-delete"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@else
    <h4 class="{{Lang::locale()==='kh' ? 'kh-os text-danger' : 'arial text-danger'}}" style="line-height: 50px;text-align: center;">{{trans('label.data_not_found')}}</h4>
@endif