<!doctype html>
<html lang="en" dir="ltr">

<head>
    @include('admin-panel.includes.meta')
    <!-- TITLE -->
    <title>Heritage - @yield('title')</title>

    @include('admin-panel.includes.styles')
</head>

<body class="ltr app sidebar-mini">

<!-- Switcher-->
<!-- Switcher -->
@include('admin-panel.includes.right-sidebar')
<!-- End Switcher -->
<!-- Switcher-->

<!-- GLOBAL-LOADER -->
<div id="global-loader">
    <img src="{{ asset('/') }}backend/assets/images/loader.svg" class="loader-img" alt="Loader">
</div>
<!-- /GLOBAL-LOADER -->

<!-- PAGE -->
<div class="page">
    <div class="page-main">

        <!-- app-Header -->
        @include('admin-panel.includes.header')
        <!-- /app-Header -->

        <!--APP-SIDEBAR-->
        @include('admin-panel.includes.left-sidebar')
        <!--/APP-SIDEBAR-->

        <!--app-content open-->
        @yield('admin-content')
        <!-- CONTAINER CLOSED -->
    </div>
    @include('admin-panel.includes.modals')
    <!-- FOOTER -->
    @include('admin-panel.includes.footer')
    <!-- FOOTER CLOSED -->

</div>
<!-- page -->
@include('admin-panel.includes.scripts')

</body>
</html>

