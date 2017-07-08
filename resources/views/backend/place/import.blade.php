@extends ('backend.layouts.app')

@section ('title', 'Places Manager' . ' | ' . 'Import Places')

@section('page-header')
    <h1>
        <!-- {{ trans('labels.backend.access.users.management') }} -->
        Places Management
        <small>Import Places</small>
    </h1>
@endsection

@section('content')
    {{ Form::open([
            'id'    => 'User_form',
            'route' => 'admin.location.place.search',
            'class' => 'form-horizontal',
            'role' => 'form',
            'method' => 'post',
            'files' => true
        ])
    }}

        <div class="box box-success">
            <div class="box-header with-border">
                <!-- <h3 class="box-title">{{ trans('labels.backend.access.users.create') }}</h3> -->
                <h3 class="box-title">Import Places</h3>

                <div class="box-tools pull-right">

                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="box-body">
                <!-- Countries: Start -->
                    <div class="form-group">
                        {{ Form::label('title', 'Country', ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::select('countries_id', $countries , null,['class' => 'select2Class form-control']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                    <!-- Countries: End -->

                    <!-- Cities: Start -->
                    <div class="form-group">
                        {{ Form::label('title', 'Cities', ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::select('cities_id', $cities , null,['class' => 'select2Class form-control']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                    <!-- Cities: End -->
                <!-- Title: Start -->
                <div class="form-group">
                    {{ Form::label('address', 'Address', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('address', null, ['class' => 'form-control', 'maxlength' => '255', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => 'Enter city or location to search']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                <!-- Title: End -->

                <!-- Code: Start -->
                <div class="form-group">
                    {{ Form::label('query', 'Query', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('query', null, ['class' => 'form-control', 'maxlength' => '255', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => 'Enter query to search']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                <!-- Code: End -->
            </div><!-- /.box-body -->
        </div><!--box-->

        <div class="box box-info">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.access.languages.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
                </div><!--pull-left-->

                <div class="pull-right">
                    {{ Form::submit('Search', ['class' => 'btn btn-success btn-xs submit_button']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {{ Form::close() }}
@endsection