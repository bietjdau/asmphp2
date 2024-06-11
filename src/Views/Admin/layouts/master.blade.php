<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from demo.dashboardpack.com/sales-html/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 May 2024 07:23:13 GMT -->

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>@yield('title')</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @include('layouts.partials.head')
</head>

<body class="crm_body_bg">


    @include('layouts.partials.nav')

    <section class="main_content dashboard_part large_header_bg">

        @include('layouts.partials.topbar')

        <div class="main_content_iner overly_inner ">
            <div class="container-fluid p-0 ">

                @yield('content')

            </div>
        </div>

        @include('layouts.partials.footer')
    </section>

    <div id="back-top" style="display: none;">
        <a title="Go to Top" href="#">
            <i class="ti-angle-up"></i>
        </a>
    </div>

    @include('layouts.partials.script')

    @yield('script')
    <div class="container">
        <nav class="mt-5">
            <a href="{{ url('admin') }}">Dashboard</a>
            <a href="{{ url('admin/products') }}">Quản lý Sản phẩm</a>
        </nav>

        <h1 class="mt-5 mb-3 text-center">@yield('title')</h1>
        
        <div class="row">
            @yield('content')
        </div>
    </div>
</body>

</html>