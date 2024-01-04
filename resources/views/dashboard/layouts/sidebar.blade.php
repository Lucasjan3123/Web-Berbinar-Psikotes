<!-- Sidebar Start -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
        <a href="/" class="text-nowrap logo-img">
            <img src="{{asset('assets/images/logo.png')}}" width="80" style="width: 50px;" alt="" />
        </a>
        <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
        </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
        <ul id="sidebarnav">
            <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
            <a class="sidebar-link" href="./index.html" aria-expanded="false">
                <span>
                <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
            </a>
            </li>
            <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">ADMIN</span>
            </li>
            <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('dashboard.admin.freetest') }}" aria-expanded="false">
                <span>
                <i class="ti ti-cards"></i>
                </span>
                <span class="hide-menu">Free Test</span>
            </a>
            </li>
            <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">MENUS</span>
            </li>
            <li class="sidebar-item">
            <a class="sidebar-link" href="./ui-card.html" aria-expanded="false">
                <span>
                <i class="ti ti-cards"></i>
                </span>
                <span class="hide-menu">Tests</span>
            </a>
            </li>
            <li class="sidebar-item">
            <a class="sidebar-link" href="./ui-forms.html" aria-expanded="false">
                <span>
                <i class="ti ti-file-description"></i>
                </span>
                <span class="hide-menu">Invoices</span>
            </a>
            </li>
            <li class="sidebar-item">
            <a class="sidebar-link" href="./authentication-register.html" aria-expanded="false">
                <span>
                <i class="ti ti-user"></i>
                </span>
                <span class="hide-menu">User Management</span>
            </a>
            </li>
            <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">AUTH</span>
            </li>
            <li class="sidebar-item">
            <a class="sidebar-link" href="./authentication-login.html" aria-expanded="false">
                <span>
                <i class="ti ti-login"></i>
                </span>
                <span class="hide-menu">Logout</span>
            </a>
            </li>
            
        </ul>
        <div class="unlimited-access hide-menu bg-light-primary position-relative mb-7 mt-5 rounded">
            <div class="d-flex">
            <div class="unlimited-access-title me-3">
                <h6 class="fw-semibold fs-4 mb-6 text-dark w-85">Upgrade to pro</h6>
                <a href="https://adminmart.com/product/modernize-bootstrap-5-admin-template/" target="_blank" class="btn btn-primary fs-2 fw-semibold lh-sm">Buy Pro</a>
            </div>
            <div class="unlimited-access-img">
                <img src="{{asset('assets/dashboard/assets/images/backgrounds/rocket.png')}}" alt="" class="img-fluid">
            </div>
            </div>
        </div>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!--  Sidebar End -->