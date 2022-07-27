@extends('layouts.master')
@section('page-stylesheets')
<link rel="stylesheet" href="{{ asset('assets/js/plugins/flatpickr/flatpickr.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/js/plugins/select2/css/select2.min.css')}}">
@endsection
@section('content')

<!-- An actual page content -->

@endsection


@section('page-scripts')
<script src="{{ asset('assets/js/plugins/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/select2/js/select2.full.min.js') }}"></script>
@endsection