<?php
use App\Models\Access\language\Languages;
// $languages = DB::table('conf_languages')->where('active', Languages::LANG_ACTIVE)->get();
?>
@extends ('backend.layouts.app')

@section ('title', 'Languages Spoken Manager' . ' | ' . 'Create Languages Spoken')

@section('page-header')
    <h1>
        <!-- {{ trans('labels.backend.access.users.management') }} -->
        Languages Spoken Management
        <small>Create Languages Spoken</small>
    </h1>
@endsection

@section('content')
    {{ Form::open([
            'id'     => 'languages_spoken_form',
            'route'  => 'admin.languagesspoken.languagesspoken.store',
            'class'  => 'form-horizontal',
            'role'   => 'form',
            'method' => 'post'
        ]) 
    }}

        <div class="box box-success">
            <div class="box-header with-border">
                <!-- <h3 class="box-title">{{ trans('labels.backend.access.users.create') }}</h3> -->
                <h3 class="box-title">Create Languages Spoken</h3>

                <div class="box-tools pull-right">
                
                </div><!--box-tools pull-right-->
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
                                    {{ Form::text('title_'.$language->id, null, ['class' => 'form-control', 'maxlength' => '255', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => 'Title']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: Title -->

                             <!-- Start Description -->
                            <div class="form-group">
                                {{ Form::label('description_'.$language->id, 'Description', ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::textarea('description_'.$language->id, null, ['class' => 'form-control description_input', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => 'Description']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: Description -->
                        </div>
                    @endforeach
                    </div>
                    <!-- Active: Start -->
                    <div class="form-group">
                        {{ Form::label('title', trans('validation.attributes.backend.access.languages.active'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::checkbox('active', '1', true) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                    <!-- Active: End -->
                @endif
            </div>
        </div><!--box-->

        <div class="box box-info">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.languagesspoken.languagesspoken.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
                </div><!--pull-left-->

                <div class="pull-right">
                    {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success btn-xs submit_button']) }}
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
    {{ Html::script('js/backend/access/users/script.js') }}
    <script type="text/javascript">
        $('.select2Class').select2();
        $('.description_input').summernote({
             height: 200
        });
    </script>
@endsection