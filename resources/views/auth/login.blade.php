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
                                    <h1 class="h3 mb-1">
                                        {{__('auth.signin')}}
                                    </h1>
                                </div>
                                <div class="py-3">
                                    <div class="alert alert-info d-flex align-items-center text-center" role="info">
                                        <div class="flex-00-auto">
                                            <i class="fa fa-fw fa-times"></i>
                                        </div>
                                        <div class="flex-fill ml-3">
                                            <p class="mb-0">This is the test version of the application.<br/> Login using following credentials:</p>
                                            <p class="mb-0">Admin: demo@gmail.com | password: 123456</p>
                                            <p class="mb-0">User: user@gmail.com | password: 123456</p>
                                        </div>
                                    </div>
                                </div> 
                                @include('misc.alert')
                                <!-- END Header -->

                                <!-- Sign In Form -->

                                <form class="js-validation" action="{{route('auth.logging')}}" method="POST" novalidate="novalidate">
                                    @csrf
                                    <div class="py-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-lg form-control-alt" id="email" name="email" placeholder="E-mail">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-lg form-control-alt" id="password" name="password" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="d-md-flex align-items-md-center justify-content-md-between">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="login-remember" name="login-remember">
                                                    <label class="custom-control-label font-w400" for="login-remember">{{__('auth.remember_me')}}</label>
                                                </div>
                                                <div class="py-2">
                                                    <a class="font-size-sm font-w500" href="/auth/reminder">{{__('auth.forgot_passwd')}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row justify-content-center mb-0">
                                        <div class="col-md-6 col-xl-5">
                                            <button type="submit" class="btn btn-block btn-primary">
                                                <i class="fa fa-fw fa-sign-in-alt mr-1"></i> {{__('auth.signin')}}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <!-- END Sign In Form -->
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
<script src="{{ asset('assets/js/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery-validation/additional-methods.js')}}"></script>

<!-- Page JS Code -->
<script src="{{ asset('assets/js/pages/auth_signin.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/forms_validation.js') }}"></script>

</body>
</html>
@endsection