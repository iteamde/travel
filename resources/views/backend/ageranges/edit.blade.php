<?php
use App\Models\Access\language\Languages;
// $languages = DB::table('conf_languages')->where('active', Languages::LANG_ACTIVE)->get();
?>

@extends ('backend.layouts.app')

@section ('title', 'Age Ranges Manager' . ' | ' . 'Edit Age Ranges')

@section('page-header')
    <h1>
        <!-- {{ trans('labels.backend.access.users.management') }} -->
        Age Ranges Management
        <small>Edit Age Range</small>
    </h1>
@endsection

@section('after-styles')
    <style>
        #map {
            height: 300px;
        }
        #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 300px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      .pac-container {
        font-family: Roboto;
      }
    </style>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.css" rel="stylesheet">
@endsection

@section('content')
    {{ Form::model($ageranges, [
            'id'     => 'ageranges_update_form',
            'route'  => ['admin.ageranges.ageranges.update', $agerangesid],
            'class'  => 'form-horizontal',
            'role'   => 'form',
            'method' => 'PATCH',
        ]) 
    }}

        <div class="box box-success">
            <div class="box-header with-border">
                <!-- <h3 class="box-title">{{ trans('labels.backend.access.users.create') }}</h3> -->
                <h3 class="box-title">Edit Age Range</h3>

            </div><!-- /.box-header -->

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
                                    {{ Form::text('title_'.$language->id, $data['title_'.$language->id] , ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => 'Title']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: Title -->
                            <!-- Languages Tabs: Start -->
                        </div>
                    @endforeach
                    </div>
                    <!-- Start From -->
                    <div class="form-group">
                        {{ Form::label('from', 'From', ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('from', $data['from'], ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => 'From']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                    <!-- End: From -->
                    <!-- Start To -->
                    <div class="form-group">
                        {{ Form::label('to', 'To', ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('to', $data['to'], ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => 'To']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                    <!-- End: To -->
                    <!-- Active: Start -->
                    <div class="form-group">
                        {{ Form::label('active', trans('validation.attributes.backend.access.languages.active'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            @if($data['active'] == 1)
                                {{ Form::checkbox('active', '1', true) }}
                            @else
                                {{ Form::checkbox('active', '2', false) }}
                            @endif
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                    <!-- Active: End -->
                @endif
                <!-- Languages Tabs: End -->
            </div>
        </div>

        <div class="box box-info">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.ageranges.ageranges.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
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
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.css" rel="stylesheet">
@endsection
@section('after-scripts')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.js"></script>
    <script type="text/javascript">
        $('.description').summernote({
             height: 200
        });
    </script>
    <script type="text/javascript">
        $('.select2Class').select2({
            placeHolder: 'Select Region'
        });
    </script>
@endsection