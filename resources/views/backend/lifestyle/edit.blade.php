<?php
use App\Models\Access\language\Languages;
// $languages = DB::table('conf_languages')->where('active', Languages::LANG_ACTIVE)->get();
?>

@extends ('backend.layouts.app')

@section ('title', 'Travel Styles Manager' . ' | ' . 'Edit Travel Style')

@section('page-header')
    <h1>
        <!-- {{ trans('labels.backend.access.users.management') }} -->
        Travel Styles Management
        <small>Create Travel Style</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($lifestyle, [
            'id'     => 'lifestyle_update_form',
            'route'  => ['admin.lifestyle.lifestyle.update', $lifestyleid],
            'class'  => 'form-horizontal',
            'role'   => 'form',
            'method' => 'PATCH',
            'files'  => true
        ])
    }}

        <!-- CUSTOM HIDDEN INPUT FIELDS - START -->
        <input type="hidden" name="delete-images" id="delete-images">
        <input type="hidden" name="media-cover-image" id="media-cover-image">
        <input type="hidden" name="remove-cover-image" id="remove-cover-image" value="0">
        <!-- CUSTOM HIDDEN INPUT FIELDS - END -->

        <div class="box box-success">
            <div class="box-header with-border">
                <!-- <h3 class="box-title">{{ trans('labels.backend.access.users.create') }}</h3> -->
                <h3 class="box-title">Update Travel Style</h3>

                <div class="box-tools pull-right">

                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <!-- Language Error : Start -->
            <div class="row error-box">
                <div class="col-md-10">
                    <div class="required_msg">
                    </div>
                </div>
            </div>
            <!-- Language Error : End -->

            <div class="box-body">
                @if(!empty($languages))
                    <ul class="nav nav-tabs">
                    @foreach($languages as $language)
                        <li class="{{ ($languages[0]->id == $language->id)? 'active':'' }}">
                            <a data-toggle="tab" href="#{{$language->code}}">{{ $language->title }}</a>
                        </li>
                    @endforeach
                    </ul>
                @endif
                @if(!empty($languages))
                    <div class="tab-content">
                    @foreach($languages as $language)
                        <div id="{{ $language->code }}" class="tab-pane fade in {{ ($languages[0]->id == $language->id)? 'active':'' }}">
                            <br />
                            <!-- Start Title -->
                            <div class="form-group">
                                {{ Form::label('title_'.$language->id, 'Title', ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('title_'.$language->id, $data['title_'.$language->id], ['class' => 'form-control required', 'maxlength' => '255', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => 'Title']) }}

                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: Title -->
                            <!-- Start Description -->
                            <div class="form-group">
                                {{ Form::label('description_'.$language->id, 'Description', ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::textarea('description_'.$language->id, $data['description_'.$language->id], ['class' => 'form-control description_input required', 'required' => 'required', 'placeholder' => 'Description']) }}
                                </div>
                            </div><!--form control-->
                            <!-- End: Description -->
                        </div>
                    @endforeach
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2" style="margin-right: 0px;margin-left: 20px;text-align: right;">
                                {{ Form::label('title', 'Upload New Images', ['class' => 'col-md-2 control-label', 'style' => 'margin-left: 55px;']) }}
                            </div>
                            <div class="col-md-8" style="padding-top: 22px">
                            {{ Form::file('file_name',[ 'name' => 'pictures[]', 'multiple' => 'multiple' ]) }}
                            </div><!--col-lg-10-->
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2" style="margin-right: 0px;margin-left: 20px;text-align: right;">
                                {{ Form::label('title', 'Uploaded Images', ['class' => 'col-md-2 control-label', 'style' => 'margin-left: 55px;']) }}
                            </div>
                            <div class="col-md-8">
                                @if(empty($images))
                                    <div style="padding-left: 20px;"><p>No Images Added.</p></div>
                                @endif
                                @foreach( $images as $image)
                                    <div class="col-md-2" style="">
                                        <!-- Delete Icon -->
                                        <i class="zoom-effect-icon fa fa-times delete-image" data-toggle="tooltip" title="Delete Image" data-id="<?= $image['id'] ?>" aria-hidden="true" style="color:red;position: relative;top:20px;left:85px;" ></i>
                                        <!-- Cover Image Icon -->
                                        <i class="zoom-effect-icon fa fa-camera-retro add-cover" data-toggle="tooltip" title="Select as cover" data-id="<?= $image['id'] ?>" data-url="<?= $image['url'] ?>" aria-hidden="true" style="color: #f1822b;position: relative;top:40px;left:69px;" ></i>

                                        <img src="<?= $image['url'] ?>" style="width:100px;height:100px;"/>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- Cover photo upload field - Start -->
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2" style="margin-right: 0px;margin-left: 20px;text-align: right;">
                                {{ Form::label('title','Upload Cover Photo',['class' => 'col-md-2 control-label','style' => 'margin-left: 55px;']) }}
                            </div>
                            <div class="col-md-8" style="padding-top: 22px">
                                {{ Form::file('file_name',['name' => 'cover_image','class' => 'post-fileupload']) }}
                            </div>
                        </div>
                    </div>
                    <!-- Cover photo upload field - End -->
                    <!-- Cover photo Show - Start -->
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2" style="margin-right: 0px;margin-left: 20px;text-align: right;">
                                {{ Form::label('title','Cover Photo',['class' => 'col-md-2 control-label','style' => 'margin-left: 55px;']) }}
                            </div>
                            <div class="col-md-8">
                                @if(empty($cover))
                                    <div style="padding-left: 20px;padding-top: 22px" id="cover-message"><p>No Cover Image Added.</p></div>
                                    <div class="col-md-2" style="">
                                        <!-- Cover delete Icon -->
                                        <i id="delete-cover" class="zoom-effect-icon fa fa-times image-hide" data-toggle="tooltip" title="Remove Cover Image" data-id="<?= $cover['id'] ?>" aria-hidden="true" style="color:red;position: relative;top:20px;left:85px;" state="1" start-check="1"></i>
                                        <img class="image-hide" id="cover-preview" src="" style="width:100px;height:100px;"/>
                                    </div>
                                @else
                                    <div style="padding-left: 20px;padding-top: 22px;display:none;" id="cover-message"><p>No Cover Image Added.</p></div>
                                    <div class="col-md-2" style="">
                                        <!-- Cover delete Icon -->
                                        <i id="delete-cover" class="zoom-effect-icon fa fa-times" data-toggle="tooltip" title="Remove Cover Image" data-id="<?= $cover['id'] ?>" aria-hidden="true" style="color:red;position: relative;top:20px;left:85px;" state="1" start-check="2"></i>
                                        <img id="cover-preview" src="<?= $cover['url'] ?>" style="width:100px;height:100px;"/>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- Cover photo Show - End -->
                @endif
            </div>
        </div><!--box-->

        <div class="box box-info">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.lifestyle.lifestyle.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
                </div><!--pull-left-->

                <div class="pull-right">
                    {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-success btn-xs submit_button']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {{ Form::close() }}
@endsection

@section('after-styles')
    <!-- Language Error Style: Start -->
    <style>
        .required_msg{
            padding-left: 20px;
        }
    </style>
    <!-- Language Error Style: End -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.css" rel="stylesheet">
@endsection
@section('after-scripts')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.js"></script>
    <script type="text/javascript">
        $('.description_input').summernote({
             height: 200
        });
    </script>
    <!-- Error Alert Script : Start -->
    <script>
        $(document).on('click' , '.submit_button' , function(){

            var msg = '<div id="language-alert" class="alert alert-danger alert-dismissable fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Please Fill Information In All Languages Tabs.</div>';

            $('.required').each(function(index,data){
                var flag = false;
                if($(this).val() == ''){

                    flag = true;
                }

                if(flag){
                    $('.required_msg').html(msg);
                    $("#language-alert").fadeTo(5000, 500).slideUp(500, function(){
                        $("#language-alert").slideUp(500);
                    });
                }
            });
        });

        $(document).on('click', '.delete-image', function(){
            
            var id = $(this).attr('data-id');
            $(this).parent().remove();

            var value = $('#delete-images').val();

            if(value == ''){
                $('#delete-images').val(id);
            }else{
                value += ',' + id;
                $('#delete-images').val(value);
            }
            // alert($('#delete-images').val());
        });
    </script>
    <!-- Error Alert Script : End -->

    <script>
        $(document).ready(function(){
            //Script for Tooltip initializations
            $('[data-toggle="tooltip"]').tooltip(); 
            
            //get default cover on page load
            var old_cover = null;
            old_cover = $('#cover-preview').clone(true);
            var old_check = $('#delete-cover').attr('start-check');

            //Script for Add Cover functionality
            $(document).on('click','.add-cover',function(){
                var url = $(this).data('url');
                var id  = $(this).data('id');

                old_cover = $('#cover-preview').clone(true);
                var check = $('#delete-cover').attr('start-check');

                if(check == '1'){

                }else{
                    $('#delete-cover').attr('state','3');
                    $('#delete-cover').attr('start-check','3');
                }
                $('#media-cover-image').val(id);
                $('#cover-preview').attr('src',url);
                $('#cover-message').hide();
                $('#cover-preview').show();
                $('#delete-cover').show();
                $('.post-fileupload').replaceWith($('.post-fileupload').val('').clone(true));
            });

            //Script for Remove Cover Functionality
            $(document).on('click','#delete-cover',function(){
                var state = $(this).attr('state');
                var check = $(this).attr('start-check');

                if(check == "1"){
                    $('#cover-message').show();
                    $('#cover-preview').hide();
                    $('#delete-cover').hide();
                    $('#media-cover-image').val('');
                    $('.post-fileupload').replaceWith($('.post-fileupload').val('').clone(true));
                }else if(check == "2"){
                    $('#cover-message').show();
                    $('#cover-preview').hide();
                    $('#remove-cover-image').val('1');
                    $('#delete-cover').hide();
                }else if(check == "3"){
                    $('#media-cover-image').val('');
                    $('#cover-preview').replaceWith(old_cover);
                    $('.post-fileupload').replaceWith($('.post-fileupload').val('').clone(true));
                    $(this).attr('start-check',old_check);
                }
            });

            //Function to get uploaded image url
            var i = 0;

            function readURL(input) {
                
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#cover-preview').attr('src',e.target.result);
                        $('#delete-cover').attr('state',2);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $('.post-fileupload').change(function(){
                $('#media-cover-image').val('');
                old_cover = $('#cover-preview').clone(true);
                
                var check = $('#delete-cover').attr('start-check');
                if(check == "1"){

                }else{
                    $('#delete-cover').attr('start-check','3');
                    $('#delete-cover').attr('state','2');
                }
                
                readURL(this);
                $('#cover-preview').show();
                $('#delete-cover').show();
                $('#cover-message').hide();
            });
        });
    </script>
    <style>
        .zoom-effect-icon:hover {
            font-size: 17px;
        }
        .image-hide{
            display: none;
        }
    </style>
@endsection
