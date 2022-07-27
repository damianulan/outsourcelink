            </main>
            <!-- Footer -->
            <footer id="page-footer" class="bg-body-light">
                <div class="content py-3">
                    <div class="row font-size-sm">
                        <div class="py-1 text-center text-sm-left">
                            <a class="font-w600" href="#" target="_blank">{{ config('app.name') }}</a> &copy; <span data-toggle="year-copy">{{ config('app.year') }}</span>
                        </div>
                        <div class="py-1 text-center text-sm-right">
                            <i class="feather icon-git-branch"></i><a class="font-w600" href="https://bitbucket.org/ulandamian/outsourclink/"> BitBucket</a>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- Plugins -->
        <script src="{{ asset('assets/js/template.core.min.js')}}"></script>
        <script src="{{ asset('assets/js/template.app.min.js')}}"></script>
        <script src="{{ asset('assets/js/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
        <script src="{{ asset('assets/js/plugins/chart.js/Chart.bundle.min.js')}}"></script>
        <script src="{{ asset('assets/js/pages/ui_animations.min.js')}}"></script>

        @yield('page-scripts')

        <!-- Page JS Helpers (jQuery Sparkline Plugins) -->
        <script>jQuery(function () { One.helpers(['sparkline']); });</script>

    </body>
</html>
