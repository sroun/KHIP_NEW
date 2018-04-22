@extends('admin.master')

 @section('content')
     <br>
     <div class="container-fluid">
         <div class="panel panel-default">
             <div class="panel-body">
                 @foreach($data as $d)
                     {!! Form::open(['action'=>['SliderController@update',$d->id],'method'=>'PATCH','files'=>true]) !!}
                     <div class="row">
                         <div class="col-md-5">
                             {!! Form::hidden('pivotId',$d->pivot->id) !!}
                             <div class="row">
                                 <div class="col-md-12">
                                     <div class="form-group">
                                         <span class="{{\Illuminate\Support\Facades\Lang::locale()=='kh'? 'kh-os required' : 'arial required'}}">{{trans('label.description')}}</span>
                                         {!! Form::textarea('description',$d->pivot->description,['class'=>Lang::locale()=='kh'? 'kh-os edit-form-control text-blue' : 'arial edit-form-control text-blue','rows'=>11,'placeholder'=>trans('label.description')])!!}
                                         @if($errors->has('description'))
                                             <span class="text-danger">
                                            {{$errors->first('description')}}
                                        </span>
                                         @endif
                                     </div>
                                 </div>
                             </div>

                         </div>
                         <div class="col-md-7">
                             <div class="row">
                                 <div class="col-md-12">
                                     <div class="form-group">
                                         <span class="{{\Illuminate\Support\Facades\Lang::locale()=='kh'? 'kh-os required' : 'arial required'}}">{{trans('label.photo')}}</span>
                                         <input type="file" class="edit-form-control" id="imageEdit" onchange="loadFile(event)" name="imageEdit" accept="image/x-png,image/gif,image/jpeg" style="display: none;">
                                         <label for="imageEdit" class="cursor-pointer"><img src="{{asset('/imageSlider/'.$d->image)}}" alt="" class="img-responsive" id="preView" style="border: 1px solid #346895; padding: 1px;margin-top:2px; border-radius: 1px;"></label>
                                         @if($errors->has('image'))
                                             <span class="text-danger">
                                                {{$errors->first('image')}}
                                            </span>
                                         @endif
                                     </div>
                                 </div>
                             </div>
                         </div>

                     </div>

                     <div class="form-group">
                         {!! Form::submit(trans('label.update'),['class'=>Lang::locale()==='kh'? 'btn btn-primary btn-sm kh-os' : 'btn btn-primary btn-sm arial']) !!}
                         <a href="{{route('slider.create')}}" class="{{Lang::locale()==='kh'? 'btn btn-danger btn-sm kh-os' : 'btn btn-danger btn-sm arial'}}">{{trans('label.cancel')}}</a>
                     </div>
                     {!! Form::close() !!}
                 @endforeach
             </div>
         </div>

     </div>

 @endsection

 @section('script')
     <script type="text/javascript">
         var loadFile = function(event) {
             var output = document.getElementById('preView');
             output.src = URL.createObjectURL(event.target.files[0]);
         };
         var loadFileEdit = function(event) {
             var output = document.getElementById('preViewEdit');
             output.src = URL.createObjectURL(event.target.files[0]);
         };
     </script>
 @endsection