<div class="bg-white p-3 push">
    <!-- Toggle Navigation -->
    <div class="d-lg-none">
        <!-- Class Toggle, functionality initialized in Helpers.coreToggleClass() -->
        <button type="button" class="btn btn-block btn-light d-flex justify-content-between align-items-center" data-toggle="class-toggle" data-target="#horizontal-navigation-hover-normal" data-class="d-none">
            <i class="feather icon-bars"></i>
        </button>
    </div>
    <!-- END Toggle Navigation -->

    <!-- Navigation -->
    <div id="horizontal-navigation-hover-normal" class="d-none d-lg-block mt-2 mt-lg-0">
        <ul class="nav-main nav-main-horizontal nav-main-hover">
            <li class="nav-main-item">
                <a class="nav-main-link nav-main-link active" href="#">
                    <i class="nav-main-link-icon feather icon-user"></i>
                    <span class="nav-main-link-name">{{__('pages.info')}}</span>
                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                    <i class="nav-main-link-icon feather icon-file"></i>
                    <span class="nav-main-link-name">{{__('pages.documents')}}</span>
                </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="javascript:void(0)">
                            <i class="nav-main-link-icon feather icon-file-text"></i>
                            <span class="nav-main-link-name">{{__('pages.permits')}}</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="javascript:void(0)">
                            <i class="nav-main-link-icon feather icon-file-plus"></i>
                            <span class="nav-main-link-name">{{__('pages.attachments')}}</span>
                        </a>
                    </li>
                </ul>            
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                    <i class="nav-main-link-icon feather icon-briefcase"></i>
                    <span class="nav-main-link-name">{{__('pages.work')}}</span>
                </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="javascript:void(0)">
                            <i class="nav-main-link-icon feather icon-briefcase"></i>
                            <span class="nav-main-link-name">{{__('pages.clients')}}</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="javascript:void(0)">
                            <i class="nav-main-link-icon feather icon-box"></i>
                            <span class="nav-main-link-name">{{__('pages.projects')}}</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="javascript:void(0)">
                            <i class="nav-main-link-icon feather icon-users"></i>
                            <span class="nav-main-link-name">{{__('pages.recruitments')}}</span>
                        </a>
                    </li>
                </ul>            
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link nav-main-link" href="#">
                    <i class="nav-main-link-icon feather icon-clock"></i>
                    <span class="nav-main-link-name">{{__('pages.history')}}</span>
                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link nav-main-link" href="#">
                    <i class="nav-main-link-icon feather icon-shuffle"></i>
                    <span class="nav-main-link-name">{{__('pages.tasks')}}</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- END Navigation -->
</div>