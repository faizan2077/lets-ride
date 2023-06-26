<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
            <a class="navbar-brand brand-logo" href="{{ url('/manage-admin/view-customer') }}"><img class="ml-5 p-1"
                    style="height: 70px; width:70px"src="{{ asset('/images/logo@2x.png') }}" alt="logo" /></a>
            <a class="navbar-brand brand-logo-mini" href="{{ url('/manage-admin/view-customer') }}"><img
                    src="{{ asset('/images/logo.png') }}" alt="logo" /></a>
        </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-2">


        </ul>
        <ul class="navbar-nav navbar-nav-right">


            <li class="nav-item nav-profile dropdown">
                <a class="nav-link" href="#" data-toggle="dropdown" id="profileDropdown">
                    <span class="nav-profile-name">{{ Auth::user()->name }}</span>

                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                    <a class="dropdown-item">
                        <i class="typcn typcn-cog-outline text-primary"></i>
                        Settings
                    </a>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" onClick="toogleSideBar()"
            type="button" data-toggle="offcanvas">
            <span class="typcn typcn-th-menu"></span>
        </button>
    </div>
</nav>
