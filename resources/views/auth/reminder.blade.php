@include('layouts.header')

<div id="page-container">

    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="hero-static d-flex align-items-center">
            <div class="w-100">
                <!-- Reminder Section -->
                <div class="bg-white">
                    <div class="content content-full">
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-lg-6 col-xl-4 py-4">
                                <!-- Header -->
                                <div class="text-center">
                                    <p class="mb-2">
                                        <i class="fa fa-2x fa-infinity text-primary"></i>
                                    </p>
                                    <h1 class="h4 mb-1">
                                        Password Reminder
                                    </h1>
                                    <h2 class="h6 font-w400 text-muted mb-3">
                                        Please provide your account’s email and we will send you your password.
                                    </h2>
                                </div>

                                <form class="js-validation-reminder" action="be_pages_auth_all.html" method="POST">
                                    <div class="form-group py-3">
                                        <input type="text" class="form-control form-control-lg form-control-alt" id="reminder-credential" name="reminder-credential" placeholder="Username or Email">
                                    </div>
                                    <div class="form-group row justify-content-center">
                                        <div class="col-md-6 col-xl-5">
                                            <button type="submit" class="btn btn-block btn-primary">
                                                <i class="fa fa-fw fa-envelope mr-1"></i> Send Mail
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <!-- END Reminder Form -->

                                <div class="text-center">
                                    <a class="font-size-sm font-w500" href="/login">Back to login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Reminder Section -->

                <!-- Footer -->
                <div class="font-size-sm text-center text-muted py-3">
                    <strong>Outsoureclink</strong> &copy; <span data-toggle="year-copy">2021</span>
                </div>
                <!-- END Footer -->
            </div>
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
</div>
<!-- END Page Container -->


<script src="assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>

<!-- Page JS Code -->
<script src="assets/js/pages/auth_reminder.min.js"></script>
</body>
</html>