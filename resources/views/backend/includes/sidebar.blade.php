<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ access()->user()->picture }}" class="img-circle" alt="User Image" />
            </div><!--pull-left-->
            <div class="pull-left info">
                <p>{{ access()->user()->name }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('strings.backend.general.status.online') }}</a>
            </div><!--pull-left-->
        </div><!--user-panel-->

        <!-- search form (Optional) -->
        {{ Form::open(['route' => 'admin.search.index', 'method' => 'get', 'class' => 'sidebar-form']) }}
        <div class="input-group">
            {{ Form::text('q', Request::get('q'), ['class' => 'form-control', 'required' => 'required', 'placeholder' => trans('strings.backend.general.search_placeholder')]) }}

            <span class="input-group-btn">
                    <button type='submit' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                  </span><!--input-group-btn-->
        </div><!--input-group-->
    {{ Form::close() }}
    <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('menus.backend.sidebar.general') }}</li>

            <li class="{{ active_class(Active::checkUriPattern('admin/dashboard')) }}">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-dashboard"></i>
                    <span>{{ trans('menus.backend.sidebar.dashboard') }}</span>
                </a>
            </li>

            <li class="header">{{ trans('menus.backend.sidebar.system') }}</li>

            @role(1)
            <li class="{{ active_class(Active::checkUriPattern('admin/access/*')) }} treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>{{ trans('menus.backend.access.title') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/access/*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/access/*'), 'display: block;') }}">
                    <li class="{{ active_class(Active::checkUriPattern('admin/access/user*')) }}">
                        <a href="{{ route('admin.access.user.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <span>{{ trans('labels.backend.access.users.management') }}</span>
                        </a>
                    </li>

                    <li class="{{ active_class(Active::checkUriPattern('admin/access/role*')) }}">
                        <a href="{{ route('admin.access.role.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <span>{{ trans('labels.backend.access.roles.management') }}</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="{{ active_class(Active::checkUriPattern('admin/access/*')) }} treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                     <!-- <span>{{ trans('menus.backend.language.title') }}</span> -->
                     <span>{{ trans('labels.backend.languages.languages_manager') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/access/*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/access/*'), 'display: block;') }}">
                    <li class="{{ active_class(Active::checkUriPattern('admin/access/langauge*')) }}">
                        <a href="{{ route('admin.access.languages.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <!-- <span>{{ trans('labels.backend.access.langauge.management') }}</span> -->
                            <span>{{ trans('labels.backend.languages.languages_management') }}</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Locations Manager Start -->
            <li class="{{ active_class(Active::checkUriPattern('admin/location/*')) }} treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <!-- <span>{{ trans('menus.backend.access.title') }}</span> -->
                    <span>{{ trans('labels.backend.locations.locations_manager') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/location/*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/location/*'), 'display: block;') }}">
                    <li class="{{ active_class(Active::checkUriPattern('admin/location/regions*')) }}">
                        <a href="{{ route('admin.location.regions.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <!-- <span>{{ trans('labels.backend.access.users.management') }}</span> -->
                            <span>{{ trans('labels.backend.locations.regions') }}</span>
                        </a>
                    </li>
                    
                    <li class="{{ active_class(Active::checkUriPattern('admin/location/country*')) }}">
                        <a href="{{ route('admin.location.country.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <!-- <span>{{ trans('labels.backend.access.users.management') }}</span> -->
                            <span>{{ trans('labels.backend.locations.countries') }}</span>
                        </a>
                    </li>

                    <li class="{{ active_class(Active::checkUriPattern('admin/location/city*')) }}">
                        <a href="{{ route('admin.location.city.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <!-- <span>{{ trans('labels.backend.access.users.management') }}</span> -->
                            <span>{{ trans('labels.backend.locations.cities') }}</span>
                        </a>
                    </li>

                    <li class="{{ active_class(Active::checkUriPattern('admin/location/placetypes*')) }}">
                        <a href="{{ route('admin.location.placetypes.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <!-- <span>{{ trans('labels.backend.access.users.management') }}</span> -->
                            <span>{{ trans('labels.backend.locations.place_types') }}</span>
                        </a>
                    </li>

                    <li class="{{ active_class(Active::checkUriPattern('admin/location/place/*')) | active_class(Active::checkUriPattern('admin/location/place')) }}">
                        <a href="{{ route('admin.location.place.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <!-- <span>{{ trans('labels.backend.access.users.management') }}</span> -->
                            <span>{{ trans('labels.backend.locations.places') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Locations Manager End -->
            
            <!-- Embassies Manager Start -->
            <li class="{{ active_class(Active::checkUriPattern('admin/embassies/embassies*') , 'active') }} treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                     <!-- <span>{{ trans('menus.backend.language.title') }}</span> -->
                     <span>{{ trans('labels.backend.embassies.embassies_manager') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/embassies/embassies*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/embassies/embassies*'), 'display: block;') }}">
                    <li class="{{ active_class(Active::checkUriPattern('admin/embassies/embassies*')) }}">
                        <a href="{{ route('admin.embassies.embassies.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <!-- <span>{{ trans('labels.backend.access.langauge.management') }}</span> -->
                            <span>{{ trans('labels.backend.embassies.embassies') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Embassies Manager End -->

            <!-- Hotels Manager Start -->
            <li class="{{ active_class(Active::checkUriPattern('admin/hotels/hotels*') , 'active') }} treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                     <!-- <span>{{ trans('menus.backend.language.title') }}</span> -->
                     <span>{{ 'Hotels Manager' }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/hotels/hotels*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/hotels/hotels*'), 'display: block;') }}">
                    <li class="{{ active_class(Active::checkUriPattern('admin/hotels/hotels*')) }}">
                        <a href="{{ route('admin.hotels.hotels.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <!-- <span>{{ trans('labels.backend.access.langauge.management') }}</span> -->
                            <span>{{ 'Hotels' }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Hotels Manager End -->

            <!-- Restaurants Manager Start -->
            <li class="{{ active_class(Active::checkUriPattern('admin/restaurants/restaurants*') , 'active') }} treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                     <!-- <span>{{ trans('menus.backend.language.title') }}</span> -->
                     <span>{{ 'Restaurants Manager' }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/restaurants/restaurants*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/restaurants/restaurants*'), 'display: block;') }}">
                    <li class="{{ active_class(Active::checkUriPattern('admin/restaurants/restaurants*')) }}">
                        <a href="{{ route('admin.restaurants.restaurants.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <!-- <span>{{ trans('labels.backend.access.langauge.management') }}</span> -->
                            <span>{{ 'Restaurants' }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Restaurants Manager End -->

            <!-- Activities Manager -->
            <li class="{{ active_class(Active::checkUriPattern('admin/activities*')) | active_class(Active::checkUriPattern('admin/activitymedia/activitymedia-disabled*')) }} treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                     <!-- <span>{{ trans('menus.backend.language.title') }}</span> -->
                     <span>{{ trans('labels.backend.activities.activities_manager') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/activities*'), 'menu-open') | active_class(Active::checkUriPattern('admin/activitymedia/activitymedia-disabled*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/activities*') | Active::checkUriPattern('admin/activitymedia/activitymedia-disabled*'), 'display: block;') }}">
                    
                    <li class="{{ active_class(Active::checkUriPattern('admin/activities/activitytypes*')) }}">
                        <a href="{{ route('admin.activities.activitytypes.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <!-- <span>{{ trans('labels.backend.access.langauge.management') }}</span> -->
                            <span>{{ trans('labels.backend.activities.activity_types') }}</span>
                        </a>
                    </li>

                    <li class="{{ active_class(Active::checkUriPattern('admin/activities/activity') | Active::checkUriPattern('admin/activities/activity/*')) }}">
                        <a href="{{ route('admin.activities.activity.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <!-- <span>{{ trans('labels.backend.access.users.management') }}</span> -->
                            <span>{{ trans('labels.backend.activities.activities') }}</span>
                        </a>
                    </li>

                    <li class="{{ active_class(Active::checkUriPattern('admin/activitymedia/activitymedia-disabled*')) }}">
                        <a href="javascript:void(0);">
                            <i class="fa fa-circle-o"></i>
                            <!-- <span>{{ trans('labels.backend.access.users.management') }}</span> -->
                            <span>{{ trans('labels.backend.activities.activity_media') }}</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Interests Manager -->
            <li class="{{ active_class(Active::checkUriPattern('admin/interest/interest*')) }} treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                     <!-- <span>{{ trans('menus.backend.language.title') }}</span> -->
                     <span>{{ trans('labels.backend.interests.interests_manager') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/interest/interest*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/interest/interest*'), 'display: block;') }}">
                    <li class="{{ active_class(Active::checkUriPattern('admin/interest/interest*')) }}">
                        <a href="{{ route('admin.interest.interest.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <!-- <span>{{ trans('labels.backend.access.langauge.management') }}</span> -->
                            <span>{{ trans('labels.backend.interests.interests') }}</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Media Manager -->
            <li class="{{ active_class(Active::checkUriPattern('admin/activitymedia/activitymedia*')) }} treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                     <!-- <span>{{ trans('menus.backend.language.title') }}</span> -->
                     <span>{{ 'Media Manager' }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/activitymedia/activitymedia*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/activitymedia/activitymedia**'), 'display: block;') }}">
                    <li class="{{ active_class(Active::checkUriPattern('admin/activitymedia/activitymedia*')) }}">
                        <a href="{{ route('admin.activitymedia.activitymedia.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <!-- <span>{{ trans('labels.backend.access.langauge.management') }}</span> -->
                            <span>{{ 'Medias' }}</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Religions Manager -->
            <li class="{{ active_class(Active::checkUriPattern('admin/religion/religion*')) }} treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                     <!-- <span>{{ trans('menus.backend.language.title') }}</span> -->
                     <span>{{ trans('labels.backend.religions.religions_manager') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/religion/religion*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/religion/religion*'), 'display: block;') }}">
                    <li class="{{ active_class(Active::checkUriPattern('admin/religion/religion*')) }}">
                        <a href="{{ route('admin.religion.religion.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <!-- <span>{{ trans('labels.backend.access.langauge.management') }}</span> -->
                            <span>{{ trans('labels.backend.religions.religions') }}</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Levels Manager -->
            <li class="{{ active_class(Active::checkUriPattern('admin/levels/levels*')) }} treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                     <!-- <span>{{ trans('menus.backend.language.title') }}</span> -->
                     <span>{{ trans('labels.backend.levels.levels_manager') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/levels/levels*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/levels/levels*'), 'display: block;') }}">
                    <li class="{{ active_class(Active::checkUriPattern('admin/levels/levels*')) }}">
                        <a href="{{ route('admin.levels.levels.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <!-- <span>{{ trans('labels.backend.access.langauge.management') }}</span> -->
                            <span>{{ trans('labels.backend.levels.levels') }}</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Life Styles Manager -->
            <li class="{{ active_class(Active::checkUriPattern('admin/lifestyle/lifestyle*')) }} treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                     <!-- <span>{{ trans('menus.backend.language.title') }}</span> -->
                     <span>{{ trans('labels.backend.lifestyles.lifestyles_manager') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/lifestyle/lifestyle*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/lifestyle/lifestyle*'), 'display: block;') }}">
                    <li class="{{ active_class(Active::checkUriPattern('admin/lifestyle/lifestyle*')) }}">
                        <a href="{{ route('admin.lifestyle.lifestyle.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <!-- <span>{{ trans('labels.backend.access.langauge.management') }}</span> -->
                            <span>{{ trans('labels.backend.lifestyles.lifestyles') }}</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Languages Spoken Manager -->
            <li class="{{ active_class(Active::checkUriPattern('admin/languagesspoken/languagesspoken*')) }} treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                     <!-- <span>{{ trans('menus.backend.language.title') }}</span> -->
                     <span>{{ trans('labels.backend.languages_spoken.languages_spoken_manager') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/languagesspoken/languagesspoken*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/languagesspoken/languagesspoken*'), 'display: block;') }}">
                    <li class="{{ active_class(Active::checkUriPattern('admin/languagesspoken/languagesspoken*')) }}">
                        <a href="{{ route('admin.languagesspoken.languagesspoken.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <!-- <span>{{ trans('labels.backend.access.langauge.management') }}</span> -->
                            <span>{{ trans('labels.backend.languages_spoken.languages_spoken') }}</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Timings Manager -->
            <li class="{{ active_class(Active::checkUriPattern('admin/timings/timings*')) }} treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                     <!-- <span>{{ trans('menus.backend.language.title') }}</span> -->
                     <span>{{ trans('labels.backend.timings.timings_manager') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/timings/timings*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/timings/timings*'), 'display: block;') }}">
                    <li class="{{ active_class(Active::checkUriPattern('admin/timings/timings*')) }}">
                        <a href="{{ route('admin.timings.timings.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <!-- <span>{{ trans('labels.backend.access.langauge.management') }}</span> -->
                            <span>{{ trans('labels.backend.timings.timings') }}</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Weekdays Manager -->
            <li class="{{ active_class(Active::checkUriPattern('admin/weekdays/weekdays*')) }} treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                     <!-- <span>{{ trans('menus.backend.language.title') }}</span> -->
                     <span>{{ trans('labels.backend.weekdays.weekdays_manager') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/weekdays/weekdays*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/weekdays/weekdays*'), 'display: block;') }}">
                    <li class="{{ active_class(Active::checkUriPattern('admin/weekdays/weekdays*')) }}">
                        <a href="{{ route('admin.weekdays.weekdays.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <!-- <span>{{ trans('labels.backend.access.langauge.management') }}</span> -->
                            <span>{{ trans('labels.backend.weekdays.weekdays') }}</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Holidays Manager -->
            <li class="{{ active_class(Active::checkUriPattern('admin/holidays/holidays*')) }} treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                     <!-- <span>{{ trans('menus.backend.language.title') }}</span> -->
                     <span>{{ trans('labels.backend.holidays.holidays_manager') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/holidays/holidays*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/holidays/holidays*'), 'display: block;') }}">
                    <li class="{{ active_class(Active::checkUriPattern('admin/holidays/holidays*')) }}">
                        <a href="{{ route('admin.holidays.holidays.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <!-- <span>{{ trans('labels.backend.access.langauge.management') }}</span> -->
                            <span>{{ trans('labels.backend.holidays.holidays') }}</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Hobbies Manager -->
            <li class="{{ active_class(Active::checkUriPattern('admin/hobbies/hobbies*')) }} treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                     <!-- <span>{{ trans('menus.backend.language.title') }}</span> -->
                     <span>{{ trans('labels.backend.hobbies.hobbies_manager') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/hobbies/hobbies*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/hobbies/hobbies*'), 'display: block;') }}">
                    <li class="{{ active_class(Active::checkUriPattern('admin/hobbies/hobbies*')) }}">
                        <a href="{{ route('admin.hobbies.hobbies.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <!-- <span>{{ trans('labels.backend.access.langauge.management') }}</span> -->
                            <span>{{ trans('labels.backend.hobbies.hobbies') }}</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Emergency Numbers Manager -->
            <li class="{{ active_class(Active::checkUriPattern('admin/lemergencynumbers/emergencynumbers*')) }} treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                     <!-- <span>{{ trans('menus.backend.language.title') }}</span> -->
                     <span>{{ trans('labels.backend.emergency_numbers.emergency_numbers_manager') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/emergencynumbers/emergencynumbers*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/emergencynumbers/emergencynumbers*'), 'display: block;') }}">
                    <li class="{{ active_class(Active::checkUriPattern('admin/emergencynumbers/emergencynumbers*')) }}">
                        <a href="{{ route('admin.emergencynumbers.emergencynumbers.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <!-- <span>{{ trans('labels.backend.access.langauge.management') }}</span> -->
                            <span>{{ trans('labels.backend.emergency_numbers.emergency_numbers') }}</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Currencies Manager -->
            <li class="{{ active_class(Active::checkUriPattern('admin/currencies/currencies*')) }} treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                     <!-- <span>{{ trans('menus.backend.language.title') }}</span> -->
                     <span>{{ trans('labels.backend.currencies.currencies_manager') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/currencies/currencies*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/currencies/currencies*'), 'display: block;') }}">
                    <li class="{{ active_class(Active::checkUriPattern('admin/currencies/currencies*')) }}">
                        <a href="{{ route('admin.currencies.currencies.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <!-- <span>{{ trans('labels.backend.access.langauge.management') }}</span> -->
                            <span>{{ trans('labels.backend.currencies.currencies') }}</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Cultures Manager -->
            <li class="{{ active_class(Active::checkUriPattern('admin/cultures/cultures*')) }} treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                     <!-- <span>{{ trans('menus.backend.language.title') }}</span> -->
                     <span>{{ trans('labels.backend.cultures.cultures_manager') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/cultures/cultures*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/cultures/cultures*'), 'display: block;') }}">
                    <li class="{{ active_class(Active::checkUriPattern('admin/cultures/cultures*')) }}">
                        <a href="{{ route('admin.cultures.cultures.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <!-- <span>{{ trans('labels.backend.access.langauge.management') }}</span> -->
                            <span>{{ trans('labels.backend.cultures.cultures') }}</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Accommodations Manager -->
            <li class="{{ active_class(Active::checkUriPattern('admin/accommodations/accommodations*')) }} treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                     <!-- <span>{{ trans('menus.backend.language.title') }}</span> -->
                     <span>{{ trans('labels.backend.accommodations.accommodations_manager') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/accommodations/accommodations*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/accommodations/accommodations*'), 'display: block;') }}">
                    <li class="{{ active_class(Active::checkUriPattern('admin/accommodations/accommodations*')) }}">
                        <a href="{{ route('admin.accommodations.accommodations.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <!-- <span>{{ trans('labels.backend.access.langauge.management') }}</span> -->
                            <span>{{ trans('labels.backend.accommodations.accommodations') }}</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Age Ranges Manager -->
            <li class="{{ active_class(Active::checkUriPattern('admin/ageranges/ageranges*')) }} treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                     <!-- <span>{{ trans('menus.backend.language.title') }}</span> -->
                     <span>{{ trans('labels.backend.age_ranges.age_ranges_manager') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/ageranges/ageranges*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/ageranges/ageranges*'), 'display: block;') }}">
                    <li class="{{ active_class(Active::checkUriPattern('admin/ageranges/ageranges*')) }}">
                        <a href="{{ route('admin.ageranges.ageranges.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <!-- <span>{{ trans('labels.backend.access.langauge.management') }}</span> -->
                            <span>{{ trans('labels.backend.age_ranges.age_ranges') }}</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Pages Manager -->
            <li class="{{ active_class(Active::checkUriPattern('admin/pages/pages*')) }} treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                     <!-- <span>{{ trans('menus.backend.language.title') }}</span> -->
                     <span>{{ 'Pages Manager' }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/pages/*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/pages/*'), 'display: block;') }}">
                    <li class="{{ active_class(Active::checkUriPattern('admin/pages/pages') | Active::checkUriPattern('admin/pages/pages/*')) }}">
                        <a href="{{ route('admin.pages.pages.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <!-- <span>{{ trans('labels.backend.access.langauge.management') }}</span> -->
                            <span>{{ 'Pages' }}</span>
                        </a>
                    </li>

                    <li class="{{ active_class(Active::checkUriPattern('admin/pages/pages_categories*')) }}">
                        <a href="{{ route('admin.pages.pages_categories.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <!-- <span>{{ trans('labels.backend.access.langauge.management') }}</span> -->
                            <span>{{ 'Pages Categories' }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endauth

            <li class="{{ active_class(Active::checkUriPattern('admin/log-viewer*')) }} treeview">
                <a href="#">
                    <i class="fa fa-list"></i>
                    <span>{{ trans('menus.backend.log-viewer.main') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/log-viewer*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/log-viewer*'), 'display: block;') }}">
                    <li class="{{ active_class(Active::checkUriPattern('admin/log-viewer')) }}">
                        <a href="{{ route('log-viewer::dashboard') }}">
                            <i class="fa fa-circle-o"></i>
                            <span>{{ trans('menus.backend.log-viewer.dashboard') }}</span>
                        </a>
                    </li>

                    <li class="{{ active_class(Active::checkUriPattern('admin/log-viewer/logs')) }}">
                        <a href="{{ route('log-viewer::logs.list') }}">
                            <i class="fa fa-circle-o"></i>
                            <span>{{ trans('menus.backend.log-viewer.logs') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section><!-- /.sidebar -->
</aside>