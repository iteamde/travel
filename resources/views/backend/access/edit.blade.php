<?php
use App\Models\Access\User\User;
?>
@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.users.management') . ' | ' . trans('labels.backend.access.users.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.users.management') }}
        <small>{{ trans('labels.backend.access.users.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($user, [
            'id' => 'User_form',
            'route' => [
                'admin.access.user.update',
                $user
            ], 
            'class'  => 'form-horizontal',
            'role'   => 'form',
            'method' => 'PATCH',
            'files'  => true,
        ])
    }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.access.users.edit') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.access.includes.partials.user-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="form-group">
                    {{ Form::label('name', trans('validation.attributes.backend.access.users.name'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('name', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.access.users.name')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <!-- Username: Start -->
                <div class="form-group">
                    {{ Form::label('username', trans('validation.attributes.backend.access.users.username'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('username', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.access.users.username')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                <!-- Username: End -->

                <div class="form-group">
                    {{ Form::label('email', trans('validation.attributes.backend.access.users.email'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::email('email', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.access.users.email')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                
                <!-- Age: Start -->
                <div class="form-group">
                    {{ Form::label('age', trans('validation.attributes.backend.access.users.age'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('age', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.access.users.age')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                <!-- Age: End -->

                <!-- Address: Start -->
                <div class="form-group">
                    {{ Form::label('address', trans('validation.attributes.backend.access.users.address'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('address', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.access.users.address')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                <!-- Address: End -->

                <!-- Gender: Start -->
                <div class="form-group">
                    {{ Form::label('gender', trans('validation.attributes.backend.access.users.gender'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::select('gender', User::getGender(), 'all', ['class' => 'form-control select2Class']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                <!-- Gender: End -->

                <!-- Single: Start -->
                <div class="form-group">
                    {{ Form::label('single', trans('validation.attributes.backend.access.users.single'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::select('single', User::getRelationStatus(), 'all', ['class' => 'form-control select2Class']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                <!-- Single: End -->

                <!-- Children: Start -->
                <div class="form-group">
                    {{ Form::label('single', trans('validation.attributes.backend.access.users.children'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('single', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.access.users.children')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                <!-- Children: End -->

                <!-- Mobile: Start -->
                <div class="form-group">
                    {{ Form::label('mobile', trans('validation.attributes.backend.access.users.mobile'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('mobile', null, ['id' => 'customer_phone', 'class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.access.users.mobile')]) }}
                        <input type="hiddent" id="server_phone" name = "server_phone" hidden="true">
                    </div><!--col-lg-10-->
                </div><!--form control-->
                <!-- Mobile: End -->

                <!-- Nationality: Start -->
                <div class="form-group">
                    {{ Form::label('nationality', trans('validation.attributes.backend.access.users.nationality'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        <!-- {{ Form::text('nationality', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.access.users.nationality')]) }} -->
                        <?php
                            $countries = User::getCountries();
                            $list = [];
                            foreach ($countries as $key => $country) {
                                $list[$country] = $country;
                            }
                        ?>
                        {{ Form::select('nationality', $list, 'all', ['class' => 'form-control select2Class']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                <!-- Nationality: End -->

                <!-- Travel Type: Start -->
                <div class="form-group">
                    {{ Form::label('travel_type', trans('validation.attributes.backend.access.users.travel_type'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::select('travel_type', User::travelTypes(), 'all', ['class' => 'form-control select2Class']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                <!-- Travel Type: End -->

                @if ($user->id != 1)
                    <div class="form-group">
                        {{ Form::label('status', trans('validation.attributes.backend.access.users.active'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-1">
                            {{ Form::checkbox('status', $user->status == 1) }}
                        </div><!--col-lg-1-->
                    </div><!--form control-->

                    <div class="form-group">
                        {{ Form::label('confirmed', trans('validation.attributes.backend.access.users.confirmed'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-1">
                            {{ Form::checkbox('confirmed', $user->confirmed == 1) }}
                        </div><!--col-lg-1-->
                    </div><!--form control-->
                     <!-- Public Profile: Start -->
                <div class="form-group">
                    {{ Form::label('public_profile', trans('validation.attributes.backend.access.users.public_profile'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::checkbox('public_profile', true) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                <!-- Public Profile: End -->

                <!-- Notifications: Start -->
                <div class="form-group">
                    {{ Form::label('notifications', trans('validation.attributes.backend.access.users.notifications'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::checkbox('notifications', true) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                <!-- Notifications: End -->

                <!-- Messages: Start -->
                <div class="form-group">
                    {{ Form::label('messages', trans('validation.attributes.backend.access.users.messages'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::checkbox('messages', true) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                <!-- Messages: End -->

                <!-- SMS: Start -->
                <div class="form-group">
                    {{ Form::label('sms', trans('validation.attributes.backend.access.users.sms'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::checkbox('sms', true) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                <!-- SMS: End -->
                <!-- Profile Picture: Start -->
                 <div class="form-group">
                    <label class="col-lg-2 control-label">{{ trans('validation.attributes.backend.access.users.profile_picture') }}
                    </label>

                    <div class="col-lg-1">
                        {!! Form::file('profile_picture', null) !!}
                    </div><!--col-lg-1-->
                </div><!--form control-->
                <!-- Profile Picture: End -->

                    <div class="form-group">
                        {{ Form::label('associated_roles', trans('validation.attributes.backend.access.users.associated_roles'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-3">
                            @if (count($roles) > 0)
                                @foreach($roles as $role)
                                    <input type="checkbox" value="{{$role->id}}" name="assignees_roles[{{ $role->id }}]" {{ is_array(old('assignees_roles')) ? (in_array($role->id, old('assignees_roles')) ? 'checked' : '') : (in_array($role->id, $user_roles) ? 'checked' : '') }} id="role-{{$role->id}}" /> <label for="role-{{$role->id}}">{{ $role->name }}</label>
                                        <a href="#" data-role="role_{{$role->id}}" class="show-permissions small">
                                            (
                                                <span class="show-text">{{ trans('labels.general.show') }}</span>
                                                <span class="hide-text hidden">{{ trans('labels.general.hide') }}</span>
                                                {{ trans('labels.backend.access.users.permissions') }}
                                            )
                                        </a>
                                    <br/>
                                    <div class="permission-list hidden" data-role="role_{{$role->id}}">
                                        @if ($role->all)
                                            {{ trans('labels.backend.access.users.all_permissions') }}<br/><br/>
                                        @else
                                            @if (count($role->permissions) > 0)
                                                <blockquote class="small">{{--
                                            --}}@foreach ($role->permissions as $perm){{--
                                            --}}{{$perm->display_name}}<br/>
                                                    @endforeach
                                                </blockquote>
                                            @else
                                                {{ trans('labels.backend.access.users.no_permissions') }}<br/><br/>
                                            @endif
                                        @endif
                                    </div><!--permission list-->
                                @endforeach
                            @else
                                {{ trans('labels.backend.access.users.no_roles') }}
                            @endif
                        </div><!--col-lg-3-->
                    </div><!--form control-->
                @endif
            </div><!-- /.box-body -->
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.access.user.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
                </div><!--pull-left-->

                <div class="pull-right">
                    {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-success btn-xs submit_button']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

        @if ($user->id == 1)
            {{ Form::hidden('status', 1) }}
            {{ Form::hidden('confirmed', 1) }}
            {{ Form::hidden('assignees_roles[0]', 1) }}
        @endif

    {{ Form::close() }}
@endsection

@section('after-scripts')
    {{ Html::script('js/backend/access/users/script.js') }}
    <script type="text/javascript">
        $('.select2Class').select2();
       //initialize intltel plugin
        $("#customer_phone").intlTelInput({
            autoHideDialCode: false,
            formatOnDisplay: true,
            separateDialCode: true,
            utilsScript: "{{ asset('js/backend/plugin/intl-tel-input/js/utils.js') }}"
        });

        // get number
        $('.submit_button').click(function(e) {
            e.preventDefault();
            var countryData = $('#customer_phone').intlTelInput('getSelectedCountryData');
            var tel = '+'+countryData['dialCode']+' '+$('#customer_phone').val();
            $('#server_phone').val(tel);

            // *************** validate phone and fax before submit

            if($('#customer_phone').intlTelInput('isValidNumber')) {
                $('#User_form').submit();
            }
        });
    </script>
@endsection
