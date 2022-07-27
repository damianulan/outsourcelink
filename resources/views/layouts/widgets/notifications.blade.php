<div class="dropdown d-inline-block ml-2">
    <button type="button" class="btn btn-sm btn-dual" id="page-header-notifications-dropdown" data-animation-class="swing" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="js-animation-object">
            <i class="fa fa-fw fa-bell"></i>
        </span>
        @if (!(Auth::user()->unreadNotifications->isEmpty()))
            <span class="text-primary">•</span>
        @endif
    </button>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0 border-0 font-size-sm" aria-labelledby="page-header-notifications-dropdown">
        <div class="p-2 bg-primary-dark text-center rounded-top">
            <h5 class="dropdown-header text-uppercase text-white">{{__('pages.notifications')}}</h5>
        </div>
        <ul class="nav-items mb-0">
            <?php $processed = 0;?>
            @foreach (Auth::user()->notifications as $notification)
                @if ($notification->type != "App\Notifications\RecentActivity")         
                    <li>
                        <a class="text-dark media py-2" href="javascript:void(0)">
                            <div class="mr-2 ml-3">
                                <i class="fa fa-fw {{$notification->data['iconStyle']}}"></i>
                            </div>
                            <div class="media-body pr-2">
                                <div class="font-w600">{{$notification->data['message']}}</div>
                                <span class="font-w500 text-muted">{{(new Carbon\Carbon($notification->created_at))->diffForHumans()}}</span>
                            </div>
                        </a>
                    </li>
                    @if (++$processed > 4)
                        <?php break; ?>
                    @endif
                @endif
            @endforeach
        </ul>
        <div class="p-2 border-top">
            <a class="btn btn-sm btn-light btn-block text-center" href="javascript:void(0)">
                <i class="fa fa-fw fa-arrow-down mr-1"></i> Load More..
            </a>
        </div>
    </div>
</div>
