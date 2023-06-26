@include('admin.header')
@include('admin.top-bar')
<html>
<body class="crm_body_bg">
<nav class="sidebar">
    <div class="logo d-flex justify-content-between">
    <a class="large_logo" href="#"><img src="{{ url('/public/img/letsride.png') }}" alt=""></a>
    <a class="small_logo"  href="#"><img src="{{ url('/public/img/letsride.png') }}" alt=""></a>
    <div class="sidebar_close_icon d-lg-none">
    <i class="ti-close"></i>
    </div>
    </div>
    <ul id="sidebar_menu">


    <li class="">
        <a class="has-arrow" href="#" aria-expanded="false">
        <div class="nav_icon_small">
        <img src="{{ url('/img/menu-icon/1.svg') }}" alt="">
        </div>
        <div class="nav_title">
        <span>User Management </span>
        </div>
        </a>
        <ul>
        <li><a href="{{ route('view-customer') }}">View User</a></li>
        </ul>
        </li>

        <li class="">
            <a class="has-arrow" href="#" aria-expanded="false">
            <div class="nav_icon_small">
            <img src="{{ url('/img/menu-icon/1.svg') }}" alt="">
            </div>
            <div class="nav_title">
            <span>Buses Management </span>
            </div>
            </a>
            <ul>
            <li><a href="{{ route('add-buses-management') }}">Add Buses</a></li>
            <li><a href="{{ route('buses-management') }}">View Buses</a></li>
            </ul>
            </li>

        <li class="">
            <a class="has-arrow" href="#" aria-expanded="false">
            <div class="nav_icon_small">
            <img src="{{ url('/img/menu-icon/1.svg') }}" alt="">
            </div>
            <div class="nav_title">
            <span>Driver Management </span>
            </div>
            </a>
            <ul>
            <li><a href="{{ route('add-driver') }}">Add Driver</a></li>
            <li><a href="{{ route('view-driver') }}">View Driver</a></li>
            </ul>
            </li>

        <li class="">
            <a class="has-arrow" href="#" aria-expanded="false">
            <div class="nav_icon_small">
            <img src="{{ url('/img/menu-icon/1.svg') }}" alt="">
            </div>
            <div class="nav_title">
            <span>Booking Details </span>
            </div>
            </a>
            <ul>
            <li><a href="{{ route('add-bookings') }}">Add Bookings</a></li>
            <li><a href="{{ route('view-bookings') }}">View Bookings</a></li>
            <li><a href="{{ route('view-passenger-details') }}">View Passengers</a></li>
            </ul>
            </li>

        <li class="">
            <a class="has-arrow" href="#" aria-expanded="false">
            <div class="nav_icon_small">
            <img src="{{ url('/img/menu-icon/1.svg') }}" alt="">
            </div>
            <div class="nav_title">
            <span>Bus Routes</span>
            </div>
            </a>
            <ul>
            <li><a href="{{ route('add-routes') }}">Add Routes</a></li>
            <li><a href="{{ route('view-routes') }}">View Routes</a></li>
            </ul>
            </li>

            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                <img src="{{ url('/img/menu-icon/1.svg') }}" alt="">
                </div>
                <div class="nav_title">
                <span>Bus Stops</span>
                </div>
                </a>
                <ul>
                <li><a href="{{ route('add-stops') }}">Add Stops</a></li>
                <li><a href="{{ route('view-stops') }}">View Stops</a></li>
                </ul>
                </li>

                <li class="">
                    <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="nav_icon_small">
                    <img src="{{ url('/img/menu-icon/1.svg') }}" alt="">
                    </div>
                    <div class="nav_title">
                    <span>Bus Link to Route</span>
                    </div>
                    </a>
                    <ul>
                    <li><a href="{{ route('buss-link-to-route') }}">Add bus link to route</a></li>
                    <li><a href="{{ route('view-buss-link-to-route') }}">View bus link to route</a></li>
                    </ul>
                    </li>



            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                <img src="{{ url('/img/menu-icon/1.svg') }}" alt="">
                </div>
                <div class="nav_title">
                <span>Coupons</span>
                </div>
                </a>
                <ul>
                <li><a href="{{ route('add-coupons') }}">Add Coupons</a></li>
                <li><a href="{{ route('view-coupons') }}">View Coupons</a></li>
                </ul>
                </li>

                <li class="">
                    <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="nav_icon_small">
                    <img src="{{ url('/img/menu-icon/1.svg') }}" alt="">
                    </div>
                    <div class="nav_title">
                    <span>Busses Seats</span>
                    </div>
                    </a>
                    <ul>
                    <li><a href="{{ route('add-seats') }}">Add Seats</a></li>
                    <li><a href="{{ route('view-seats') }}">View Seats</a></li>
                    </ul>
                    </li>

                <li class="">
                    <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="nav_icon_small">
                    <img src="{{ url('/img/menu-icon/1.svg') }}" alt="">
                    </div>
                    <div class="nav_title">
                    <span>Bus Travel History</span>
                    </div>
                    </a>
                    <ul>
                    {{-- <li><a href="{{ route('add-routes') }}">Add</a></li> --}}
                    <li><a href="{{ route('buses-travel-history') }}">View bus travel history</a></li>
                    </ul>
                    </li>

                    <li class="">
                        <a class="has-arrow" href="#" aria-expanded="false">
                        <div class="nav_icon_small">
                        <img src="{{ url('/img/menu-icon/1.svg') }}" alt="">
                        </div>
                        <div class="nav_title">
                        <span>Subscription Details</span>
                        </div>
                        </a>
                        <ul>
                        <li><a href="{{ route('subscription-details') }}">Subscription Details</a></li>
                        </ul>
                        </li>

                        <li class="">
                            <a class="has-arrow" href="#" aria-expanded="false">
                            <div class="nav_icon_small">
                            <img src="{{ url('/img/menu-icon/1.svg') }}" alt="">
                            </div>
                            <div class="nav_title">
                            <span>Electronic Payment Details</span>
                            </div>
                            </a>
                            <ul>
                            <li><a href="{{ route('e-payment-system') }}">E Payments system</a></li>
                            </ul>
                            </li>
    </ul>
    </nav>

    <div id="back-top" style="display: none;">
        <a title="Go to Top" href="#">
        <i class="ti-angle-up"></i>
        </a>
        </div>

        <script src="{{ asset('/public/js/jquery1-3.4.1.min.js')}}"></script>

        <script src="{{ asset('/public/js/popper1.min.js')}}"></script>

        <script src="{{ asset('/public/js/bootstrap1.min.js')}}"></script>

        <script src="{{ asset('/public/js/metisMenu.js')}}"></script>

        <script src="{{ asset('/public/vendors/count_up/jquery.waypoints.min.js') }}"></script>

        <script src="{{ asset('/public/vendors/chartlist/Chart.min.js') }}"></script>

        <script src="{{ asset('/public/vendors/count_up/jquery.counterup.min.js') }}"></script>

        <script src="{{ asset('/public/vendors/niceselect/js/jquery.nice-select.min.js') }}"></script>

        <script src="{{ asset('/public/vendors/owl_carousel/js/owl.carousel.min.js') }}"></script>

        <script src="{{ asset('/public/vendors/datatable/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('/public/vendors/datatable/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('/public/vendors/datatable/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('/public/vendors/datatable/js/buttons.flash.min.js') }}"></script>
        <script src="{{ asset('/public/vendors/datatable/js/jszip.min.js') }}"></script>
        <script src="{{ asset('/public/vendors/datatable/js/pdfmake.min.js') }}"></script>
        <script src="{{ asset('/public/vendors/datatable/js/vfs_fonts.js') }}"></script>
        <script src="{{ asset('/public/vendors/datatable/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('/public/vendors/datatable/js/buttons.print.min.js') }}"></script>

        <script src="{{ asset('/public/vendors/datepicker/datepicker.js') }}"></script>
        <script src="{{ asset('/public/vendors/datepicker/datepicker.en.js') }}"></script>
        <script src="{{ asset('/public/vendors/datepicker/datepicker.custom.js') }}"></script>
        <script src="{{ asset('/public/js/chart.min.js') }}"></script>
        <script src="{{ asset('/public/vendors/chartjs/roundedBar.min.js') }}"></script>

        <script src="{{ asset('/public/vendors/progressbar/jquery.barfiller.js') }}"></script>

        <script src="{{ asset('/public/vendors/tagsinput/tagsinput.js') }}"></script>

        <script src="{{ asset('/public/vendors/text_editor/summernote-bs4.js') }}"></script>
        <script src="{{ asset('/public/vendors/am_chart/amcharts.js') }}"></script>

        <script src="{{ asset('/public/vendors/scroll/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('/public/vendors/scroll/scrollable-custom.js') }}"></script>

        <script src="{{ asset('/public/vendors/vectormap-home/vectormap-2.0.2.min.js') }}"></script>
        <script src="{{ asset('/public/vendors/vectormap-home/vectormap-world-mill-en.js') }}"></script>

        <script src="{{ asset('/public/vendors/apex_chart/apex-chart2.js') }}"></script>
        <script src="{{ asset('/public/vendors/apex_chart/apex_dashboard.js') }}"></script>

        <script src="{{ asset('/public/vendors/chart_am/core.js') }}"></script>
        <script src="{{ asset('/public/vendors/chart_am/charts.js') }}"></script>
        <script src="{{ asset('/public/vendors/chart_am/animated.js') }}"></script>
        <script src="{{ asset('/public/vendors/chart_am/kelly.js') }}"></script>
        <script src="{{ asset('/public/vendors/chart_am/chart-custom.js') }}"></script>

        <script src="{{ asset('/public/js/dashboard_init.js') }}"></script>
        <script src="{{ asset('/public/js/custom.js') }}"></script>

@include('admin.footer')
</body>



</html>
