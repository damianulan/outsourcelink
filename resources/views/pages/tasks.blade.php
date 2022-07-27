@extends('layouts.master')

@section('content')
<main id="main-container">
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2 text-center text-sm-left">
                <div class="flex-sm-fill">
                    <h1 class="h3 font-w700 mb-2">
                        <?php echo $title?>
                    </h1>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-stylesheets')

@endsection


@section('page-scripts')
<script src="assets/js/pages/dashboard.min.js"></script>
@endsection