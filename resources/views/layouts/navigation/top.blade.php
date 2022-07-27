<header id="page-header">
    <div class="content-header">
        <div class="d-flex align-items-center">

            <button type="button" class="btn btn-sm btn-dual mr-2 d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <button type="button" class="btn btn-sm btn-dual mr-2 d-none d-lg-inline-block" data-toggle="layout" data-action="sidebar_mini_toggle">
                <i class="fa fa-fw fa-ellipsis-v"></i>
            </button>

            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <button type="button" class="btn btn-sm btn-dual d-md-none" data-toggle="layout" data-action="header_search_on">
                <i class="fa fa-fw fa-search"></i>
            </button>
            <!-- END Open Search Section -->

            <!-- Search Form (visible on larger screens) -->
            <form class="d-none d-md-inline-block" action="" method="POST">
                <div class="input-group input-group-sm">
                    <input type="text" class="form-control form-control-alt" placeholder="{{__('misc.search')}}.." id="page-header-search-input2" name="page-header-search-input2">
                    <div class="input-group-append">
                        <span class="input-group-text bg-body border-0">
                            <i class="fa fa-fw fa-search"></i>
                        </span>
                    </div>
                </div>
            </form>
        </div>

        <div class="d-flex align-items-center">
            <div class="dropdown dropleft push d-inline-block ml-2">
                <button type="button" class="btn btn-sm btn-dual dropdown-toggle" id="dropdown-dropleft-dark" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="feather icon-repeat"></i>
                    <span class="d-none d-sm-inline-block ml-2">{{Session::get('currentCompany')->name}}</span>
                </button>
                <div class="dropdown-menu font-size-sm" aria-labelledby="dropdown-dropleft-dark">
                    @if (Session::has('companies'))
                        <?php $companies = Session::get('companies'); ?>
                        @foreach ( $companies as $company )
                            <a href="{{route('auth.companySwitch', ['id' => $company->id])}}"><button type="submit" class="btn btn-sm btn-dual dropdown-item"">
                                <span class="d-none d-sm-inline-block ml-2">{{$company->name}}</span>
                            </button></a>
                        @endforeach   
                    @endif
           
                </div>
            </div>
            <div class="dropdown d-inline-block ml-2">
                <button type="button" class="btn btn-sm btn-dual d-flex align-items-center" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle" src="{{URL('media/avatars/avatar0.jpg')}}" alt="Header Avatar" style="width: 21px;">
                    <span class="d-none d-sm-inline-block ml-2">{{Auth::user()->firstname}}</span>
                    <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block ml-1 mt-1"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-md dropdown-menu-right p-0 border-0" aria-labelledby="page-header-user-dropdown">
                    <div class="p-3 text-center bg-primary-dark rounded-top">
                        <img class="img-avatar img-avatar-thumb" src="{{URL('media/avatars/avatar0.jpg')}}" alt="">
                        <p class="mt-2 mb-0 text-white font-w500">{{Auth::user()->firstname . ' ' . Auth::user()->surname}}</p>
                        <p class="mb-0 text-white-50 font-size-sm">Administrator</p>
                    </div>
                    <div class="p-2">
                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="">
                            <span class="font-size-sm font-w500">Profile</span>
                            <span class="badge badge-pill badge-primary ml-2">1</span>
                        </a>
                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                            <span class="font-size-sm font-w500">Settings</span>
                        </a>
                        <div role="separator" class="dropdown-divider"></div>
                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="">
                            <span class="font-size-sm font-w500">Log Out</span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Notification dropdown -->
            @include('layouts.widgets.notifications')


            <button type="button" class="btn btn-sm btn-dual ml-2" data-toggle="layout" data-action="side_overlay_toggle">
                <i class="fa fa-fw fa-list-ul fa-flip-horizontal"></i>
            </button>
        </div>
    </div>

    <div id="page-header-search" class="overlay-header bg-white">
        <div class="content-header">
            <form class="w-100" action="" method="POST">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <button type="button" class="btn btn-alt-danger" data-toggle="layout" data-action="header_search_off">
                            <i class="fa fa-fw fa-times-circle"></i>
                        </button>
                    </div>
                    <input type="text" class="form-control" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
                </div>
            </form>
        </div>
    </div>
    <!-- Page loader -->
    <div id="page-header-loader" class="overlay-header bg-white">
        <div class="content-header">
            <div class="w-100 text-center">
                <i class="fa fa-fw fa-circle-notch fa-spin"></i>
            </div>
        </div>
    </div>
</header>
