@extends('admin.master')

@section('content')
    <br>
    <div class="container-fluid">
        <div class=" panel panel-default">
            <div class="panel-heading {{Lang::locale()==='kh' ? 'kh-moul' : 'time-roman'}}">
                {{trans('label.categoryproduct')}}
            </div>
            <div class="panel-body">
                {!! Form::open(['id'=>'categoryproduct']) !!}
                <div class="row">

                    <div class="col-lg-4">
                        <div class="form-group">
                            <span class="{{Lang::locale()==='kh' ? 'kh-os' : 'arial'}}">{{trans('label.language')}}</span>
                            {!! Form::select('language_id',$lang,null,['class'=>Lang::locale()==='kh' ?'kh-os edit-form-control height-35 text-blue' : 'arial edit-form-control height-35 text-blue','placeholder'=>trans('label.choose_item'),'required','id'=>'language_id','onchange'=>'changeParentByChooseLang()']) !!}
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <span class="{{Lang::locale()==='kh' ? 'kh-os' : 'arial'}}">{{trans('label.name')}}</span>
                            {!! Form::text('name',null,['class'=>Lang::locale()==='kh' ?'kh-os edit-form-control height-35 text-blue' : 'arial edit-form-control height-35 text-blue','placeholder'=>trans('label.fill'),'required']) !!}
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <span class="{{Lang::locale()==='kh' ? 'kh-os' : 'arial'}}">{{trans('label.parent')}}</span>
                            {!! Form::select('parent_num',$categoryProduct,null,['class'=>Lang::locale()==='kh' ?'kh-os edit-form-control height-35 text-blue' : 'arial edit-form-control height-35 text-blue','placeholder'=>trans('label.choose_item'),'id'=>'parent_num']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="checkbox checkbox-primary">
                                {!! Form::checkbox('publish',null,null,['id'=>'publish']) !!}
                                <label for="publish" class="{{Lang::locale()==='kh' ? 'kh-os' : 'arial'}}">
                                    {{trans('label.publish')}}
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        {!! Form::submit(trans('label.create'),['class'=>Lang::locale()==='kh'? 'btn btn-success btn-sm kh-os' : 'btn btn-success btn-sm arial']) !!}
                        {!! Form::reset(trans('label.reset'),['class'=>Lang::locale()==='kh'? 'btn btn-warning btn-sm kh-os' : 'btn btn-warning btn-sm arial']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
            <div class="panel-footer">
                <div id="listCategoryProduct">

                </div>
            </div>
            <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                <div id="editCatPro"></div>
            </div>


        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#categoryproduct').submit(function (e) {
           e.preventDefault();
           var data= $('#categoryproduct').serialize();
           $.ajax({
              type  : 'post',
               url  : "{{route('categoryproduct.store')}}",
               data : data,
               dataType : 'json',
               beforeSend:function () {

               },
               success:function (data) {
                $('#categoryproduct')[0].reset();
                var element;
                    $.map(data.language,function (value,key) {
                        element+="<option value='"+key+"'>"+value+"</option>";
                    });
                    $('#language_id').html(element);
                    $(document).ready(function () {
                        changeParentByChooseLang();
                    });
                   getView();
               },
               error:function (error) {
                   console.log(error);
               }
           });
        });
        
        function changeParentByChooseLang() {
            var id = $('#language_id').val();
            $.ajax({
                type  : 'get',
                url  : "{{url('category/product/change/parent')}}"+"/"+id,
                dataType : 'json',
                success:function (data) {
                    var element ="<option value=''>{{trans('label.choose_item')}}</option>";
                    $.map(data,function (value,key) {
                        element+="<option value='"+key+"'>"+value+"</option>";
                    });
                    $('#parent_num').html(element);
                },
                error:function (error) {
                    console.log(error);
                }
            });
        }

        function getView() {
            $.ajax({
                type  : 'get',
                url  : "{{route('categoryproduct.index')}}",
                dataType : 'html',
                success:function (data) {
                    $('#listCategoryProduct').html(data);
                },
                error:function (error) {
                    console.log(error);
                }
            });

        }
    $(document).ready(function () {
        getView();
    });

    function editCatPro(id,langId) {
        $.ajax({
           type : 'get',
           url : "{{url('/category/product/edit')}}"+"/"+id+"/"+langId,
           dataType : 'html',
           success:function (data) {
               $('#editCatPro').html(data);
           },
           error:function (error) {
            console.log(error);
           }
        });
    }

    function deleteCatpro(id) {
        swal({
            title: "{{trans('label.delete')}}",
            text: "{{trans('label.are_you_sure_delete')}}",
            type: "warning",
            showCancelButton:true,
            closeOnConfirm: "{{trans('label.cancel')}}",
            confirmButtonText: "{{trans('label.yes')}}",
            cancelButtonText : "{{trans('label.no')}}",
            confirmButtonColor: "#ec6c62"
        }, function() {
            $.ajax({
                url : "{{url('/category/product/delete')}}"+"/"+id,
                type: "get",
                dataType: 'html'
            })
                .done(function(data) {
                    swal("{{trans('label.deleted')}}", "{{trans('label.successfully_deleted')}}", "success");
                    $(document).ready(function () {
                        getView();
                    });
                })
                .error(function(data) {
                    swal("Oops", "We couldn't connect to the server!", "error");
                });
        });
    }


    </script>
@endsection