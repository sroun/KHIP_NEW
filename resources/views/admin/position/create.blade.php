@extends('admin.master')

@section('content')
    <br>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                Create Position
            </div>
            <div class="panel-body">
                <div class="row">
                    {!! Form::open(['action'=>'PositionController@store','method'=>'post']) !!}
                    <input type="hidden" value="{{csrf_token()}}">
                        <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::label('Position Name')!!}
                                            {!! Form::text('name',null,['class'=>'edit-form-control'])!!}
                                            @if($errors->has('name'))
                                                <span class="text-danger">
                                                    {{$errors->first('name')}}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::label('Display Name')!!}
                                            {!! Form::text('description',null,['class'=>'edit-form-control'])!!}
                                            @if($errors->has('description'))
                                                <span class="text-danger">
                                                    {{$errors->first('description')}}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            <div class="form-group">
                                {!! Form::submit('Create',['class'=>'btn btn-primary btn-sm']) !!}
                                {!! Form::reset('Reset',['class'=>'btn btn-warning btn-sm']) !!}
                            </div>

                        </div>
                    {!! Form::close() !!}
                        <div class="col-md-8">
                            <label for="">List views</label>
                            <div class="form-group">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Position Name</th>
                                        <th>Display Name</th>
                                        <th>Created By</th>
                                        <th style="width:20%; !important;" class="center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=1;?>
                                    @foreach($position as $p)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$p->name}}</td>
                                            <td>{{$p->description}}</td>
                                            <td>{{\App\User::where('id',$p->user_id)->value('name')}}</td>
                                            <td class="center">
                                                <a href="#" onclick="updatePos('{{$p->id}}')" class="btn btn-warning btn-xs" data-toggle="modal" data-target=".bs-example-modal-sm">Edit</a>
                                                <a href="{{url('/admin/position/delete',[$p->id])}}" class="btn btn-danger btn-xs">Delete</a>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                </div>

                <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                    <div id="updatePosition">

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
        function updatePos(id) {
            $.ajax({
                type:'get',
                url:"{{url('/admin/position/edit')}}"+"/"+id,
                dataType:'html',
                success:function (data) {
                   $('#updatePosition').html(data);
                },
                error:function (error) {
                    console.log(error);
                }
            });
        }
    </script>
@endsection