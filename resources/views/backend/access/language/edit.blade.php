@extends ('backend.layouts.app')
@section ('title', 'Language Manager' . ' | ' . 'Update Language')
@section('page-header')
    <h1>
        <!-- {{ trans('labels.backend.access.users.management') }} -->
        Language Management
        <small>Edit Language</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($languages, [
            'id'     => 'language_update_form',
            'route'  => ['admin.access.languages.update', $languages],
            'class'  => 'form-horizontal',
            'role'   => 'form',
            'method' => 'PATCH',
        ]) 
    }}

        <div class="box box-success">
            <div class="box-header with-border">
                <!-- <h3 class="box-title">{{ trans('labels.backend.access.users.create') }}</h3> -->
                <h3 class="box-title">Edit Language</h3>

                <div class="box-tools pull-right">
                
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="box-body">
                <!-- Title: Start -->
                <div class="form-group">
                    {{ Form::label('title', trans('validation.attributes.backend.access.languages.title'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('title', null, ['class' => 'form-control', 'maxlength' => '255', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.access.languages.title')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                <!-- Title: End -->

                <!-- Code: Start -->
                <div class="form-group">
                    {{ Form::label('code', trans('validation.attributes.backend.access.languages.code'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('code', null, ['class' => 'form-control', 'maxlength' => '255', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.access.languages.code')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                <!-- Code: End -->

                <!-- Active: Start -->
                <div class="form-group">
                    {{ Form::label('title', trans('validation.attributes.backend.access.languages.active'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::checkbox('active', '1', true) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                <!-- Active: End -->
            </div><!-- /.box-body -->
        </div><!--box-->

        <div class="box box-info">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.access.languages.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
                </div><!--pull-left-->

                <div class="pull-right">
                    {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success btn-xs submit_button']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {{ Form::close() }}
@endsection