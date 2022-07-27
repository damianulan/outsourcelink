@extends('layouts.master')
@section('page-stylesheets')
<link rel="stylesheet" href="{{ asset('assets/js/plugins/flatpickr/flatpickr.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/js/plugins/select2/css/select2.min.css')}}">
@endsection
@section('content')
<main id="main-container">
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2 text-center text-sm-left">
                <div class="flex-sm-fill">
                    <h1 class="h3 font-w700 mb-2">
                        <?php echo $title?>
                    </h1>
                        <h2 class="h6 font-w500 text-muted mb-0">
                            {{ __('messages.welcome', ['name' => Auth::user()->firstname]) }}
                        </h2>                        
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="row row-deck">
            <div class="col-sm-6 col-xl-3">
                <div class="block block-rounded d-flex flex-column" >
                    <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                        <dl class="mb-0">
                            <dt class="font-size-h2 font-w700">{{ $candidatesNum }} total</dt>
                            <dd class="mb-0 text-muted">+{{ $candidatesInMonth }} {{__('systemValues.inthismonth')}}</dd>
                        </dl>
                        <div class="item item-rounded bg-body">
                            <i class="feather icon-user font-size-h3 text-primary"></i>
                        </div>
                    </div>
                    <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                        <a class="font-w500 d-flex align-items-center" href="{{route('candidates.index')}}">
                            View all candidates
                            <i class="fa fa-arrow-alt-circle-right ml-1 opacity-25 font-size-base"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="block block-rounded d-flex flex-column">
                    <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                        <dl class="mb-0">
                            <dt class="font-size-h2 font-w700">{{ $employeesNum }} {{__('systemValues.active')}}</dt>
                            <dd class="mb-0 text-muted">+{{ $employeesInMonth }} {{__('systemValues.inthismonth')}}</dd>
                        </dl>
                        <div class="item item-rounded bg-body">
                            <i class="feather icon-users font-size-h3 text-primary"></i>
                        </div>
                    </div>
                    <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                        <a class="font-w500 d-flex align-items-center" href="{{route('employees.index')}}">
                            View all employees
                            <i class="fa fa-arrow-alt-circle-right ml-1 opacity-25 font-size-base"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="block block-rounded d-flex flex-column">
                    <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                        <dl class="mb-0">
                            <dt class="font-size-h2 font-w700">+5,5%</dt>
                            <dd class="mb-0 text-muted">{{__('pages.employment')}}</dd>
                        </dl>
                        <div class="item item-rounded bg-body">
                            <i class="feather icon-trending-up font-size-h3 text-primary"></i>
                        </div>
                    </div>
                    <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                        <a class="font-w500 d-flex align-items-center" href="{{route('candidates.index')}}">
                            View report
                            <i class="fa fa-arrow-alt-circle-right ml-1 opacity-25 font-size-base"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="block block-rounded d-flex flex-column">
                    <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                        <dl class="mb-0">
                            <dt class="font-size-h2 font-w700">1  {{__('systemValues.active')}}</dt>
                            <dd class="mb-0 text-muted">+2  {{__('systemValues.inthismonth')}}</dd>
                        </dl>
                        <div class="item item-rounded bg-body">
                            <i class="feather icon-box font-size-h3 text-primary"></i>
                        </div>
                    </div>
                    <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                        <a class="font-w500 d-flex align-items-center" href="#">
                            View all projects
                            <i class="fa fa-arrow-alt-circle-right ml-1 opacity-25 font-size-base"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="block block-rounded d-flex flex-column" style="max-height: 20rem; overflow-x: hidden;">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">{{__('pages.tasks')}}</h3>
                        <div class="block-options">
                                <button type="button" class="btn-block-option" data-toggle="modal" data-target="#modal-add-task">
                                    <i class="feather icon-plus"></i>
                                </button>
                            <a href="{{route('tasks.index')}}">
                            <button type="button" class="btn-block-option">
                                <i class="feather icon-shuffle"></i>
                            </button></a>
                        </div>
                    </div>
                    <div class="block-content">
                        @if (!($tasks->isEmpty()))
                            @foreach ($tasks as $task)
                                <?php $taskUser = ""; ?>
                                @foreach ($users as $user)
                                    @if ($user->id == $task->added_by)
                                        <?php $taskUser = $user->firstname . ' ' . $user->surname; ?>
                                    @endif
                                @endforeach
                                <a class="block block-rounded bg-gray-light" href="{{ route('tasks.index') }}">
                                    <div class="block-content">
                                        <p class="m-0 text-wrap-break-word"><strong>{{$task->title}}</strong></p>
                                        <p class="text-muted"><i class="feather icon-calendar"></i>
                                        <span class="text-sm"><em>{{(new Carbon\Carbon($task->due_date))->diffForHumans()}}</em>
                                        </span><span class="text-spacer text-sm"><em>{{ $taskUser }}</em></span></p>
                                    </div>
                                </a>
                            @endforeach
                        @else
                            <p class="text-center text-muted">There's nothing to do here..</p>
                        @endif

                    </div>
                </div>
            </div>    
            <div class="col-lg-8">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Recently added candidates</h3>
                    </div>
                    <div class="block-content">
                        <table id="candidateTable" class="table table-bordered table-striped table-vcenter js-dataTable-buttons js-table-checkable js-table-checkable-enabled">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 50px;">ID</th>
                                    <th>{{ __('person.fullname') }}</th>
                                    <th class="d-none d-sm-table-cell" style="width: auto;">{{ __('person.birthdate') }}</th>
                                    <th class="d-none d-sm-table-cell" style="width: auto;">{{ __('person.nationality') }}</th>
                                    <th class="d-none d-sm-table-cell" style="width: auto;">{{ __('person.status') }}</th>
                                    <th style="width: 5%;">{{ __('person.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $lp = 0; ?>
                                @foreach ( $candidates as $candidate )
                                <?php $lp++; ?>
                                <tr>
                                    <!-- Proprietary -->
                                    <td class="text-center font-size-sm"><a href="{{ route('candidates.edit', $candidate->id) }}">{{ $candidate->id }}</a></td>
                                    <!-- end proprietary-->
                                    <td class="font-w600 font-size-sm">
                                        <a href="{{ route('candidates.edit', $candidate->id) }}">{{ $candidate->firstname . ' ' . $candidate->surname }}</a>
                                    </td>
                                    <td class="d-none d-sm-table-cell font-size-sm">
                                        {{$candidate->birthdate}}
                                    </td>

                                    <td class="d-none d-sm-table-cell font-size-sm">
                                        @foreach ($nations as $nation)
                                            @if ($nation->id == $candidate->nations_id)
                                                {{ $nation->name }}
                                            @endif
                                        @endforeach                            </td>
                                    <td class="d-none d-sm-table-cell font-size-sm">
                                        @foreach ($statuses as $status)
                                            @if ($status->id == $candidate->status_id)
                                                {{$status->name }}
                                            @endif
                                        @endforeach                             
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('candidates.edit', $candidate->id) }}"><button type="button" class="btn btn-sm btn-light js-tooltip-enabled" data-toggle="tooltip" title="edit_candidate" data-original-title="Edit Client">
                                                <i class="fa fa-fw fa-pencil-alt"></i>
                                            </button></a>
                                            <form method="post" action="{{route('candidates.destroy', $candidate->id)}}">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-light js-tooltip-enabled" data-toggle="tooltip" title="delete_candidate" data-original-title="Remove">
                                                    <i class="fa fa-fw fa-times"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
        
         
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-add-task" tabindex="-1" role="dialog" aria-labelledby="modal-add-task" aria-hidden="true">
        <form class="mb-5" action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="block block-rounded block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Add a task</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content font-size-sm">
                            <div class="row push">
                                <div class="col-lg-12">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label-sm" for="task_title">Title</label>
                                        <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-sm" id="task_title" name="task_title">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label-sm" for="task_content">Description</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control form-control-sm" id="task_content" name="task_content" rows="4" placeholder=""></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label-sm" for="tasks_target">Assign to</label>
                                        <div class="col-sm-8">
                                            <select class="form-control form-control-sm" id="task_target" name="task_target"">
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->firstname . " " . $user->surname }}</option>
                                                @endforeach
                                            </select>                                        
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label-sm" for="task_due">Due date</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="js-flatpickr form-control form-control-sm bg-white" id="task_due" name="task_due" placeholder="{{ __('misc.dmy_format') }}">
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <div class="block-content block-content-full text-right border-top">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        
    </div>
@endsection




@section('page-scripts')
<script src="{{ asset('assets/js/pages/dashboard.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/select2/js/select2.full.min.js') }}"></script>
<script>jQuery(function () { One.helpers(['flatpickr', 'datepicker', 'colorpicker', 'maxlength', 'select2', 'masked-inputs', 'rangeslider']);  });</script>
@endsection