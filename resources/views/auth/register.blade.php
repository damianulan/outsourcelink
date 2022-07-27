@extends('layouts.auth-master')
@section('content')
    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="hero-static d-flex align-items-center">
            <div class="w-100">
                <!-- Sign In Section -->
                <div class="bg-white">
                    <div class="content content-full">
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-lg-6 col-xl-4 py-4">
                                <!-- Header -->
                                <div class="text-center">
                                    <p class="mb-2">
                                        <i class="fa fa-2x fa-infinity text-primary"></i>
                                    </p>
                                    <h1 class="h4  mb-1">
                                        {{__('auth.create_account')}}
                                    </h1>
                                    <h2 class="h6 font-w400 text-muted mb-3">
                                        {{__('auth.create_hello')}}
                                    </h2>
                                </div>
                                <!-- END Header -->

                                <!-- Sign Up Form -->
                                <form class="js-validation" action="{{ route('auth.registration') }}" method="POST" novalidate="novalidate">
                                    @csrf
                                    <div class="py-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-lg form-control-alt" id="firstname" name="firstname" placeholder="First name">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-lg form-control-alt" id="surname" name="surname" placeholder="Surname">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-lg form-control-alt" id="email" name="email" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-lg form-control-alt" id="password" name="password" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-lg form-control-alt" id="password-confirm" name="password-confirm" placeholder="Confirm Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="d-md-flex align-items-md-center justify-content-md-between">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="signup-terms" name="signup-terms">
                                                    <label class="custom-control-label font-w400" for="signup-terms">I agree to Terms &amp; Conditions</label>
                                                </div>
                                                <div class="py-2">
                                                    <a class="font-size-sm font-w500" href="javascript:void(0)" data-toggle="modal" data-target="#one-signup-terms">View Terms</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row justify-content-center mb-0">
                                        <div class="col-md-6 col-xl-5">
                                            <button type="submit" class="btn btn-block btn-success">
                                                <i class="fa fa-fw fa-plus mr-1"></i> {{__('auth.signup')}}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <!-- END Sign Up Form -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Sign In Section -->

                <!-- Footer -->
                <div class="font-size-sm text-center text-muted py-3">
                    <strong>{{ config('app.name')}}</strong> &copy; <span data-toggle="year-copy">{{ config('app.year')}}</span>
                </div>
                <!-- END Footer -->
            </div>
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->

    <script src="{{ asset('assets/js/template.core.min.js')}}"></script>
    <script src="{{ asset('assets/js/template.app.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>

<!-- Page JS Code -->
<script src="{{ asset('assets/js/pages/auth_reminder.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/forms_validation.js') }}"></script>

</body>
</html>
@endsection