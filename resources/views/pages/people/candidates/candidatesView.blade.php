@extends('layouts.master')
@section('page-stylesheets')
<link rel="stylesheet" href="{{asset('assets/js/plugins/datatables/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('assets/js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css')}}">
@endsection
@section('content')
<?php $dataView = Session::get('candidatesDataView'); ?>
<main id="main-container">
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    {{ __('pages.candidates') }} <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted">{{ __('pages.candidates_d_view') }}</small>
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">{{ __('pages.candidates') }}</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="#">{{ __('pages.view') }}</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

    </div>
    <div class="content">
        @include('pages.people.candidates.candidatesNav');
        <!-- Basic -->
        <div class="block block-rounded">
            <div class="block-content block-content-full">
                <table id="candidateTable" class="table table-bordered table-striped table-vcenter js-dataTable-buttons js-table-checkable js-table-checkable-enabled">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 50px;">
                                <div class="custom-control custom-checkbox d-inline-block">
                                    <input type="checkbox" class="custom-control-input" id="table-check-all" name="table-check-all">
                                    <label class="custom-control-label" for="table-check-all"></label>
                                </div>
                            </th>
                            <th class="text-center" style="width: 50px;">ID</th>
                            @if (isset($dataView['fullname']))
                            <th>{{ __('person.fullname') }}</th>
                            @endif
                            @if (isset($dataView['firstname']))
                            <th>{{ __('person.firstname') }}</th>
                            @endif
                            @if (isset($dataView['secondname']) == 'on')
                            <th>{{ __('person.secondname') }}</th>
                            @endif
                            @if (isset($dataView['surname']) == 'on')
                            <th>{{ __('person.surname') }}</th>
                            @endif
                            @if (isset($dataView['f_name']) == 'on')
                            <th>{{ __('person.f_name') }}</th>
                            @endif
                            @if (isset($dataView['m_name']) == 'on')
                            <th>{{ __('person.m_name') }}</th>
                            @endif
                            @if (isset($dataView['sex']) == 'on')
                            <th class="d-none d-sm-table-cell" style="width: auto;">{{ __('person.sex') }}</th>
                            @endif
                            @if (isset($dataView['birthdate']) == 'on')
                            <th class="d-none d-sm-table-cell" style="width: auto;">{{ __('person.birthdate') }}</th>
                            @endif
                            @if (isset($dataView['birthplace']) == 'on')
                            <th class="d-none d-sm-table-cell" style="width: auto;">{{ __('person.birthplace') }}</th>
                            @endif
                            @if (isset($dataView['citizenship']) == 'on')
                            <th class="d-none d-sm-table-cell" style="width: auto;">{{ __('person.citizenship') }}</th>
                            @endif
                            @if (isset($dataView['nationality']) == 'on')
                            <th class="d-none d-sm-table-cell" style="width: auto;">{{ __('person.nationality') }}</th>
                            @endif
                            @if (isset($dataView['notes']) == 'on')
                            <th class="d-none d-sm-table-cell" style="width: auto;">{{ __('person.notes') }}</th>
                            @endif
                            @if (isset($dataView['status']) == 'on')
                            <th class="d-none d-sm-table-cell" style="width: auto;">{{ __('person.status') }}</th>
                            @endif
                            @if (isset($dataView['nin']) == 'on')
                            <th class="d-none d-sm-table-cell" style="width: auto;">{{ __('person.nin') }}</th>
                            @endif
                            @if (isset($dataView['nin2']) == 'on')
                            <th class="d-none d-sm-table-cell" style="width: auto;">{{ __('person.nin2') }}</th>
                            @endif
                            @if (isset($dataView['tin']) == 'on')
                            <th class="d-none d-sm-table-cell" style="width: auto;">{{ __('person.tin') }}</th>
                            @endif
                            @if (isset($dataView['residence_address']) == 'on')
                            <th class="d-none d-sm-table-cell" style="width: auto;">{{ __('person.residence_address') }}</th>
                            @endif
                            @if (isset($dataView['mailing_address']) == 'on')
                            <th class="d-none d-sm-table-cell" style="width: auto;">{{ __('person.mailing_address') }}</th>
                            @endif
                            @if (isset($dataView['contact_numbers']) == 'on')
                            <th class="d-none d-sm-table-cell" style="width: auto;">{{ __('person.contact_numbers') }}</th>
                            @endif
                            @if (isset($dataView['actions']) == 'on')
                            <th style="width: 5%;">{{ __('person.actions') }}</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        <?php $lp = 0; ?>
                        @foreach ( $candidates as $candidate )
                        <?php $lp++; ?>
                        <tr>
                            <!-- Proprietary -->
                            <td class="text-center">
                                <div class="custom-control custom-checkbox d-inline-block">
                                    <input type="checkbox" class="custom-control-input" id="row_{{ $lp }}" name="row_{{ $lp }}">
                                    <label class="custom-control-label" for="row_{{ $lp }}"></label>
                                </div>
                            </td>
                            <td class="text-center font-size-sm"><a href="{{ route('candidates.edit', $candidate->id) }}">{{ $candidate->id }}</a></td>
                            <!-- end proprietary-->
                            @if (isset($dataView['fullname']))
                            <td class="font-w600 font-size-sm">
                                <a href="{{ route('candidates.edit', $candidate->id) }}">{{ $candidate->firstname . ' ' . $candidate->surname }}</a>
                            </td>
                            @endif
                            @if (isset($dataView['firstname']))
                            <td class="font-w600 font-size-sm">
                                {{ $candidate->firstname}}
                            </td>
                            @endif
                            @if (isset($dataView['secondname']))
                            <td class="font-w600 font-size-sm">
                                {{ $candidate->secondname}}
                            </td>
                            @endif
                            @if (isset($dataView['surname']))
                            <td class="font-w600 font-size-sm">
                                {{ $candidate->surname}}
                            </td>
                            @endif
                            @if (isset($dataView['f_name']))
                            <td class="font-w600 font-size-sm">
                                {{ $candidate->f_name}}
                            </td>
                            @endif
                            @if (isset($dataView['m_name']))
                            <td class="font-w600 font-size-sm">
                                {{ $candidate->m_name}}
                            </td>
                            @endif
                            @if (isset($dataView['sex']))
                            <td class="d-none d-sm-table-cell font-size-sm">
                                @if ($candidate->sex == 'm')
                                    Male
                                @elseif ($candidate->sex == 'f')
                                    Female
                                @endif
                            </td>
                            @endif
                            @if (isset($dataView['birthdate']))
                            <td class="d-none d-sm-table-cell font-size-sm">
                                {{$candidate->birthdate}}
                            </td>
                            @endif
                            @if (isset($dataView['birthplace']))
                            <td class="d-none d-sm-table-cell font-size-sm">
                                {{$candidate->birthplace}}
                            </td>
                            @endif
                            @if (isset($dataView['citizenship']))
                            <td class="d-none d-sm-table-cell font-size-sm">
                                @foreach ($citizenships as $citizenship)
                                    @if ($citizenship->id == $candidate->citizenships_id)
                                        {{ $citizenship->name }}
                                    @endif
                                @endforeach
                            </td>
                            @endif
                            @if (isset($dataView['nationality']))
                            <td class="d-none d-sm-table-cell font-size-sm">
                                @foreach ($nations as $nation)
                                    @if ($nation->id == $candidate->nations_id)
                                        {{ $nation->name }}
                                    @endif
                                @endforeach                            </td>
                            @endif
                            @if (isset($dataView['notes']))
                            <td class="d-none d-sm-table-cell font-size-sm">
                                {{$candidate->notes }}
                            </td>
                            @endif
                            @if (isset($dataView['status']))
                                <td class="d-none d-sm-table-cell font-size-sm">
                                    @foreach ($statuses as $status)
                                        @if ($status->id == $candidate->status_id)
                                            {{$status->name }}
                                        @endif
                                    @endforeach                             
                                </td>
                            @endif
                            @if (isset($dataView['nin']))
                            <td class="d-none d-sm-table-cell font-size-sm">
                                {{$candidate->nin }}
                            </td>
                            @endif
                            @if (isset($dataView['nin2']))
                            <td class="d-none d-sm-table-cell font-size-sm">
                                {{$candidate->nin2 }}
                            </td>
                            @endif
                            @if (isset($dataView['tin']))
                            <td class="d-none d-sm-table-cell font-size-sm">
                                {{$candidate->tin }}
                            </td>
                            @endif
                            @if (isset($dataView['residence_address']))
                            <td class="d-none d-sm-table-cell font-size-sm">
                                {{ $candidate->res_country . ', ' . $candidate->res_postal . ' ' . $candidate->res_place . ', ' . $candidate->$res_street . ', ' . $candidate->$res_flat . '.' }}
                            </td>
                            @endif
                            @if (isset($dataView['mailing_address']))
                            <td class="d-none d-sm-table-cell font-size-sm">
                                {{ $candidate->mail_country . ', ' . $candidate->mail_postal . ' ' . $candidate->mail_place . ', ' . $candidate->$mail_street . ', ' . $candidate->$mail_flat . '.' }}
                            </td>
                            @endif
                            @if (isset($dataView['contact_numbers']))
                            <td class="d-none d-sm-table-cell font-size-sm">
                                {{$candidate->phone . ', ' . $candidate->email . ' | ' }} <a href="{{ route('candidates.edit', $candidate->id) }}">More >></a>
                            </td>
                            @endif
                            @if (isset($dataView['actions']))
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
                            @endif
                        </tr>
                        @endforeach

 
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Alternative Style -->

        <!-- END Grid Sizes -->
    </div>
    <div class="modal" id="modal-block-normal" tabindex="-1" role="dialog" aria-labelledby="modal-block-normal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('candidates.requestViews')}}" enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    <div class="block block-rounded block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">View Columns</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content font-size-sm">
                            <table class="js-table-checkable table table-hover table-vcenter">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 70px;">
                                            <div class="custom-control custom-checkbox d-inline-block">
                                                <input type="checkbox" class="custom-control-input" id="check-all" name="check-all">
                                                <label class="custom-control-label" for="check-all"></label>
                                            </div>
                                        </th>
                                        <th>Column name</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($cols as $col)
                                        <tr>
                                            <td class="text-center">
                                                <div class="custom-control custom-checkbox d-inline-block">
                                                    <input type="checkbox" class="custom-control-input" id="{{$col}}" name="{{$col}}" @if($dataView[$col] == 'on'){{'checked'}}@endif>
                                                    <label class="custom-control-label" for="{{$col}}"></label>
                                                </div>
                                            </td>
                                            <td class="font-size-sm">
                                                <p class="font-w600 mb-1">
                                                    <?php $colName = 'person.' . $col; ?>
                                                    {{__($colName)}}
                                                </p>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="block-content block-content-full text-right border-top">
                            <button type="button" class="btn btn-alt-primary mr-1" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" data-wizard="finish">Ok</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection


@section('page-scripts')
<script src="{{asset('assets/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/datatables/buttons/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/datatables/buttons/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/datatables/buttons/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/datatables/buttons/buttons.flash.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/datatables/buttons/buttons.colVis.min.js')}}"></script>

<script src="{{asset('assets/js/pages/datatables.min.js')}}"></script>
@endsection