<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="../" />
    <title>Marketplace Katering</title>
    <meta charset="utf-8" />
    <meta name="description"
        content="Axel admin dashboard live demo. Check out all the features of the admin panel. A large number of settings, additional services and widgets." />
    <meta name="keywords"
        content="Axel theme, bootstrap, bootstrap 5, admin themes, free admin themes, bootstrap admin, bootstrap dashboard" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Oswald HTML Free - Bootstrap 5 HTML Multipurpose Admin Dashboard Theme" />
    <meta property="og:url" content="https://keenthemes.com/products/oswald-html-pro" />
    <meta property="og:site_name" content="Keenthemes | Oswald HTML Free" />
    <link rel="canonical" href="https://preview.keenthemes.com/axel-html-free" />
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    <script>
        // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }
    </script>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" data-kt-app-header-stacked="true" data-kt-app-header-primary-enabled="true"
    data-kt-app-header-secondary-enabled="true" data-kt-app-toolbar-enabled="true" class="app-default">
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    <!--end::Theme mode setup on page load-->
    <!--begin::App-->
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!--begin::Page-->
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <!--begin::Header-->
            <div id="kt_app_header" class="app-header">
                <!--begin::Header primary-->
                <div class="app-header-primary" data-kt-sticky="true" data-kt-sticky-name="app-header-primary-sticky"
                    data-kt-sticky-offset="{default: 'false', lg: '300px'}">
                    <!--begin::Header primary container-->
                    <div class="app-container container-xxl d-flex align-items-stretch justify-content-between">
                        <!--begin::Logo and search-->
                        <div class="d-flex flex-grow-1 flex-lg-grow-0">
                            <!--begin::Logo wrapper-->
                            <div class="d-flex align-items-center" id="kt_app_header_logo_wrapper">
                                <!--begin::Header toggle-->
                                <button
                                    class="d-lg-none btn btn-icon btn-color-white btn-active-color-primary ms-n4 me-sm-2"
                                    id="kt_app_header_menu_toggle">
                                    <i class="ki-duotone ki-abstract-14 fs-1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </button>
                                <!--end::Header toggle-->
                                <!--begin::Logo-->
                                <a href="{{ url('/dashboard') }}"
                                    class="d-flex align-items-center mb-1 mb-lg-0 pt-lg-1 text-white text-xl">
                                    <div class="d-block d-sm-none !un-text-2xl">
                                        MK
                                    </div>
                                    <div class="d-none d-sm-block !un-text-2xl">
                                        Marketplace Katering
                                    </div>
                                </a>
                                <!--end::Logo-->
                            </div>
                            <!--end::Logo wrapper-->
                        </div>
                        <!--end::Logo and search-->
                        <!--begin::Navbar-->
                        <div class="app-navbar">
                            <!--begin::User menu-->
                            <div class="app-navbar-item ms-3 me-6" id="kt_header_user_menu_toggle">
                                <!--begin::Menu wrapper-->
                                <div class="cursor-pointer symbol symbol-35px"
                                    data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
                                    data-kt-menu-placement="bottom-end">
                                    <img class="symbol symbol-35px"
                                        src="https://static.vecteezy.com/system/resources/previews/009/292/244/non_2x/default-avatar-icon-of-social-media-user-vector.jpg"
                                        alt="user" />
                                </div>
                                <!--begin::User account menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                                    data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <div class="menu-content d-flex align-items-center px-3">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-50px me-5">
                                                <img alt="Logo"
                                                    src="https://static.vecteezy.com/system/resources/previews/009/292/244/non_2x/default-avatar-icon-of-social-media-user-vector.jpg" />
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Username-->
                                            <div class="d-flex flex-column">
                                                <div class="fw-bold d-flex align-items-center fs-5 un-text-truncate">
                                                    {{ Auth::user()->name }}
                                                </div>
                                                <a href="#"
                                                    class="fw-semibold text-muted text-hover-primary fs-7">{{ Auth::user()->email }}</a>
                                            </div>
                                            <!--end::Username-->
                                        </div>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu separator-->
                                    <div class="separator my-2"></div>
                                    <!--end::Menu separator-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5">
                                        <a href="{{ url('/profile') }}" class="menu-link px-5">Akun Saya</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5">
                                        <a href="{{ url('/order') }}" class="menu-link px-5">
                                            <span class="menu-text">Pesanan Saya</span>
                                        </a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu separator-->
                                    <div class="separator my-2"></div>
                                    <!--end::Menu separator-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5">
                                        <a href="javascript:void(0);" data-bs-toggle="modal"
                                            data-bs-target="#modal-logout" class="menu-link px-5">Keluar</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::User account menu-->
                                <!--end::Menu wrapper-->
                            </div>
                        </div>
                        <!--end::Navbar-->
                    </div>
                    <!--end::Header primary container-->
                </div>
                <!--end::Header primary-->
                <!--begin::Header secondary-->
                <div class="app-header-secondary">
                    <!--begin::Header secondary container-->
                    <div class="app-container container-xxl d-flex align-items-stretch">
                        <!--begin::Menu wrapper-->
                        <div class="app-header-menu app-header-mobile-drawer align-items-stretch flex-grow-1"
                            data-kt-drawer="true" data-kt-drawer-name="app-header-menu"
                            data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                            data-kt-drawer-width="250px" data-kt-drawer-direction="start"
                            data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true"
                            data-kt-swapper-mode="{default: 'append', lg: 'prepend'}"
                            data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
                            <!--begin::Menu-->
                            <div class="menu menu-rounded menu-active-bg menu-state-primary menu-column menu-lg-row menu-title-gray-700 menu-icon-gray-500 menu-arrow-gray-500 menu-bullet-gray-500 my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0"
                                id="kt_app_header_menu" data-kt-menu="true">
                                <!--begin:Menu item-->
                                @php
                                    $menus = [
                                        [
                                            'path' => '/dashboard',
                                            'title' => 'Beranda',
                                        ],
                                        [
                                            'path' => '/my-order',
                                            'title' => 'Pesanan Saya',
                                        ],
                                        [
                                            'path' => '/profile',
                                            'title' => 'Profil',
                                        ],
                                    ];

                                    if (!!Auth::user()->merchant) {
                                        $menus = [
                                            [
                                                'path' => '/dashboard',
                                                'title' => 'Beranda',
                                            ],
                                            [
                                                'path' => '/menu',
                                                'title' => 'Daftar Menu',
                                            ],
                                            [
                                                'path' => '/order',
                                                'title' => 'Daftar Orderan',
                                            ],
                                            [
                                                'path' => '/profile',
                                                'title' => 'Profil',
                                            ],
                                        ];
                                    }
                                @endphp
                                @foreach ($menus as $menu)
                                    <div class="menu-item menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                                        <!--begin:Menu link-->
                                        <a href="{{ url($menu['path']) }}" class="menu-link">
                                            <span class="menu-title">{{ $menu['title'] }}</span>
                                            <span class="menu-arrow d-lg-none"></span>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <!--end::Menu-->
                        </div>
                        <!--end::Menu wrapper-->
                    </div>
                    <!--end::Header secondary container-->
                </div>
                <!--end::Header secondary-->
            </div>
            <!--end::Header-->
            <!--begin::Wrapper-->
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                <!--begin::Wrapper container-->
                <div class="app-container container-xxl d-flex flex-row flex-column-fluid">
                    <!--begin::Main-->
                    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                        <!--begin::Content wrapper-->
                        <div class="d-flex flex-column flex-column-fluid">
                            <!--begin::Toolbar-->
                            @if (isset($title))
                                <div id="kt_app_toolbar" class="app-toolbar pt-lg-9 pt-6">
                                    <!--begin::Toolbar container-->
                                    <div id="kt_app_toolbar_container"
                                        class="app-container container-fluid d-flex flex-stack flex-wrap">
                                        <!--begin::Toolbar wrapper-->
                                        <div class="d-flex flex-stack flex-wrap gap-4 w-100">
                                            <!--begin::Page title-->
                                            <div class="page-title d-flex flex-column gap-3 me-3">
                                                <!--begin::Title-->
                                                <h1
                                                    class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-2x my-0">
                                                    {{ $title }}</h1>
                                                <!--end::Title-->
                                            </div>
                                            <!--end::Page title-->
                                        </div>
                                        <!--end::Toolbar wrapper-->
                                    </div>
                                    <!--end::Toolbar container-->
                                </div>
                            @endif
                            <!--end::Toolbar-->
                            <!--begin::Content-->
                            <div id="kt_app_content" class="app-content pb-0">
                                @yield('content')
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Content wrapper-->
                        <!--begin::Footer-->
                        <div id="kt_app_footer"
                            class="app-footer align-items-center justify-content-center justify-content-md-between flex-column flex-md-row py-3 py-lg-6">
                            <!--begin::Copyright-->
                            <div class="text-dark order-2 order-md-1">
                                <span class="text-muted fw-semibold me-1">2024&copy;</span>
                                <a href="https://izzaalfiansyah.vercel.app" target="_blank"
                                    class="text-gray-800 text-hover-primary">Muhammad Izza Alfiansyah</a>
                            </div>
                            <!--end::Copyright-->
                            <!--begin::Menu-->
                            <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                                <li class="menu-item">
                                    <a href="javascript:void(0);" target="_blank" class="menu-link px-2">Tentang
                                        Kami</a>
                                </li>
                                <li class="menu-item">
                                    <a href="javascript:void(0);" target="_blank" class="menu-link px-2">Support</a>
                                </li>
                                <li class="menu-item">
                                    <a href="javascript:void(0);" target="_blank" class="menu-link px-2">Privasi</a>
                                </li>
                            </ul>
                            <!--end::Menu-->
                        </div>
                        <!--end::Footer-->
                    </div>
                    <!--end:::Main-->
                </div>
                <!--end::Wrapper container-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>

    <form action="{{ url('/logout') }}" method="post">
        @method('POST')
        @csrf
        <x-modal id="modal-logout" header="Logout">
            <p>Anda yakin akan logout? Sesi anda akan terhapus!</p>

            <x-slot:footer>
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger">Keluar</button>
            </x-slot:footer>
        </x-modal>
    </form>

    <script>
        var hostUrl = "assets/";
    </script>
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Vendors Javascript(used for this page only)-->
    <script src="assets/plugins/custom/fslightbox/fslightbox.bundle.js"></script>
    <script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <!--end::Vendors Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>
