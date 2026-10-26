<!doctype html>
<html lang="en">
<!--begin::Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>AdminLTE 4 | Users</title>

    <!--begin::Theme Init (prevents flash of incorrect theme on load, #6043)-->
    <script>
        (() => {
            'use strict';
            const root = document.documentElement;

            // Applications with their own theming opt out of AdminLTE's color mode
            // entirely, here as well as in the bundle.
            if (root.getAttribute('data-lte-color-mode') === 'off') {
                return;
            }

            const STORAGE_KEY = 'lte-theme';
            let stored = null;
            try {
                stored = localStorage.getItem(STORAGE_KEY);
            } catch {
                // localStorage may be unavailable (private mode, sandboxed iframe).
            }
            // Mirror the precedence in color-mode.ts: the visitor's stored choice
            // wins, then a theme this page declared itself, then the OS preference.
            const authored = root.getAttribute('data-bs-theme');
            let resolved = 'light';
            if (stored === 'dark' || stored === 'light') {
                resolved = stored;
            } else if (authored === 'dark' || authored === 'light') {
                resolved = authored;
            } else if (globalThis.matchMedia('(prefers-color-scheme: dark)').matches) {
                resolved = 'dark';
            }
            root.setAttribute('data-bs-theme', resolved);
            root.style.colorScheme = resolved;
            // Flag values computed here, so the bundle does not mistake them for a
            // theme the page declared and stop following the OS preference.
            if (resolved !== authored) {
                root.setAttribute('data-lte-theme-resolved', '');
            }
        })();
    </script>
    <!--end::Theme Init-->

    <!--begin::Accessibility Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <meta name="color-scheme" content="light dark" />
    <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
    <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
    <!--end::Accessibility Meta Tags-->

    <!--begin::Primary Meta Tags-->
    <meta name="title" content="AdminLTE 4 | Users" />
    <meta name="author" content="ColorlibHQ" />
    <meta name="description"
        content="AdminLTE is a free Bootstrap 5 admin dashboard template with almost 50 example pages, built with vanilla JS and designed with accessibility in mind." />
    <meta name="keywords"
        content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard, accessible admin panel" />
    <!--end::Primary Meta Tags-->

    <!--begin::Accessibility Features-->
    <!-- Skip links will be dynamically added by accessibility.js -->
    <meta name="supported-color-schemes" content="light dark" />
    <link rel="preload" href="./css/adminlte.css" as="style" />
    <!--end::Accessibility Features-->

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
        integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous" media="print"
        onload="this.media = 'all'" />
    <!--end::Fonts-->

    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
        crossorigin="anonymous" />
    <!--end::Third Party Plugin(OverlayScrollbars)-->

    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
        crossorigin="anonymous" />
    <!--end::Third Party Plugin(Bootstrap Icons)-->

    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="./css/adminlte.css" />
    <!--end::Required Plugin(AdminLTE)-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
        <!--begin::Header-->
        <nav class="app-header navbar navbar-expand bg-body">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Start Navbar Links-->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button"
                            aria-label="Toggle sidebar">
                            <i class="bi bi-list"></i>
                        </a>
                    </li>

                    <li class="nav-item d-none d-md-block">
                        <a href="./index.html" class="nav-link">
                            <i class="bi bi-grid-1x2 me-1" aria-hidden="true"></i> Live preview
                        </a>
                    </li>
                    <li class="nav-item d-none d-md-block">
                        <a href="./docs/introduction.html" class="nav-link">
                            <i class="bi bi-book me-1" aria-hidden="true"></i> Documentation
                        </a>
                    </li>
                </ul>
                <!--end::Start Navbar Links-->

                <!--begin::Navbar Search-->
                <form class="navbar-search d-none d-md-block ms-3" role="search" action="./pages/search-results.html">
                    <label for="navbar-search-input" class="visually-hidden">Search</label>
                    <div class="navbar-search-field">
                        <input type="search" id="navbar-search-input" name="q" class="form-control"
                            placeholder="Search…" autocomplete="off" />
                        <button class="navbar-search-submit" type="submit" aria-label="Submit search">
                            <i class="bi bi-search" aria-hidden="true"></i>
                        </button>
                    </div>
                </form>
                <!--end::Navbar Search-->

                <!--begin::End Navbar Links-->
                <ul class="navbar-nav ms-auto">
                    <!--begin::Search (small screens: the field above is hidden, so link to the search page)-->
                    <li class="nav-item d-md-none">
                        <a class="nav-link" href="./pages/search-results.html" aria-label="Search">
                            <i class="bi bi-search" aria-hidden="true"></i>
                        </a>
                    </li>
                    <!--end::Search-->
                    <!--begin::Messages Dropdown Menu-->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-bs-toggle="dropdown" href="#" aria-label="Messages: 3 unread">
                            <i class="bi bi-chat-text"></i>
                            <span class="navbar-badge badge text-bg-danger">3</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                            <a href="#" class="dropdown-item">
                                <!--begin::Message-->
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <img src="./assets/img/user1-128x128.jpg" alt=""
                                            class="img-size-50 rounded-circle me-3" />
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="dropdown-item-title">
                                            Brad Diesel
                                            <span class="float-end fs-7 text-danger"><i
                                                    class="bi bi-star-fill"></i></span>
                                        </p>
                                        <p class="fs-7">Call me whenever you can...</p>
                                        <p class="fs-7 text-secondary">
                                            <i class="bi bi-clock-fill me-1"></i> 4 Hours Ago
                                        </p>
                                    </div>
                                </div>
                                <!--end::Message-->
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <!--begin::Message-->
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <img src="./assets/img/user8-128x128.jpg" alt=""
                                            class="img-size-50 rounded-circle me-3" />
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="dropdown-item-title">
                                            John Pierce
                                            <span class="float-end fs-7 text-secondary">
                                                <i class="bi bi-star-fill"></i>
                                            </span>
                                        </p>
                                        <p class="fs-7">I got your message bro</p>
                                        <p class="fs-7 text-secondary">
                                            <i class="bi bi-clock-fill me-1"></i> 4 Hours Ago
                                        </p>
                                    </div>
                                </div>
                                <!--end::Message-->
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <!--begin::Message-->
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <img src="./assets/img/user3-128x128.jpg" alt=""
                                            class="img-size-50 rounded-circle me-3" />
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="dropdown-item-title">
                                            Nora Silvester
                                            <span class="float-end fs-7 text-warning">
                                                <i class="bi bi-star-fill"></i>
                                            </span>
                                        </p>
                                        <p class="fs-7">The subject goes here</p>
                                        <p class="fs-7 text-secondary">
                                            <i class="bi bi-clock-fill me-1"></i> 4 Hours Ago
                                        </p>
                                    </div>
                                </div>
                                <!--end::Message-->
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                        </div>
                    </li>
                    <!--end::Messages Dropdown Menu-->

                    <!--begin::Notifications Dropdown Menu-->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-bs-toggle="dropdown" href="#" aria-label="Notifications: 15 unread">
                            <i class="bi bi-bell-fill"></i>
                            <span class="navbar-badge badge text-bg-warning">15</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                            <span class="dropdown-item dropdown-header">15 Notifications</span>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="bi bi-envelope me-2"></i> 4 new messages
                                <span class="float-end text-secondary fs-7">3 mins</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="bi bi-people-fill me-2"></i> 8 friend requests
                                <span class="float-end text-secondary fs-7">12 hours</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="bi bi-file-earmark-fill me-2"></i> 3 new reports
                                <span class="float-end text-secondary fs-7">2 days</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item dropdown-footer"> See All Notifications </a>
                        </div>
                    </li>
                    <!--end::Notifications Dropdown Menu-->

                    <!--begin::Language Menu-->
                    <!-- Markup only: swapping the locale is the application's job. The docs
           Recipes page shows how to wire this to a real locale switch. -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="language-menu" data-bs-toggle="dropdown" aria-expanded="false"
                            aria-label="Change language, current language English">
                            <i class="bi bi-translate" aria-hidden="true"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="language-menu">
                            <li>
                                <a class="dropdown-item active" href="#" hreflang="en" aria-current="true">
                                    English
                                    <i class="bi bi-check-lg ms-2" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li><a class="dropdown-item" href="#" hreflang="es">Español</a></li>
                            <li><a class="dropdown-item" href="#" hreflang="fr">Français</a></li>
                            <li><a class="dropdown-item" href="#" hreflang="de">Deutsch</a></li>
                            <li><a class="dropdown-item" href="#" hreflang="ar">العربية</a></li>
                        </ul>
                    </li>
                    <!--end::Language Menu-->

                    <!--begin::Fullscreen Toggle-->
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-lte-toggle="fullscreen" aria-label="Toggle fullscreen">
                            <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                            <i data-lte-icon="minimize" class="bi bi-fullscreen-exit d-none"></i>
                        </a>
                    </li>
                    <!--end::Fullscreen Toggle-->

                    <!--begin::Color Mode Toggle (#6010)-->
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="bd-theme" aria-label="Toggle color scheme"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-sun-fill" data-lte-theme-icon="light"></i>
                            <i class="bi bi-moon-fill d-none" data-lte-theme-icon="dark"></i>
                            <i class="bi bi-circle-half d-none" data-lte-theme-icon="auto"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="bd-theme"
                            style="--bs-dropdown-min-width: 8rem">
                            <li>
                                <button type="button" class="dropdown-item d-flex align-items-center"
                                    data-bs-theme-value="light" aria-pressed="false">
                                    <i class="bi bi-sun-fill me-2"></i>
                                    Light
                                    <i class="bi bi-check-lg ms-auto d-none"></i>
                                </button>
                            </li>
                            <li>
                                <button type="button" class="dropdown-item d-flex align-items-center"
                                    data-bs-theme-value="dark" aria-pressed="false">
                                    <i class="bi bi-moon-fill me-2"></i>
                                    Dark
                                    <i class="bi bi-check-lg ms-auto d-none"></i>
                                </button>
                            </li>
                            <li>
                                <button type="button" class="dropdown-item d-flex align-items-center active"
                                    data-bs-theme-value="auto" aria-pressed="true">
                                    <i class="bi bi-circle-half me-2"></i>
                                    Auto
                                    <i class="bi bi-check-lg ms-auto d-none"></i>
                                </button>
                            </li>
                        </ul>
                    </li>
                    <!--end::Color Mode Toggle-->

                    <!--begin::User Menu Dropdown-->
                    <li class="nav-item dropdown user-menu">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img src="./assets/img/user2-160x160.jpg" class="user-image rounded-circle shadow"
                                alt="Alexander Pierce" />
                            <span class="d-none d-md-inline">Data</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                            <!--begin::User Image-->
                            <li class="user-header text-bg-primary">
                                <img src="./assets/img/user2-160x160.jpg" class="rounded-circle shadow"
                                    alt="Alexander Pierce" />
                                <p>
                                    Alexander Pierce - Web Developer
                                    <small>Member since Nov. 2023</small>
                                </p>
                            </li>
                            <!--end::User Image-->
                            <!--begin::Menu Body-->
                            <li class="user-body">
                                <!--begin::Row-->
                                <div class="row">
                                    <div class="col-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </div>
                                <!--end::Row-->
                            </li>
                            <!--end::Menu Body-->
                            <!--begin::Menu Footer-->
                            <li class="user-footer">
                                <a href="#" class="btn btn-outline-secondary">Profile</a>
                                <a href="#" class="btn btn-outline-danger float-end">Sign out</a>
                            </li>
                            <!--end::Menu Footer-->
                        </ul>
                    </li>
                    <!--end::User Menu Dropdown-->
                </ul>
                <!--end::End Navbar Links-->
            </div>
            <!--end::Container-->
        </nav>
        <!--end::Header-->
        <!--begin::Sidebar-->
        <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
            <!--begin::Sidebar Brand-->
            <div class="sidebar-brand">
                <!--begin::Brand Link-->
                <a href="./index.html" class="brand-link">
                    <!--begin::Brand Image-->
                    <img src="./assets/img/AdminLTELogo.png" alt="AdminLTE Logo"
                        class="brand-image opacity-75 shadow" />
                    <!--end::Brand Image-->
                    <!--begin::Brand Text-->
                    <span class="brand-text fw-light">AdminLTE 4</span>
                    <!--end::Brand Text-->
                </a>
                <!--end::Brand Link-->
            </div>
            <!--end::Sidebar Brand-->
            <!--begin::Sidebar Search-->
            <div class="sidebar-search" role="search">
                <label for="sidebar-search-input" class="visually-hidden">Filter menu</label>
                <input type="search" id="sidebar-search-input" class="form-control form-control-sm"
                    placeholder="Filter menu…" autocomplete="off" data-lte-toggle="sidebar-search"
                    data-lte-target="#navigation" />
                <p class="fs-7 text-secondary mt-2 mb-0" data-lte-search-empty role="status" hidden>
                    No matching pages.
                </p>
            </div>
            <!--end::Sidebar Search-->
            <!--begin::Sidebar Wrapper-->
            <div class="sidebar-wrapper">
                <nav class="mt-2" aria-label="Main navigation">
                    <!--begin::Sidebar Menu-->
                    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" data-accordion="false"
                        id="navigation">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-speedometer"></i>
                                <p>
                                    Dashboard
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="./index.html" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Dashboard v1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./index2.html" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Dashboard v2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./index3.html" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Dashboard v3</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="./starter.html" class="nav-link">
                                <i class="nav-icon bi bi-file-earmark"></i>
                                <p>Starter Page</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./generate/theme.html" class="nav-link">
                                <i class="nav-icon bi bi-palette"></i>
                                <p>Theme Generate</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-box-seam-fill"></i>
                                <p>
                                    Widgets
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="./widgets/small-box.html" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Small Box</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./widgets/info-box.html" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>info Box</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./widgets/cards.html" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Cards</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./widgets/social.html" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Social &amp; Post</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-clipboard-fill"></i>
                                <p>
                                    Layout Options
                                    <span class="nav-badge badge text-bg-secondary me-3">12</span>
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="./layout/unfixed-sidebar.html" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Default Sidebar</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./layout/fixed-sidebar.html" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Fixed Sidebar</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./layout/fixed-header.html" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Fixed Header</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./layout/fixed-footer.html" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Fixed Footer</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./layout/fixed-complete.html" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Fixed Complete</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./layout/layout-custom-area.html" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Layout <small>+ Custom Area </small></p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./layout/sidebar-mini.html" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Sidebar Mini</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./layout/collapsed-sidebar.html" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Sidebar Mini <small>+ Collapsed</small></p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./layout/collapsed-sidebar-without-hover.html" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Sidebar Mini <small>+ Collapsed + No Hover</small></p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./layout/logo-switch.html" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Sidebar Mini <small>+ Logo Switch</small></p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./layout/top-nav.html" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Top Nav <small>+ No Sidebar</small></p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./layout/layout-rtl.html" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Layout RTL</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-tree-fill"></i>
                                <p>
                                    UI Elements
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="./UI/general.html" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>General</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./UI/icons.html" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Icons</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./UI/timeline.html" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Timeline</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./UI/ribbons.html" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Ribbons</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./UI/colors.html" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Colors</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-envelope"></i>
                                <p>
                                    Mailbox
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="./mailbox/inbox.html" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Inbox</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./mailbox/read.html" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Read Message</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./mailbox/compose.html" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Compose</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-pencil-square"></i>
                                <p>
                                    Forms
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="./forms/elements.html" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Elements</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./forms/layout.html" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Layout</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./forms/validation.html" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Validation</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./forms/wizard.html" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Wizard</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./forms/advanced.html" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Advanced Elements</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./forms/editors.html" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Editors</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-table"></i>
                                <p>
                                    Tables
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="./tables/simple.html" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Simple Tables</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./tables/data.html" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Data Tables</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-graph-up"></i>
                                <p>
                                    Charts
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="./charts/chartjs.html" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Chart.js</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-header">PAGES</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-file-earmark-text"></i>
                                <p>
                                    Pages
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="./pages/profile.html" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Profile</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./pages/settings.html" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Settings</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./pages/invoice.html" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Invoice</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./pages/calendar.html" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Calendar</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./pages/kanban.html" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Kanban</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./pages/chat.html" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Chat</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./pages/file-manager.html" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>File Manager</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./pages/projects.html" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Projects</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./pages/gallery.html" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Gallery</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./pages/search-results.html" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Search Results</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./pages/pricing.html" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Pricing</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./pages/faq.html" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>FAQ</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>
                                            Error
                                            <i class="nav-arrow bi bi-chevron-right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="./pages/404.html" class="nav-link">
                                                <i class="nav-icon bi bi-circle"></i>
                                                <p>404</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="./pages/500.html" class="nav-link">
                                                <i class="nav-icon bi bi-circle"></i>
                                                <p>500</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="./pages/maintenance.html" class="nav-link">
                                                <i class="nav-icon bi bi-circle"></i>
                                                <p>Maintenance</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="./users.html" class="nav-link active">
                                <i class="nav-icon bi bi-people"></i>
                                <p>Data </p>
                            </a>
                        </li>

                        <li class="nav-header">EXAMPLES</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-box-arrow-in-right"></i>
                                <p>
                                    Auth
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon bi bi-box-arrow-in-right"></i>
                                        <p>
                                            Version 1
                                            <i class="nav-arrow bi bi-chevron-right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="./examples/login.html" class="nav-link">
                                                <i class="nav-icon bi bi-circle"></i>
                                                <p>Login</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="./examples/register.html" class="nav-link">
                                                <i class="nav-icon bi bi-circle"></i>
                                                <p>Register</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="./examples/forgot-password.html" class="nav-link">
                                                <i class="nav-icon bi bi-circle"></i>
                                                <p>Forgot Password</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon bi bi-box-arrow-in-right"></i>
                                        <p>
                                            Version 2
                                            <i class="nav-arrow bi bi-chevron-right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="./examples/login-v2.html" class="nav-link">
                                                <i class="nav-icon bi bi-circle"></i>
                                                <p>Login</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="./examples/register-v2.html" class="nav-link">
                                                <i class="nav-icon bi bi-circle"></i>
                                                <p>Register</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="./examples/lockscreen.html" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Lockscreen</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-header">MULTI LEVEL EXAMPLE</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-circle-fill"></i>
                                <p>Level 1</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-circle-fill"></i>
                                <p>
                                    Level 1
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Level 2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>
                                            Level 2
                                            <i class="nav-arrow bi bi-chevron-right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="nav-icon bi bi-record-circle-fill"></i>
                                                <p>Level 3</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="nav-icon bi bi-record-circle-fill"></i>
                                                <p>Level 3</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="nav-icon bi bi-record-circle-fill"></i>
                                                <p>Level 3</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Level 2</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-circle-fill"></i>
                                <p>Level 1</p>
                            </a>
                        </li>

                        <li class="nav-header">LABELS</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-circle text-danger"></i>
                                <p class="text">Important</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-circle text-warning"></i>
                                <p>Warning</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-circle text-info"></i>
                                <p>Informational</p>
                            </a>
                        </li>
                    </ul>
                    <!--end::Sidebar Menu-->

                    <!-- Docs CTA (bottom of sidebar) -->
                    <div class="p-3 mt-3 border-top border-secondary border-opacity-25">
                        <a href="./docs/introduction.html"
                            class="btn btn-sm btn-outline-light w-100 d-flex align-items-center justify-content-center gap-2">
                            <i class="bi bi-book" aria-hidden="true"></i> View documentation
                        </a>
                    </div>
                </nav>
            </div>
            <!--end::Sidebar Wrapper-->
        </aside>
        <!--end::Sidebar-->
        <!--begin::App Main-->
        <main class="app-main">
            <!--begin::App Content Header-->
            <div class="app-content-header">
                <!--begin::Container-->
                <div class="container-fluid">
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h1 class="mb-0 fs-3">Nilai Mahasiswa</h1>
                        </div>
                        <div class="col-sm-6">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb float-sm-end">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Users</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::App Content Header-->
            <!--begin::App Content-->
            <div class="app-content">
                <!--begin::Container-->
                <div class="container-fluid">
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-12">
                            <!--begin::Card-->
                            <div class="card mb-4">
                                <!--begin::Card Header-->
                                <div class="card-header">
                                    <div class="row g-2 align-items-center">
                                        <div class="col-12 col-md-4">
                                            <h3 class="card-title">Direktori Nilai</h3>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <div class="d-flex flex-wrap justify-content-md-end gap-2">
                                                <form method="GET" action=""
                                                    class="d-flex flex-wrap gap-2 align-items-center m-0">
                                                    <div class="input-group input-group-sm w-auto">
                                                        <span class="input-group-text">
                                                            <i class="bi bi-search" aria-hidden="true"></i>
                                                        </span>
                                                        <input type="search" id="user-search" name="search"
                                                            class="form-control" placeholder="Cari nama / predikat..."
                                                            aria-label="Search users"
                                                            value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>"
                                                            style="width: 180px" />
                                                    </div>
                                                    <select id="user-role-filter" name="predikat"
                                                        class="form-select form-select-sm w-auto"
                                                        aria-label="Filter by predikat">
                                                        <option value="" <?php echo empty($_GET['predikat']) ? 'selected' : ''; ?>>Semua Predikat</option>
                                                        <option value="Sangat Memuaskan" <?php echo (isset($_GET['predikat']) && $_GET['predikat'] === 'Sangat Memuaskan') ? 'selected' : ''; ?>>Sangat Memuaskan</option>
                                                        <option value="Memuaskan" <?php echo (isset($_GET['predikat']) && $_GET['predikat'] === 'Memuaskan') ? 'selected' : ''; ?>>
                                                            Memuaskan</option>
                                                        <option value="Cukup" <?php echo (isset($_GET['predikat']) && $_GET['predikat'] === 'Cukup') ? 'selected' : ''; ?>>Cukup
                                                        </option>
                                                        <option value="Kurang" <?php echo (isset($_GET['predikat']) && $_GET['predikat'] === 'Kurang') ? 'selected' : ''; ?>>Kurang
                                                        </option>
                                                        <option value="Tidak Lulus" <?php echo (isset($_GET['predikat']) && $_GET['predikat'] === 'Tidak Lulus') ? 'selected' : ''; ?>>
                                                            Tidak Lulus</option>
                                                    </select>
                                                    <?php if (!empty($_GET['search']) || !empty($_GET['predikat'])) { ?>
                                                        <a href="<?php echo basename($_SERVER['PHP_SELF']); ?>"
                                                            class="btn btn-sm btn-outline-secondary"
                                                            title="Reset Pencarian">
                                                            <i class="bi bi-x-circle"></i> Reset
                                                        </a>
                                                    <?php } ?>
                                                </form>
                                                <button type="button" class="btn btn-sm btn-primary"
                                                    data-bs-toggle="modal" data-bs-target="#modal-add-user">
                                                    <i class="bi bi-person-plus-fill me-1" aria-hidden="true"> </i>
                                                    Tambah Data Nilai
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Card Header-->
                                <?php
                                require_once __DIR__ . "/connection.php";

                                // Ambil parameter pencarian nama dan filter predikat
                                $search = isset($_GET['search']) ? trim($_GET['search']) : '';
                                $filter_predikat = isset($_GET['predikat']) ? trim($_GET['predikat']) : '';

                                $where = [];
                                if (!empty($search)) {
                                    $search_safe = mysqli_real_escape_string($conn, $search);
                                    $where[] = "(NamaMahasiswa LIKE '%$search_safe%' OR predikat LIKE '%$search_safe%')";
                                }
                                if (!empty($filter_predikat)) {
                                    $predikat_safe = mysqli_real_escape_string($conn, $filter_predikat);
                                    $where[] = "predikat = '$predikat_safe'";
                                }

                                $sort = isset($_GET['sort']) ? trim($_GET['sort']) : '';
                                $order = isset($_GET['order']) ? strtolower(trim($_GET['order'])) : '';

                                $sql = "SELECT NIM AS nim, NamaMahasiswa AS namamhsw, NilaiAkhir AS nilaiakhir, NilaiHuruf AS nilaihuruf,
                                        predikat, create_date, modified_date, created_date, file_path
                                        FROM " . DB_TABLE_NAME;
                                if (count($where) > 0) {
                                    $sql .= " WHERE " . implode(" AND ", $where);
                                }
                                if ($sort === 'nilai') {
                                    $sql .= ($order === 'asc') ? " ORDER BY NilaiAkhir ASC" : " ORDER BY NilaiAkhir DESC";
                                }

                                $result = $conn->query($sql);
                                $data_nilai = [];
                                if ($result && $result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $data_nilai[] = $row;
                                    }
                                }
                                $total_rows = count($data_nilai);
                                ?>
                                <!--begin::Card Body-->
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-hover align-middle m-0" id="table-nilai">
                                            <thead>
                                                <tr>
                                                    <th>NIM</th>
                                                    <th>Nama Mahasiswa</th>
                                                    <th>
                                                        <div class="d-inline-flex align-items-center gap-1">
                                                            <span>Nilai Akhir</span>
                                                            <button type="button" id="btn-sort-nilai"
                                                                class="btn btn-sm btn-outline-secondary py-0 px-1 border-0"
                                                                title="Urutkan nilai dari yang terbesar"
                                                                style="line-height: 1;">
                                                                <i class="bi bi-arrow-down-up" id="sort-nilai-icon"></i>
                                                            </button>
                                                        </div>
                                                    </th>
                                                    <th>Nilai Huruf</th>
                                                    <th>Predikat</th>
                                                    <th>Tgl Created</th>
                                                    <th>Tgl Modified</th>
                                                    <th class="text-end">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if ($total_rows > 0) {
                                                    foreach ($data_nilai as $row) {
                                                        ?>
                                                        <tr class="data-row" data-nama="<?php echo htmlspecialchars($row["namamhsw"]); ?>"
                                                            data-predikat="
                                                    <?php echo htmlspecialchars($row["predikat"]); ?>"
                                                            data-nilai="
                                                    <?php echo htmlspecialchars($row["nilaiakhir"]); ?>">
                                                            <td>
                                                                <span class="fw-medium">
                                                                    <?php echo htmlspecialchars($row["nim"]); ?>
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <?php
                                                                    $foto_src = "./default-avatar.svg";
                                                                    $file_path = $row["file_path"] ?? '';
                                                                    if (!empty($file_path)) {
                                                                        if (file_exists(__DIR__ . "/" . $file_path)) {
                                                                            $foto_src = htmlspecialchars($file_path);
                                                                        } elseif (file_exists(__DIR__ . "/uploads/" . basename($file_path))) {
                                                                            $foto_src = "uploads/" . htmlspecialchars(basename($file_path));
                                                                        } elseif (file_exists(__DIR__ . "/../file-upload/" . $file_path)) {
                                                                            $foto_src = "../file-upload/" . htmlspecialchars($file_path);
                                                                        } else {
                                                                            $foto_src = "./default-avatar.svg";
                                                                        }
                                                                    }
                                                                    ?>
                                                                    <img src="<?php echo $foto_src; ?>"
                                                                        alt="<?php echo htmlspecialchars($row["namamhsw"]); ?>"
                                                                    class="img-size-32 rounded-circle me-2" style="width: 32px;
                                                            height: 32px; object-fit: cover;"
                                                                    onerror="this.onerror=null;this.src='./default-avatar.svg';" />
                                                                    <span class="fw-medium">
                                                                        <?php echo htmlspecialchars($row["namamhsw"]); ?>
                                                                    </span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <?php echo htmlspecialchars($row["nilaiakhir"]); ?>
                                                            </td>
                                                            <td>
                                                                <span class="badge text-bg-success">
                                                                    <?php echo htmlspecialchars($row["nilaihuruf"]); ?>
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <?php echo htmlspecialchars($row["predikat"]); ?>
                                                            </td>
                                                            <td>
                                                                <?php echo htmlspecialchars($row["create_date"]); ?>
                                                            </td>
                                                            <td>
                                                                <?php echo htmlspecialchars($row["modified_date"]); ?>
                                                            </td>
                                                            <td class="text-end">
                                                                <div class="btn-group btn-group-sm">
                                                                    <button type="button" class="btn btn-outline-secondary"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#modal-edit-<?php echo htmlspecialchars($row["nim"]); ?>"
                                                                        title="Edit Data">
                                                                        <i class="bi bi-pencil" aria-hidden="true"> </i>
                                                                    </button>
                                                                    <button type="button" class="btn btn-outline-danger"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#modal-delete-<?php echo htmlspecialchars($row["nim"]); ?>"
                                                                        title="Hapus Data">
                                                                        <i class="bi bi-trash" aria-hidden="true"> </i>
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <tr id="empty-data-row">
                                                        <td colspan="8" class="text-center text-body-secondary py-4">
                                                            <?php echo (!empty($search) || !empty($filter_predikat))
                                                                ? 'Tidak ditemukan data nilai yang sesuai dengan pencarian.'
                                                                : 'Belum ada data nilai mahasiswa.'; ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                                <tr id="no-match-row" style="display: none;">
                                                    <td colspan="8" class="text-center text-body-secondary py-4">
                                                        Tidak ditemukan data nilai yang sesuai dengan pencarian.
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!--end::Card Body-->
                                <!--begin::Card Footer-->
                                <div
                                    class="card-footer clearfix d-flex flex-wrap justify-content-between align-items-center gap-2">
                                    <div class="d-flex flex-wrap align-items-center gap-2">
                                        <label for="per-page-select"
                                            class="fs-7 text-body-secondary mb-0">Tampilkan:</label>
                                        <select id="per-page-select" class="form-select form-select-sm w-auto"
                                            aria-label="Limit record per page">
                                            <option value="5" selected>5</option>
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                        </select>
                                        <span class="fs-7 text-body-secondary">data per halaman</span>
                                        <span class="fs-7 text-body-secondary ms-md-2" id="showing-entries-count">
                                            Menampilkan 1 - 5 dari
                                            <?php echo $total_rows; ?> data
                                        </span>
                                    </div>
                                    <ul class="pagination pagination-sm m-0" id="pagination-list">
                                        <!-- Di-generate otomatis oleh JavaScript sesuai isi data -->
                                    </ul>
                                </div>
                                <!--end::Card Footer-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!--end::Row-->
                    <!--begin::Add User Modal-->
                    <div class="modal fade" id="modal-add-user" tabindex="-1" aria-labelledby="modal-add-user-label"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="insertnilai.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="redirect"
                                        value="<?php echo basename($_SERVER['PHP_SELF']); ?>">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal-add-user-label">Tambah Data Nilai</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="add-nim" class="form-label"> NIM </label>
                                            <input type="text" class="form-control" id="add-nim" maxlength="10"
                                                placeholder="Masukkan NIM Anda" name="nim" required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="add-namamhsw" class="form-label"> Nama Mahasiswa </label>
                                            <input type="text" class="form-control" id="add-namamhsw"
                                                placeholder="Masukkan Nama Mahasiswa" name="namamhsw" required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="add-nilaiakhir" class="form-label"> Nilai Akhir </label>
                                            <input type="number" class="form-control" id="add-nilaiakhir"
                                                placeholder="Masukkan Nilai Anda" min="0" max="100" step="0.01"
                                                name="nilaiakhir" required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="add-foto" class="form-label"> Foto Mahasiswa </label>
                                            <input type="file" class="form-control" id="add-foto" name="foto"
                                                accept="image/*" />
                                            <div class="form-text">Pilih foto dari komputer / folder uploads (JPG, PNG,
                                                GIF, WebP).</div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            Batal
                                        </button>
                                        <button type="submit" class="btn btn-primary">Tambah Data Nilai</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--end::Add User Modal-->

                    <!--begin::Edit & Delete Modals for Each Record-->
                    <?php foreach ($data_nilai as $row) { ?>
                        <!-- Modal Edit: <?php echo htmlspecialchars($row['nim']); ?> -->
                        <div class="modal fade" id="modal-edit-<?php echo htmlspecialchars($row['nim']); ?>" tabindex="-1"
                            aria-labelledby="modal-edit-label-<?php echo htmlspecialchars($row['nim']); ?>"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="updatenilai.php" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="redirect"
                                            value="<?php echo basename($_SERVER['PHP_SELF']); ?>">
                                        <div class="modal-header">
                                            <h5 class="modal-title"
                                                id="modal-edit-label-<?php echo htmlspecialchars($row['nim']); ?>">Edit Data
                                                Nilai Mahasiswa</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label">NIM</label>
                                                <input type="text" class="form-control bg-body-secondary" name="nim"
                                                    value="<?php echo htmlspecialchars($row['nim']); ?>" readonly />
                                                <div class="form-text">NIM tidak dapat diubah (Primary Key).</div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Nama Mahasiswa</label>
                                                <input type="text" class="form-control" name="namamhsw"
                                                    value="<?php echo htmlspecialchars($row['namamhsw']); ?>" required />
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Nilai Akhir</label>
                                                <input type="number" step="0.01" min="0" max="100" class="form-control"
                                                    name="nilaiakhir"
                                                    value="<?php echo htmlspecialchars($row['nilaiakhir']); ?>" required />
                                                <div class="form-text">Nilai huruf & predikat akan otomatis dihitung ulang.
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Foto Mahasiswa</label>
                                                <?php if (!empty($row['file_path'])) { ?>
                                                    <div class="d-flex align-items-center gap-2 mb-2">
                                                        <img src="<?php echo htmlspecialchars($row['file_path']); ?>" alt="Foto"
                                                            class="img-size-32 rounded-circle"
                                                            style="width: 36px; height: 36px; object-fit: cover;" />
                                                        <span class="small text-secondary">
                                                            <?php echo htmlspecialchars(basename($row['file_path'])); ?>
                                                        </span>
                                                    </div>
                                                <?php } ?>
                                                <input type="file" class="form-control" name="foto" accept="image/*" />
                                                <div class="form-text">Pilih foto baru jika ingin mengganti foto mahasiswa.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Delete: <?php echo htmlspecialchars($row['nim']); ?> -->
                        <div class="modal fade" id="modal-delete-<?php echo htmlspecialchars($row['nim']); ?>" tabindex="-1"
                            aria-labelledby="modal-delete-label-<?php echo htmlspecialchars($row['nim']); ?>"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="deletenilai.php" method="post">
                                        <input type="hidden" name="nim"
                                            value="<?php echo htmlspecialchars($row['nim']); ?>">
                                        <input type="hidden" name="redirect"
                                            value="<?php echo basename($_SERVER['PHP_SELF']); ?>">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-danger"
                                                id="modal-delete-label-<?php echo htmlspecialchars($row['nim']); ?>">
                                                Konfirmasi Hapus Data</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="mb-2">Apakah Anda yakin ingin menghapus data nilai mahasiswa berikut?
                                            </p>
                                            <div class="alert alert-danger mb-0">
                                                <div><strong>NIM:</strong>
                                                    <?php echo htmlspecialchars($row['nim']); ?>
                                                </div>
                                                <div><strong>Nama:</strong>
                                                    <?php echo htmlspecialchars($row['namamhsw']); ?>
                                                </div>
                                                <div><strong>Nilai Akhir:</strong>
                                                    <?php echo htmlspecialchars($row['nilaiakhir']); ?>
                                                    (
                                                    <?php echo htmlspecialchars($row['nilaihuruf']); ?> -
                                                    <?php echo htmlspecialchars($row['predikat']); ?>)
                                                </div>
                                            </div>
                                            <p class="text-danger small mt-2 mb-0"><i
                                                    class="bi bi-exclamation-triangle-fill me-1"></i> Tindakan ini tidak
                                                dapat dibatalkan.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-danger">Hapus Data</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <!--end::Edit & Delete Modals-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::App Content-->
        </main>
        <!--end::App Main-->
        <!--begin::Footer-->
        <footer class="app-footer">
            <!--begin::To the end-->
            <div class="float-end d-none d-sm-inline">Anything you want</div>
            <!--end::To the end-->
            <!--begin::Copyright-->
            <strong>
                Copyright &copy; 2014-2026&nbsp;
                <a href="https://adminlte.io" class="text-decoration-none">AdminLTE.io</a>.
            </strong> All rights reserved.
            <!--end::Copyright-->
        </footer>
        <!--end::Footer-->
    </div>
    <!--end::App Wrapper-->
    <!--begin::Script-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"
        crossorigin="anonymous"></script>
    <!--end::Third Party Plugin(OverlayScrollbars)-->
    <!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        crossorigin="anonymous"></script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)-->
    <!--begin::Required Plugin(Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"
        crossorigin="anonymous"></script>
    <!--end::Required Plugin(Bootstrap 5)-->
    <!--begin::Required Plugin(AdminLTE)-->
    <script src="./js/adminlte.js"></script>
    <!--end::Required Plugin(AdminLTE)-->
    <!--begin::OverlayScrollbars Configure-->
    <script>
        const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
        const Default = {
            scrollbarTheme: 'os-theme-light',
            scrollbarAutoHide: 'leave',
            scrollbarClickScroll: true,
        };
        document.addEventListener('DOMContentLoaded', function () {
            const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);

            // Disable OverlayScrollbars on mobile devices to prevent touch interference
            const isMobile = window.innerWidth <= 992;

            if (
                sidebarWrapper &&
                OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined &&
                !isMobile
            ) {
                OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                    scrollbars: {
                        theme: Default.scrollbarTheme,
                        autoHide: Default.scrollbarAutoHide,
                        clickScroll: Default.scrollbarClickScroll,
                    },
                });
            }
        });
    </script>
    <script>
        // Live client-side search, sort, and dynamic pagination (5, 10, 15)
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('user-search');
            const predikatFilter = document.getElementById('user-role-filter');
            const noMatchRow = document.getElementById('no-match-row');
            const showingCount = document.getElementById('showing-entries-count');
            const paginationList = document.getElementById('pagination-list');
            const perPageBtns = document.querySelectorAll('.btn-per-page');
            const tbody = document.querySelector('#table-nilai tbody');

            let currentPage = 1;
            let perPage = 5;

            function updateTable() {
                const query = (searchInput ? searchInput.value : '').toLowerCase().trim();
                const selectedPredikat = (predikatFilter ? predikatFilter.value : '').toLowerCase().trim();
                const allRows = Array.from(document.querySelectorAll('tr.data-row'));

                // 1. Filter baris
                const matchingRows = allRows.filter(function (row) {
                    const nama = (row.getAttribute('data-nama') || '').toLowerCase();
                    const predikat = (row.getAttribute('data-predikat') || '').toLowerCase();

                    const matchesSearch = query === '' || nama.includes(query) || predikat.includes(query);
                    const matchesPredikat = selectedPredikat === '' || predikat === selectedPredikat;
                    return matchesSearch && matchesPredikat;
                });

                const totalMatching = matchingRows.length;
                const totalPages = Math.ceil(totalMatching / perPage) || 1;

                if (currentPage > totalPages) currentPage = totalPages;
                if (currentPage < 1) currentPage = 1;

                const startIndex = (currentPage - 1) * perPage;
                const endIndex = Math.min(startIndex + perPage, totalMatching);

                // 2. Tampilkan baris sesuai halaman aktif, sembunyikan sisanya
                allRows.forEach(function (row) {
                    row.style.display = 'none';
                });
                for (let i = startIndex; i < endIndex; i++) {
                    if (matchingRows[i]) {
                        matchingRows[i].style.display = '';
                    }
                }

                // 3. Tampilkan pesan kosong jika tidak ada yang cocok
                if (noMatchRow) {
                    noMatchRow.style.display = (totalMatching === 0 && allRows.length > 0) ? '' : 'none';
                }

                // 4. Update teks info jumlah entri
                if (showingCount) {
                    if (totalMatching > 0) {
                        showingCount.textContent = 'Menampilkan ' + (startIndex + 1) + ' - ' + endIndex + ' dari ' + totalMatching + ' data';
                    } else {
                        showingCount.textContent = 'Menampilkan 0 data';
                    }
                }

                // 5. Render list pagination (1, 2, 3...)
                renderPagination(totalPages);
            }

            function renderPagination(totalPages) {
                if (!paginationList) return;
                paginationList.innerHTML = '';

                if (totalPages <= 1) {
                    return; // Jika cuma 1 halaman, tombol pagination tidak diperlukan
                }

                // Tombol First Page
                const firstLi = document.createElement('li');
                firstLi.className = 'page-item ' + (currentPage === 1 ? 'disabled' : '');
                const firstA = document.createElement('a');
                firstA.className = 'page-link';
                firstA.href = '#';
                firstA.innerHTML = '&laquo;&laquo; First';
                firstA.setAttribute('aria-label', 'First Page');
                firstA.addEventListener('click', function (e) {
                    e.preventDefault();
                    if (currentPage > 1) {
                        currentPage = 1;
                        updateTable();
                    }
                });
                firstLi.appendChild(firstA);
                paginationList.appendChild(firstLi);

                // Tombol Previous
                const prevLi = document.createElement('li');
                prevLi.className = 'page-item ' + (currentPage === 1 ? 'disabled' : '');
                const prevA = document.createElement('a');
                prevA.className = 'page-link';
                prevA.href = '#';
                prevA.innerHTML = '&laquo; Prev';
                prevA.setAttribute('aria-label', 'Previous');
                prevA.addEventListener('click', function (e) {
                    e.preventDefault();
                    if (currentPage > 1) {
                        currentPage--;
                        updateTable();
                    }
                });
                prevLi.appendChild(prevA);
                paginationList.appendChild(prevLi);

                // Tombol nomor halaman
                for (let i = 1; i <= totalPages; i++) {
                    const li = document.createElement('li');
                    li.className = 'page-item ' + (i === currentPage ? 'active' : '');
                    const a = document.createElement('a');
                    a.className = 'page-link';
                    a.href = '#';
                    a.textContent = i;
                    a.addEventListener('click', function (e) {
                        e.preventDefault();
                        currentPage = i;
                        updateTable();
                    });
                    li.appendChild(a);
                    paginationList.appendChild(li);
                }

                // Tombol Next
                const nextLi = document.createElement('li');
                nextLi.className = 'page-item ' + (currentPage === totalPages ? 'disabled' : '');
                const nextA = document.createElement('a');
                nextA.className = 'page-link';
                nextA.href = '#';
                nextA.innerHTML = 'Next &raquo;';
                nextA.setAttribute('aria-label', 'Next');
                nextA.addEventListener('click', function (e) {
                    e.preventDefault();
                    if (currentPage < totalPages) {
                        currentPage++;
                        updateTable();
                    }
                });
                nextLi.appendChild(nextA);
                paginationList.appendChild(nextLi);

                // Tombol Last Page
                const lastLi = document.createElement('li');
                lastLi.className = 'page-item ' + (currentPage === totalPages ? 'disabled' : '');
                const lastA = document.createElement('a');
                lastA.className = 'page-link';
                lastA.href = '#';
                lastA.innerHTML = 'Last &raquo;&raquo;';
                lastA.setAttribute('aria-label', 'Last Page');
                lastA.addEventListener('click', function (e) {
                    e.preventDefault();
                    if (currentPage < totalPages) {
                        currentPage = totalPages;
                        updateTable();
                    }
                });
                lastLi.appendChild(lastA);
                paginationList.appendChild(lastLi);
            }

            // Event listener pemilihan data per page (5, 10, 15) via drop-down option
            const perPageSelect = document.getElementById('per-page-select');
            if (perPageSelect) {
                perPageSelect.addEventListener('change', function () {
                    perPage = parseInt(this.value) || 5;
                    currentPage = 1;
                    updateTable();
                });
            }

            // Event search & filter predikat
            if (searchInput) {
                searchInput.addEventListener('input', function () {
                    currentPage = 1;
                    updateTable();
                });
            }
            if (predikatFilter) {
                predikatFilter.addEventListener('change', function () {
                    currentPage = 1;
                    updateTable();
                });
            }

            // Live sorting Nilai Akhir
            const sortBtn = document.getElementById('btn-sort-nilai');
            const sortIcon = document.getElementById('sort-nilai-icon');
            let sortOrder = '<?php echo ($sort === "nilai" && $order === "asc") ? "asc" : (($sort === "nilai") ? "desc" : ""); ?>';

            if (sortOrder === 'desc' && sortIcon) {
                sortIcon.className = 'bi bi-arrow-down text-primary fw-bold';
            } else if (sortOrder === 'asc' && sortIcon) {
                sortIcon.className = 'bi bi-arrow-up text-primary fw-bold';
            }

            if (sortBtn && tbody) {
                sortBtn.addEventListener('click', function (e) {
                    e.preventDefault();
                    if (sortOrder === '' || sortOrder === 'asc') {
                        sortOrder = 'desc';
                        if (sortIcon) sortIcon.className = 'bi bi-arrow-down text-primary fw-bold';
                        sortBtn.title = 'Nilai terurut: Terbesar ke Terkecil (Klik untuk urutkan Terkecil)';
                    } else {
                        sortOrder = 'asc';
                        if (sortIcon) sortIcon.className = 'bi bi-arrow-up text-primary fw-bold';
                        sortBtn.title = 'Nilai terurut: Terkecil ke Terbesar (Klik untuk urutkan Terbesar)';
                    }

                    const dataRows = Array.from(tbody.querySelectorAll('tr.data-row'));
                    dataRows.sort(function (a, b) {
                        const valA = parseFloat(a.getAttribute('data-nilai')) || 0;
                        const valB = parseFloat(b.getAttribute('data-nilai')) || 0;
                        return sortOrder === 'desc' ? (valB - valA) : (valA - valB);
                    });

                    dataRows.forEach(function (row) {
                        tbody.appendChild(row);
                    });

                    const noMatch = document.getElementById('no-match-row');
                    if (noMatch) tbody.appendChild(noMatch);
                    const emptyRow = document.getElementById('empty-data-row');
                    if (emptyRow) tbody.appendChild(emptyRow);

                    updateTable();
                });
            }

            // Inisialisasi awal tabel & pagination
            updateTable();
        });
    </script>
    <!--end::Script-->
</body>
<!--end::Body-->

</html>