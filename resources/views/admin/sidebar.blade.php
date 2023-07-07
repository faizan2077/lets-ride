<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <span class="material-symbols-outlined">
                    dashboard
                </span>
                <span class="menu-title px-2">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="view-customer" href="{{ route('view-customer') }}">
                <span class="material-symbols-outlined">
                    emoji_people
                </span>
                <span class="menu-title px-2">Rider Details</span>
            </a>
        </li>
        <span class="border"></span>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#bus-management" aria-expanded="false"
                aria-controls="bus-management">
                <span class="material-symbols-outlined">
                    directions_bus
                </span>
                <span class="menu-title px-2">Bus Management</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="bus-management">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('add-buses-management') }}">Add Bus</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('buses-management') }}">View Buses</a></li>
                </ul>
            </div>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#seats" aria-expanded="false" aria-controls="seats">
                <span class="material-symbols-outlined">
                    airline_seat_recline_extra
                </span>
                <span class="menu-title px-2">Bus Seats</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="seats">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('add-seats') }}">Add Seats</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('view-seats') }}">View Seats</a></li>
                </ul>
            </div>
        </li> --}}


        <span class="border"></span>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#stop-management" aria-expanded="false"
                aria-controls="stop-management">
                <span class="material-symbols-outlined">
                    add_location_alt
                </span>
                <span class="menu-title px-2">Stop Management</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="stop-management">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('add-stops') }}">Add Stops</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('view-stops') }}">View Stops </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#route-management" aria-expanded="false"
                aria-controls="route-management">
                <span class="material-symbols-outlined">
                    route
                </span>
                <span class="menu-title px-2">Route Management</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="route-management">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('add-routes') }}">Add Routes</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('view-routes') }}">View Routes</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#link" aria-expanded="false" aria-controls="link">
                <span class="material-symbols-outlined">
                    directions
                </span>
                <span class="menu-title px-2">Bus Links To Route</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="link">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('buss-link-to-route') }}">Add bus link
                            to route </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('view-buss-link-to-route') }}">View bus
                            link to route </a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#driver-management" aria-expanded="false"
                aria-controls="driver-management">

                <span class="material-symbols-outlined">
                    settings_accessibility
                </span>
                <span class="menu-title px-2">Driver Management</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="driver-management">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('add-driver') }}">Add Driver</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('view-driver') }}">View Driver</a></li>
                </ul>
            </div>
        </li>

        <span class="border"></span>


        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                <span class="material-symbols-outlined">
                    history_edu
                </span>
                <span class="menu-title px-2">Booking Details</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('add-bookings') }}">Add Bookings</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('view-bookings') }}">View Bookings</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('view-passenger-details') }}">View
                            Passengers</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#payment" aria-expanded="false"
                aria-controls="payment">
                <span class="material-symbols-outlined">
                    payments
                </span>
                <span class="menu-title px-2">Payment Details</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="payment">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('e-payment-system') }}">E Payments
                            system</a></li>
                    {{-- <li class="nav-item"> <a class="nav-link" href="{{ route('view-seats') }}">View Seats</a></li> --}}
                </ul>
            </div>
        </li>



        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#coupons" aria-expanded="false"
                aria-controls="coupons">
                <span class="material-symbols-outlined">
                    confirmation_number
                </span>
                <span class="menu-title px-2">Coupons</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="coupons">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('add-coupons') }}">Add Coupons</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('view-coupons') }}">View Coupons </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#safety" aria-expanded="false"
                aria-controls="payment">
                <span class="material-symbols-outlined">
                    health_and_safety
                </span>
                <span class="menu-title px-2">Safety</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="safety">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('add-safety') }}">Add Safety</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('view-safety') }}">View Safety</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#faq" aria-expanded="false" aria-controls="faq">
                <span class="material-symbols-outlined">
                    forum
                </span>
                <span class="menu-title px-2">FAQ's</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="faq">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('add-faq') }}">Add FAQ's </a>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('view-faq') }}">View FAQ</a></li>
        </li>
    </ul>
    </div>
    </li>



    <li class="nav-item">
        <a class="nav-link" href="{{ route('subscription-details') }}">
            <span class="material-symbols-outlined">
                subscriptions
            </span>
            <span class="menu-title px-2">Subscription Details</span>
        </a>
    </li>








    <li class="nav-item">
        <a class="nav-link" href="{{ route('contact-info') }}">
            {{-- <span class="material-symbols-outlined">
                contact
            </span> --}}
            <span class="menu-title px-2">Contact Info</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('contact-us') }}">
            <span class="material-symbols-outlined">
                support
            </span>
            <span class="menu-title px-2">Help</span>
        </a>
    </li>



    </ul>
    <form action="{{ route('logoutadmin') }}" method="post">
        @csrf

        <button class="dropdown-item border rounded-0 shadow-0 text-center py-3" type="submit">
            <i class="typcn typcn-eject-outline text-danger"></i>
            Logout
        </button>
    </form>
</nav>
