<nav id="sidebar" aria-label="Main Navigation">
    <!-- Side Header -->
    <div class="content-header bg-white-5">
        <!-- Logo -->
        <a class="font-w600 text-dual" href="{{route('index')}}">
            <span class="smini-visible">
                <i class="fa fa-infinity text-primary"></i>
            </span>
            <span class="smini-hide font-size-h5 tracking-wider">
                <span class="font-w400">Outsource</span>Link&nbsp;&nbsp;<i class="fa fa-infinity text-primary"></i>
            </span>
        </a>
        <!-- END Logo -->
    </div>
    <!-- END Side Header -->

    <!-- Sidebar Scrolling -->
    <div class="js-sidebar-scroll">
        <!-- Side Navigation -->
        <div class="content-side">
            <ul class="nav-main">
                <li class="nav-main-item">
                    <a class="nav-main-link {{ request()->routeIs('index') ? 'active' : '' }}" href="{{ route('index') }}">
                        <i class="nav-main-link-icon feather icon-compass"></i>
                        <span class="nav-main-link-name">{{ __('pages.dashboard') }}</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link" href="">
                        <i class="nav-main-link-icon feather icon-book-open"></i>
                        <span class="nav-main-link-name">{{ __('pages.knowledge') }}</span>
                    </a>
                </li>
                <li class="nav-main-heading">{{ __('pages.modules') }}</li>
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu {{ request()->routeIs('candidates.*') ? 'active' : '' }}" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon feather icon-user"></i>
                        <span class="nav-main-link-name">{{ __('pages.candidates') }}</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('candidates.index') ? 'active' : '' }}" href="{{ route('candidates.index') }}">
                                <span class="nav-main-link-name">{{ __('pages.view') }}</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('candidates.create') ? 'active' : '' }}" href="{{ route('candidates.create') }}">
                                <span class="nav-main-link-name">{{ __('pages.add') }}</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('candidates.recruitments') ? 'active' : '' }}" href="">
                                <span class="nav-main-link-name">{{ __('pages.recruitments') }}</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('partners.index') ? 'active' : '' }}" href="{{ route('partners.index') }}">
                                <span class="nav-main-link-name">{{ __('pages.partners') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu {{ request()->routeIs('employees.*') ? 'active' : '' }}"" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon feather icon-users"></i>
                        <span class="nav-main-link-name">{{ __('pages.employees') }}</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('employees.index') ? 'active' : '' }}" href="{{ route('employees.index') }}">
                                <span class="nav-main-link-name">{{ __('pages.view') }}</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" {{ request()->routeIs('employees.create') ? 'active' : '' }}" href="{{ route('employees.create') }}">
                                <span class="nav-main-link-name">{{ __('pages.add') }}</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="">
                                <span class="nav-main-link-name">{{ __('pages.em_planning') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon feather icon-briefcase"></i>
                        <span class="nav-main-link-name">{{ __('pages.clients') }}</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="">
                                <span class="nav-main-link-name">{{ __('pages.view') }}</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="">
                                <span class="nav-main-link-name">{{ __('pages.add') }}</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="">
                                <span class="nav-main-link-name">{{ __('pages.summary') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon feather icon-box"></i>
                        <span class="nav-main-link-name">{{ __('pages.projects') }}</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="">
                                <span class="nav-main-link-name">{{ __('pages.view') }}</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="">
                                <span class="nav-main-link-name">{{ __('pages.add') }}</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="">
                                <span class="nav-main-link-name">{{ __('pages.em_planning') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon feather icon-trending-up"></i>
                        <span class="nav-main-link-name">{{ __('pages.reports') }}</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="">
                                <span class="nav-main-link-name">{{ __('pages.rep_employment') }}</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="">
                                <span class="nav-main-link-name">{{ __('pages.rep_management') }}</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="">
                                <span class="nav-main-link-name">{{ __('pages.rep_projects') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link {{ request()->is('tasks.index') ? 'active' : '' }}" href="{{ route('tasks.index') }}">
                        <i class="nav-main-link-icon feather icon-shuffle"></i>
                        <span class="nav-main-link-name">{{ __('pages.tasks') }}</span>
                    </a>
                </li>    
                <li class="nav-main-heading">{{ __('pages.u_menu') }}</li>
                @if (Auth::user()->is_admin == 1)
                    <li class="nav-main-item">
                        <a class="nav-main-link {{ request()->routeIs('sysSettings.*') ? 'active' : '' }}" href="{{ route('sysSettings.index') }}">
                            <i class="nav-main-link-icon feather icon-sliders"></i>
                            <span class="nav-main-link-name">{{ __('pages.sys_settings') }}</span>
                        </a>
                    </li>
                @endif
                <li class="nav-main-item">
                    <a class="nav-main-link" href="{{ route('auth.logout') }}">
                        <i class="nav-main-link-icon feather icon-log-out"></i>
                        <span class="nav-main-link-name">{{ __('auth.logout') }}</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- END Side Navigation -->
    </div>
    <!-- END Sidebar Scrolling -->
</nav>