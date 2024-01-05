<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Perpustakaan</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets/js/config.js') }}"></script>
</head>

<body>

    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="/" class="app-brand-link">

                        <span class="app-brand-text menu-text fw-bolder ms-2">Power Library</span>
                    </a>

                    <a href="javascript:void(0);"
                        class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">Pages</span>
                </li>
                <ul class="menu-inner py-1">

                    @if (Auth::user())
                        <!-- Dashboard -->
                        @if (Auth::user()->role_id == 1)
                            <!-- ... (previous code) -->

                            <li class="menu-item @if (request()->route()->uri() == 'dashboard') active @endif">
                                <a href="/dashboard" class="menu-link ">
                                    <i class="menu-icon tf-icons bx bx-bar-chart-alt-2"></i>
                                    <div data-i18n="Analytics" class="">Dashboard</div>
                                </a>
                            </li>

                            <li class="menu-item @if (request()->route()->uri() == 'books') active @endif">
                                <a href="/books" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-book"></i>
                                    <div data-i18n="Analytics" class="">Books</div>
                                </a>
                            </li>

                            <li class="menu-item @if (request()->route()->uri() == 'categories' ||
                                    request()->route()->uri() == 'add-category' ||
                                    request()->route()->uri() == 'category-deleted' ||
                                    request()->route()->uri() == 'category-edit/{slug}' ||
                                    request()->route()->uri() == 'category-delete/{slug}') active @endif">
                                <a href="/categories" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-category"></i>
                                    <div data-i18n="Analytics">Categories</div>
                                </a>
                            </li>

                            <li class="menu-item @if (request()->route()->uri() == 'users') active @endif">
                                <a href="/users" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-user"></i>
                                    <div data-i18n="Analytics">Users</div>
                                </a>
                            </li>

                            <li class="menu-item @if (request()->route()->uri() == 'rent-logs') active @endif">
                                <a href="/rent-logs" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-receipt"></i>
                                    <div data-i18n="Analytics">Rent Log</div>
                                </a>
                            </li>

                            <li class="menu-item @if (request()->route()->uri() == '/') active @endif">
                                <a href="/" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-list-ul"></i>
                                    <div data-i18n="Analytics">Book List</div>
                                </a>
                            </li>

                            <li class="menu-item @if (request()->route()->uri() == 'book-rent') active @endif">
                                <a href="/book-rent" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-book-reader"></i>
                                    <div data-i18n="Analytics">Book Rent</div>
                                </a>
                            </li>

                            <li class="menu-item @if (request()->route()->uri() == 'book-return-form') active @endif">
                                <a href="/book-return-form" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-log-out"></i>
                                    <div data-i18n="Analytics">Return Book</div>
                                </a>
                            </li>
                            <li class="menu-item ">
                                <a href="/logout" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-log-out"></i>
                                    <div data-i18n="Analytics">Log Out</div>
                                </a>
                            </li>
                        @else
                            <li class="menu-item @if (request()->route()->uri() == 'profile') active @endif">
                                <a href="/profile" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-user"></i>
                                    <div data-i18n="Analytics">Profile</div>
                                </a>
                            </li>

                            <li class="menu-item @if (request()->route()->uri() == '/') active @endif">
                                <a href="/" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-list-ul"></i>
                                    <div data-i18n="Analytics">Book List</div>
                                </a>
                            </li>


                            <li class="menu-item ">
                                <a href="/logout" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-log-out"></i>
                                    <div data-i18n="Analytics">Log Out</div>
                                </a>
                            </li>
                        @endif
                    @else
                        <li class="menu-item ">
                            <a href="/login" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                                <div data-i18n="Analytics">Log In</div>
                            </a>
                        </li>


                    @endif




                    <!-- Layouts -->
                    {{-- <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                      <i class="menu-icon tf-icons bx bx-layout"></i>
                      <div data-i18n="Layouts">Categories</div>
                    </a>
                    
      
                    <ul class="menu-sub">
                      <li class="menu-item">
                        <a href="layouts-without-menu.html" class="menu-link">
                          <div data-i18n="Without menu">Users</div>
                        </a>
                      </li>
                      <li class="menu-item">
                        <a href="layouts-without-navbar.html" class="menu-link">
                          <div data-i18n="Without navbar">Profile</div>
                        </a>
                      </li>
                      <li class="menu-item">
                        <a href="layouts-container.html" class="menu-link">
                          <div data-i18n="Container">Container</div>
                        </a>
                      </li>
                      <li class="menu-item">
                        <a href="layouts-fluid.html" class="menu-link">
                          <div data-i18n="Fluid">Fluid</div>
                        </a>
                      </li>
                      <li class="menu-item">
                        <a href="layouts-blank.html" class="menu-link">
                          <div data-i18n="Blank">Blank</div>
                        </a>
                      </li>
                    </ul> --}}
                    </li>



                </ul>
            </aside>

            <div class="layout-page">
                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <!-- Search -->
                        @yield('search')
                        <!-- /Search -->

                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- Place this tag where you want the button to render. -->
                            

                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="../assets/img/avatars/1.png" alt
                                            class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="../assets/img/avatars/1.png" alt
                                                            class="w-px-40 h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block">
                                                    @if ( Auth::user()->username == null ) 
                                                        Guest Account
                                                    @else
                                                    {{ Str::ucfirst(Auth::user()->username) }}
                                                    @endif
                                                    </span>
                                                    <small class="text-muted">
                                                        @if ( Auth::user()->role_id == 1)
                                                            Admin
                                                        @elseif ( Auth::user()->role_id == 2)
                                                            User
                                                        @else
                                                            Guest
                                                        @endif
                                                    </small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/profile">
                                            <i class="bx bx-user me-2"></i>
                                            <span class="align-middle">My Profile</span>
                                        </a>
                                    </li>
            
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/logout">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">Log Out</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>

                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.inputbox').select2();
        });
    </script>



</body>

</html>
