@extends('layouts.master')
@section('page-stylesheets')

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
@include('pages.settings.system.navbar')
<div class="block block-rounded d-none d-lg-block">
    <div class="block-content">
        <p class="text-center py-8">
            Left aligned, light themed
        </p>
    </div>
</div>




</div>
@endsection




@section('page-scripts')
<script src="{{ asset('assets/js/pages/dashboard.min.js') }}"></script>
@endsection