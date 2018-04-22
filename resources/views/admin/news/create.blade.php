@extends('admin.master')

@section('content')
    <br>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading {{\Illuminate\Support\Facades\Lang::locale()==='kh' ? 'kh-moul' : 'time-roman'  }}">
                {{trans('label.news')}}
            </div>
            <div class="panel-body">
                <div id="editNews">
                    {!! Form::open(['action'=>'NewsController@store','method'=>'POST','files'=>true]) !!}
                    <div class="row">
                        <div class="col-md-10">
                            <div class="row">
                                <input type="hidden" name="activity_id" id="activity_id" value="0">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="{{\Illuminate\Support\Facades\Lang::locale()=='kh'? 'kh-os required' : 'arial required'}}">{{trans('label.language_name')}}</span>
                                        {!! Form::select('language_id',$language,null,['class'=>Lang::locale()=='kh'? 'kh-os edit-form-control text-blue height-35' : 'arial edit-form-control text-blue height-35','id'=>'lang','required'=>true,'placeholder'=>trans('label.choose_item')])!!}
                                        @if($errors->has('language_id'))
                                            <span class="text-danger">
                                            {{$errors->first('language_id')}}
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="{{\Illuminate\Support\Facades\Lang::locale()=='kh'? 'kh-os required' : 'arial required'}}">{{trans('label.title')}}</span>
                                        {!! Form::text('title',null,['class'=>Lang::locale()=='kh'? 'kh-os edit-form-control text-blue height-35' : 'arial edit-form-control text-blue height-35','required'=>true,'placeholder'=>trans('label.title')])!!}
                                        @if($errors->has('title'))
                                            <span class="text-danger">
                                                {{$errors->first('title')}}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="{{\Illuminate\Support\Facades\Lang::locale()=='kh'? 'kh-os required' : 'arial required'}}">{{trans('label.category_name')}}</span>
                                        {!! Form::select('category_id',$category,0,['class'=>Lang::locale()=='kh'? 'kh-os edit-form-control text-blue height-35' : 'arial edit-form-control text-blue height-35','id'=>'par','required'=>true,'placeholder'=>trans('label.choose_item')])!!}
                                        @if($errors->has('category_id'))
                                            <span class="text-danger">
                                            {{$errors->first('category_id')}}
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="{{\Illuminate\Support\Facades\Lang::locale()=='kh'? 'kh-os' : 'arial'}}">{{trans('label.reference')}}</span>
                                        {!! Form::text('reference',null,['class'=>Lang::locale()=='kh'? 'kh-os edit-form-control text-blue height-35' : 'arial edit-form-control text-blue height-35','placeholder'=>trans('label.reference')])!!}
                                        @if($errors->has('reference'))
                                            <span class="text-danger">
                                                {{$errors->first('reference')}}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <span class="{{\Illuminate\Support\Facades\Lang::locale()=='kh'? 'kh-os required' : 'arial required'}}">{{trans('label.summarize')}}</span>
                                        {!! Form::textarea('summarize',null,['class'=>Lang::locale()=='kh'? 'kh-os edit-form-control text-blue' : 'arial edit-form-control text-blue','required'=>true,'placeholder'=>trans('label.summarize'),'rows'=>3])!!}
                                        @if($errors->has('summarize'))
                                            <span class="text-danger">
                                                {{$errors->first('summarize')}}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <span class="{{\Illuminate\Support\Facades\Lang::locale()=='kh'? 'kh-os required' : 'arial required'}}">{{trans('label.main_photo')}}</span>
                                        <input type="file" class="edit-form-control" id="image" onchange="loadFile(event)" name="image" accept="image/x-png,image/gif,image/jpeg" style="display: none;">
                                        <label for="image" class="cursor-pointer"><img src="{{asset('/newsImages/default_main.png')}}" alt="" class="img-responsive" id="preView" style="border: 2px solid #346895; padding: 2px;margin-top:5px;"></label>
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

                    <div class="row">
                        <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

                        <div class="col-lg-12">
                            <textarea name="description" class="form-control description"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="{{\Illuminate\Support\Facades\Lang::locale()=='kh'? 'kh-os checkbox checkbox-primary' : 'arial checkbox checkbox-primary'}}">
                                    {!! Form::checkbox('publish',1,null,['id'=>'publish']) !!}
                                    <label for="publish">
                                        {{trans('label.publish')}}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::submit(trans('label.create'),['class'=>Lang::locale()==='kh' ? 'kh-os btn btn-success btn-sm':'arial btn btn-success btn-sm']) !!}
                        {!! Form::reset(trans('label.reset'),['class'=>Lang::locale()==='kh' ? 'kh-os btn btn-warning btn-sm':'arial btn btn-warning btn-sm']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>


            </div>
            <div class="panel-footer">
                <div class="container-fluid">
                    <div id="viewNews">
                        <div class="center">
                            <i class="fa fa-spinner fa-spin" style="font-size:24px"> </i> <span>&nbsp; Wait...</span>
                        </div>
                    </div>
                </div>
            </div>

            <div id="view" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">

            </div>

            <div id="testing">

            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">

        var editor_config = {
            path_absolute : "/",
            selector: 'textarea.description',
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern "
            ],
            toolbar: "insertfile undo redo | fontselect | fontsizeselect |​ forecolor | backcolor | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            font_formats: 'Arial=arial;khmer os= khmer os;Khmer OS Muol Light=Khmer OS Muol Light;Khmer OS Muol=Khmer OS Muol;Khmer OS Content=Khmer OS Content',
            fixed_toolbar_container: '#mytoolbar',
            relative_urls: true,
            file_browser_callback : function(field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file : cmsURL,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizable : "yes",
                    close_previous : "no"
                });
            }
        };

        tinymce.init(editor_config);

        var loadFile = function(event) {
            var output = document.getElementById('preView');
            output.src = URL.createObjectURL(event.target.files[0]);
        };
        var loadFileEdit = function(event) {
            var output = document.getElementById('preViewEdit');
            output.src = URL.createObjectURL(event.target.files[0]);
        };



        $('#lang').on('change',function () {
            var langId = $(this).val();
            $.ajax({
                type:'get',
                url:"{{url('get/select/parent')}}"+'/'+langId,
                dataType:'json',
                success:function (data) {
                    var serialnumber="<option value=''>{{trans('label.choose_item')}}</option>";
                    $.map(data,function(value ,key){
                        serialnumber+="<option value=" + key + ">" + value + "</option>";
                    });
                    $('#par').html(serialnumber);
                },
                error:function (error) {
                    console.log(error);
                }
            });
        });

        function getViewNews() {
            $.ajax({
                type:'get',
                url:"{{route('news.index')}}",
                dataType:'html',
                success:function (data) {
                    $('#viewNews').html(data);
                    $('#newstable').dataTable();
                },
                error:function (error) {
                    console.log(error);
                }
            });
        }
        $(document).ready(function () {
            getViewNews();
        });

        function deleteNews(id) {
            swal({
                title: "{{trans('label.are_you_sure')}}",
                text: "{{trans('label.are_you_sure_delete')}}",
                type: "warning",
                showCancelButton:true,
                closeOnConfirm: false,
                cancelButtonText: "{{trans('label.no')}}",
                confirmButtonText: "{{trans('label.yes')}}",
                confirmButtonColor: "#ec6c62"
            }, function() {
                $.ajax({
                    url : "{{url('/news/delete')}}"+"/"+id,
                    type: "get",
                    dataType: 'html'
                })
                    .done(function(data) {
                        swal("Deleted!", "Your file was successfully deleted!", "success");
                        $(document).ready(function () {
                            getViewNews();
                        });
                    })
                    .error(function(data) {
                        swal("Oops", "We couldn't connect to the server!", "error");
                    });
            });
        }

        function cancel() {
            window.location.reload();
        }

        function viewNews(id,langId) {
            $.ajax({
                type:'get',
                url:"{{url('/news/view')}}"+'/'+id+'/'+langId,
                dataType:'html',
                success:function (data) {
                    $('#view').html(data);
                },
                error:function (error) {
                    console.log(error);
                }
            });
        }
    </script>
@endsection