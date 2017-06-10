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
                     <span>Langauge Manager</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/access/*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/access/*'), 'display: block;') }}">
                    <li class="{{ active_class(Active::checkUriPattern('admin/access/langauge*')) }}">
                        <a href="{{ route('admin.access.languages.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <!-- <span>{{ trans('labels.backend.access.langauge.management') }}</span> -->
                            <span>Language Management</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="{{ active_class(Active::checkUriPattern('admin/access/*')) }} treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <!-- <span>{{ trans('menus.backend.access.title') }}</span> -->
                    <span>Locations Manager</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/access/*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/access/*'), 'display: block;') }}">
                    <li class="{{ active_class(Active::checkUriPattern('admin/access/regions*')) }}">
                        <a href="{{ route('admin.location.regions.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <!-- <span>{{ trans('labels.backend.access.users.management') }}</span> -->
                            <span>Regions</span>
                        </a>
                    </li>
                    
                    <li class="{{ active_class(Active::checkUriPattern('admin/access/country*')) }}">
                        <a href="{{ route('admin.location.country.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <!-- <span>{{ trans('labels.backend.access.users.management') }}</span> -->
                            <span>Countries</span>
                        </a>
                    </li>

                    <li class="{{ active_class(Active::checkUriPattern('admin/access/country*')) }}">
                        <a href="{{ route('admin.location.city.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <!-- <span>{{ trans('labels.backend.access.users.management') }}</span> -->
                            <span>Cities</span>
                        </a>
                    </li>

                    <li class="{{ active_class(Active::checkUriPattern('admin/access/country*')) }}">
                        <a href="{{ route('admin.location.placetypes.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <!-- <span>{{ trans('labels.backend.access.users.management') }}</span> -->
                            <span>Place Types</span>
                        </a>
                    </li>

                    <li class="{{ active_class(Active::checkUriPattern('admin/access/country*')) }}">
                        <a href="{{ route('admin.location.place.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <!-- <span>{{ trans('labels.backend.access.users.management') }}</span> -->
                            <span>Places</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="{{ active_class(Active::checkUriPattern('admin/access/safety-degrees/*') , 'active') }} treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                     <!-- <span>{{ trans('menus.backend.language.title') }}</span> -->
                     <span>Safety Degrees Manager</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/access/safety-degrees/safety*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/safety-degrees/safety*'), 'display: block;') }}">
                    <li class="{{ active_class(Active::checkUriPattern('admin/safety-degrees/safety*')) }}">
                        <a href="{{ route('admin.safety-degrees.safety.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <!-- <span>{{ trans('labels.backend.access.langauge.management') }}</span> -->
                            <span>Safety Degrees</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Activities Manager -->
            <li class="{{ active_class(Active::checkUriPattern('admin/activities*')) }} treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                     <!-- <span>{{ trans('menus.backend.language.title') }}</span> -->
                     <span>Activities Manager</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/activities*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/activities*'), 'display: block;') }}">
                    <li class="{{ active_class(Active::checkUriPattern('admin/activities/activitytypes*')) }}">
                        <a href="{{ route('admin.activities.activitytypes.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <!-- <span>{{ trans('labels.backend.access.langauge.management') }}</span> -->
                            <span>Activity Types</span>
                        </a>
                    </li>

                    <li class="{{ active_class(Active::checkUriPattern('admin/activities/activity*')) }}">
                        <a href="{{ route('admin.activities.activity.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <!-- <span>{{ trans('labels.backend.access.users.management') }}</span> -->
                            <span>Activities</span>
                        </a>
                    </li>

                    <li class="{{ active_class(Active::checkUriPattern('admin/activities/activity*')) }}">
                        <a href="{{ route('admin.activitymedia.activitymedia.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <!-- <span>{{ trans('labels.backend.access.users.management') }}</span> -->
                            <span>Activity Media</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Interests Manager -->
            <li class="{{ active_class(Active::checkUriPattern('admin/interest/interest*')) }} treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                     <!-- <span>{{ trans('menus.backend.language.title') }}</span> -->
                     <span>Interests Manager</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/interest/interest*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/interest/interest*'), 'display: block;') }}">
                    <li class="{{ active_class(Active::checkUriPattern('admin/interest/interest*')) }}">
                        <a href="{{ route('admin.interest.interest.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <!-- <span>{{ trans('labels.backend.access.langauge.management') }}</span> -->
                            <span>Interests</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Religions Manager -->
            <li class="{{ active_class(Active::checkUriPattern('admin/religion/religion*')) }} treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                     <!-- <span>{{ trans('menus.backend.language.title') }}</span> -->
                     <span>Religions Manager</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/religion/religion*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/religion/religion*'), 'display: block;') }}">
                    <li class="{{ active_class(Active::checkUriPattern('admin/religion/religion*')) }}">
                        <a href="{{ route('admin.religion.religion.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <!-- <span>{{ trans('labels.backend.access.langauge.management') }}</span> -->
                            <span>Religions</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Levels Manager -->
            <li class="{{ active_class(Active::checkUriPattern('admin/levels/levels*')) }} treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                     <!-- <span>{{ trans('menus.backend.language.title') }}</span> -->
                     <span>{{ trans('labels.backend.levels.levels') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/levels/levels*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/levels/levels*'), 'display: block;') }}">
                    <li class="{{ active_class(Active::checkUriPattern('admin/levels/levels*')) }}">
                        <a href="{{ route('admin.levels.levels.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <!-- <span>{{ trans('labels.backend.access.langauge.management') }}</span> -->
                            <span>{{ trans('labels.backend.levels.levels_manager') }}</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Life Styles Manager -->
            <li class="{{ active_class(Active::checkUriPattern('admin/levels/levels*')) }} treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                     <!-- <span>{{ trans('menus.backend.language.title') }}</span> -->
                     <span>Life Styles Manager</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/levels/levels*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/levels/levels*'), 'display: block;') }}">
                    <li class="{{ active_class(Active::checkUriPattern('admin/levels/levels*')) }}">
                        <a href="{{ route('admin.lifestyle.lifestyle.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <!-- <span>{{ trans('labels.backend.access.langauge.management') }}</span> -->
                            <span>Life Styles</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Languages Spoken Manager -->
            <li class="{{ active_class(Active::checkUriPattern('admin/levels/levels*')) }} treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                     <!-- <span>{{ trans('menus.backend.language.title') }}</span> -->
                     <span>Languages Spoken Manager</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/levels/levels*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/levels/levels*'), 'display: block;') }}">
                    <li class="{{ active_class(Active::checkUriPattern('admin/levels/levels*')) }}">
                        <a href="{{ route('admin.languagesspoken.languagesspoken.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <!-- <span>{{ trans('labels.backend.access.langauge.management') }}</span> -->
                            <span>Languages Spoken</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Timings Manager -->
            <li class="{{ active_class(Active::checkUriPattern('admin/levels/levels*')) }} treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                     <!-- <span>{{ trans('menus.backend.language.title') }}</span> -->
                     <span>Timings Manager</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/levels/levels*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/levels/levels*'), 'display: block;') }}">
                    <li class="{{ active_class(Active::checkUriPattern('admin/levels/levels*')) }}">
                        <a href="{{ route('admin.timings.timings.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <!-- <span>{{ trans('labels.backend.access.langauge.management') }}</span> -->
                            <span>Timings</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Weekdays Manager -->
            <li class="{{ active_class(Active::checkUriPattern('admin/levels/levels*')) }} treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                     <!-- <span>{{ trans('menus.backend.language.title') }}</span> -->
                     <span>Weekdays Manager</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/levels/levels*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/levels/levels*'), 'display: block;') }}">
                    <li class="{{ active_class(Active::checkUriPattern('admin/levels/levels*')) }}">
                        <a href="{{ route('admin.weekdays.weekdays.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <!-- <span>{{ trans('labels.backend.access.langauge.management') }}</span> -->
                            <span>Weekdays</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Holidays Manager -->
            <li class="{{ active_class(Active::checkUriPattern('admin/levels/levels*')) }} treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                     <!-- <span>{{ trans('menus.backend.language.title') }}</span> -->
                     <span>Holidays Manager</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/levels/levels*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/levels/levels*'), 'display: block;') }}">
                    <li class="{{ active_class(Active::checkUriPattern('admin/levels/levels*')) }}">
                        <a href="{{ route('admin.holidays.holidays.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <!-- <span>{{ trans('labels.backend.access.langauge.management') }}</span> -->
                            <span>Holidays</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Hobbies Manager -->
            <li class="{{ active_class(Active::checkUriPattern('admin/levels/levels*')) }} treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                     <!-- <span>{{ trans('menus.backend.language.title') }}</span> -->
                     <span>Hobbies Manager</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/levels/levels*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/levels/levels*'), 'display: block;') }}">
                    <li class="{{ active_class(Active::checkUriPattern('admin/levels/levels*')) }}">
                        <a href="{{ route('admin.hobbies.hobbies.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <!-- <span>{{ trans('labels.backend.access.langauge.management') }}</span> -->
                            <span>Hobbies</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Emergency Numbers Manager -->
            <li class="{{ active_class(Active::checkUriPattern('admin/levels/levels*')) }} treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                     <!-- <span>{{ trans('menus.backend.language.title') }}</span> -->
                     <span>Emergency Numbers Manager</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/levels/levels*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/levels/levels*'), 'display: block;') }}">
                    <li class="{{ active_class(Active::checkUriPattern('admin/levels/levels*')) }}">
                        <a href="{{ route('admin.emergencynumbers.emergencynumbers.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <!-- <span>{{ trans('labels.backend.access.langauge.management') }}</span> -->
                            <span>Emergency Numbers</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Currencies Manager -->
            <li class="{{ active_class(Active::checkUriPattern('admin/levels/levels*')) }} treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                     <!-- <span>{{ trans('menus.backend.language.title') }}</span> -->
                     <span>Currencies Manager</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/levels/levels*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/levels/levels*'), 'display: block;') }}">
                    <li class="{{ active_class(Active::checkUriPattern('admin/levels/levels*')) }}">
                        <a href="{{ route('admin.currencies.currencies.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <!-- <span>{{ trans('labels.backend.access.langauge.management') }}</span> -->
                            <span>Currencies</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Cultures Manager -->
            <li class="{{ active_class(Active::checkUriPattern('admin/levels/levels*')) }} treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                     <!-- <span>{{ trans('menus.backend.language.title') }}</span> -->
                     <span>Cultures Manager</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/levels/levels*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/levels/levels*'), 'display: block;') }}">
                    <li class="{{ active_class(Active::checkUriPattern('admin/levels/levels*')) }}">
                        <a href="{{ route('admin.cultures.cultures.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <!-- <span>{{ trans('labels.backend.access.langauge.management') }}</span> -->
                            <span>Cultures</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Accommodations Manager -->
            <li class="{{ active_class(Active::checkUriPattern('admin/levels/levels*')) }} treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                     <!-- <span>{{ trans('menus.backend.language.title') }}</span> -->
                     <span>Accommodations Manager</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/levels/levels*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/levels/levels*'), 'display: block;') }}">
                    <li class="{{ active_class(Active::checkUriPattern('admin/levels/levels*')) }}">
                        <a href="{{ route('admin.accommodations.accommodations.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <!-- <span>{{ trans('labels.backend.access.langauge.management') }}</span> -->
                            <span>Accommodations</span>
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