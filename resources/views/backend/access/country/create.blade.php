<?php  
use App\Models\Access\language\Languages;
$languages = DB::table('conf_languages')->where('active', Languages::LANG_ACTIVE)->get();
?>
@extends ('backend.layouts.app')

@section ('title', 'Countries Manager' . ' | ' . 'Create Country')

@section('page-header')
    <!-- <h1>
        {{ trans('labels.backend.access.users.management') }}
        <small>{{ trans('labels.backend.access.users.create') }}</small>
    </h1> -->
    <h1>
        Country Manager
        <small>Create Country</small>
    </h1>
@endsection

@section('content')
    {{ Form::open([
            'id'     => 'country_form',
            'route'  => 'admin.access.country.store',
            'class'  => 'form-horizontal',
            'role'   => 'form',
            'method' => 'post',
            'files'  => true
        ]) 
    }}
        <div class="box box-success">
            <div class="box-header with-border">
                <!-- <h3 class="box-title">{{ trans('labels.backend.access.users.create') }}</h3> -->
                <h3 class="box-title">Create Country</h3>

                <div class="box-tools pull-right">
                    @include('backend.access.includes.partials.user-header-buttons')
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
                                    {{ Form::text('title_'.$language->id, null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => 'Title']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: Title -->

                            <!-- Start: Description -->
                            <div class="form-group">
                                {{ Form::label('description_'.$language->id, 'Description', ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('description_'.$language->id, null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => 'Description']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: Description -->

                            <!-- Start: Nationality -->
                            <div class="form-group">
                                {{ Form::label('nationality_'.$language->id, 'Nationality', ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('nationality_'.$language->id, null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => 'Nationality']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: Nationality -->

                            <!-- Start: population -->
                            <div class="form-group">
                                {{ Form::label('population_'.$language->id, 'Population', ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('population_'.$language->id, null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => 'Population']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: Population -->

                            <!-- Start: best_place -->
                            <div class="form-group">
                                {{ Form::label('best_place_'.$language->id, 'Best place', ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('best_place_'.$language->id, null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => 'Best Place']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: best_place -->

                            <!-- Start: best_time -->
                            <div class="form-group">
                                {{ Form::label('best_time_'.$language->id, 'Best time', ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('best_time_'.$language->id, null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => 'Best time']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: best_time -->

                            <!-- Start: cost_of_living -->
                            <div class="form-group">
                                {{ Form::label('cost_of_living_'.$language->id, 'Cost of living', ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('cost_of_living_'.$language->id, null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => 'Cost of living']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: cost_of_living -->

                            <!-- Start: geo_stats -->
                            <div class="form-group">
                                {{ Form::label('geo_stats_'.$language->id, 'Geo stats', ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('geo_stats_'.$language->id, null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => 'Geo stats']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: geo_stats -->

                            <!-- Start: demographics -->
                            <div class="form-group">
                                {{ Form::label('demographics_'.$language->id, 'Demographics', ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('demographics_'.$language->id, null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => 'Demographics']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: demographics -->

                            <!-- Start: economy -->
                            <div class="form-group">
                                {{ Form::label('economy_'.$language->id, 'Economy', ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('economy_'.$language->id, null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => 'Economy']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: economy -->

                            <!-- Start: suitable_for -->
                            <div class="form-group">
                                {{ Form::label('suitable_for_'.$language->id, 'Suitable for', ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('suitable_for_'.$language->id, null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => 'Suitable for']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: suitable_for -->

                            <!-- Languages Tabs: Start -->
                        </div>
                    @endforeach
                    </div>
                @endif
                    
                <!-- Languages Tabs: End -->
            </div>
        </div>

    {{ Form::close() }}
@endsection

@section('after-scripts')
    {{ Html::script('js/backend/access/users/script.js') }}
    <script type="text/javascript">
        $('.select2Class').select2();
    </script>
@endsection
