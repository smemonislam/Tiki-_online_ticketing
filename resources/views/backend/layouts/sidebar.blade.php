<div class="app-menu navbar-menu">
    <!-- LOGO -->
    {{-- <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{ route('dashboard') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('assets/images/Logo.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/images/Logo.png') }}" alt="" height="45">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{ route('dashboard') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('assets/images/Logo.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/images/Logo.png') }}" alt="" height="45">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div> --}}

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Dashboard</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">

                            <li class="nav-item">
                                <a href="{{ route('dashboard') }}" class="nav-link" data-key="t-ecommerce"> Dashboard
                                </a>
                            </li>

                        </ul>
                    </div>
                </li> <!-- end Dashboard Menu -->


                


                  
                {{-- <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Product</span></li> --}}
                <li class="nav-item"><a href="{{ route('buses.index') }}" class="nav-link" data-key="t-add">Bus</a></li>
                <li class="nav-item"><a href="{{ route('locations.index') }}" class="nav-link" data-key="t-add">Locations</a></li>
                <li class="nav-item"><a href="{{ route('trips.index') }}" class="nav-link" data-key="t-add">Trips</a></li>
                <li class="nav-item"><a href="{{ route('seat-allocations.index') }}" class="nav-link" data-key="t-add">Tikets</a></li>


            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>