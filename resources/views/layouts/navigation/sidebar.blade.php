<div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed">
<aside id="side-overlay">
    <!-- Side Header -->
    <div class="content-header border-bottom">
        <a class="img-link mr-1" href="javascript:void(0)">
            <img class="img-avatar img-avatar02" src="{{ asset('media/avatars/avatar0.jpg') }}" alt="">
        </a>

        <div class="ml-2">
            <a class="text-dark font-w600 font-size-sm" href="javascript:void(0)">{{Auth::user()->firstname . ' ' . Auth::user()->surname}}</a>
        </div>

        <!-- Close Side Overlay -->
        <a class="ml-auto btn btn-sm btn-alt-danger" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_close">
            <i class="fa fa-fw fa-times"></i>
        </a>
        <!-- END Close Side Overlay -->
    </div>
    <!-- END Side Header -->

    <!-- Side Content -->
    <div class="content-side">
        <!-- Side Overlay Tabs -->
        <div class="block block-transparent pull-x pull-t">
            <ul class="nav nav-tabs nav-tabs-alt nav-justified" data-toggle="tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="#so-overview">
                        <i class="fa fa-fw fa-coffee text-gray mr-1"></i> {{__('pages.overview')}}
                    </a>
                </li>
            </ul>
            <div class="block-content tab-content overflow-hidden">
                <!-- Overview Tab -->
                <div class="tab-pane pull-x fade fade-left show active" id="so-overview" role="tabpanel">
                    <!-- Activity -->
                    <div class="block">
                        <div class="block-header block-header-default">
                            <span class="icon-left-margin"><i class="feather icon-activity"></i></span>
                            <h3 class="block-title">{{__('pages.r_activity')}}</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                    <i class="feather icon-refresh-ccw"></i>
                                </button>
                                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                            </div>
                        </div>
                        <div class="block-content">
                            <!-- Activity List -->
                            <ul class="nav-items mb-0">
                                <?php $i = 0; ?>
                                @foreach (Auth::user()->notifications as $notification)
                                    @if($notification->type == 'App\Notifications\RecentActivity')
                                    <?php $i++;
                                        $notification->markAsRead(); ?>
                                    <li>
                                        <a class="text-dark media py-2" href="{{$notification->data['url']}}">
                                            <div class="mr-3 ml-2">
                                                <i class="feather {{$notification->data['icon']}} {{$notification->data['color']}}"></i>
                                            </div>
                                            <div class="media-body">
                                                <div class="font-size-sm font-w600">
                                                    {{$notification->data['msg']}}
                                                </div>
                                                <div class="{{$notification->data['color']}}">{{$notification->data['target']}}</div>
                                                <small class="font-size-sm text-muted">{{(new Carbon\Carbon($notification->created_at))->diffForHumans()}}</small>
                                            </div>
                                        </a>
                                    </li>
                                    @endif
                                @endforeach
                                    @if ($i == 0)
                                    <li>
                                        <a class="text-dark media py-2" href="#">
                                            <div class="mr-3 ml-2">
                                                <i class="feather icon-x "></i>
                                            </div>
                                            <div class="media-body">
                                                <div class="font-size-sm font-w600">
                                                    {{__('pages.noactivity')}}
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    @endif
                            </ul>
                            <!-- END Activity List -->
                        </div>
                    </div>
                    <!-- END Activity -->

                    <!-- Quick Settings -->
                    <div class="block mb-0">
                        <div class="block-header block-header-default">
                            <span class="icon-left-margin"><i class="feather icon-sliders"></i></span>
                            <h3 class="block-title">{{__('pages.q_settings')}}</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                            </div>
                        </div>
                        <div class="block-content">
                            <!-- Quick Settings Form -->
                            <form action="" method="POST" onsubmit="return false;">
                                <div class="form-group">
                                    <p class="font-size-sm font-w600 mb-1">
                                        Application Alerts
                                    </p>
                                    <div class="custom-control custom-switch mb-1">
                                        <input type="checkbox" class="custom-control-input" id="so-settings-check3" name="so-settings-check3" checked>
                                        <label class="custom-control-label" for="so-settings-check3">Email Notifications</label>
                                    </div>
                                </div>
                            </form>
                            <!-- END Quick Settings Form -->
                        </div>
                    </div>
                    <!-- END Quick Settings -->
                </div>
                <!-- END Overview Tab -->
            </div>
        </div>
        <!-- END Side Overlay Tabs -->
    </div>
    <!-- END Side Content -->
</aside>