<body class="skin-blue sidebar-mini" style="height: auto; min-height: 100%;">
<!-- Site wrapper -->
<div class="wrapper" style="height: auto; min-height: 100%;">

@include('layouts.dashboard.header')

<!-- =============================================== -->

@include('dashboard.sidebar')

<!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 1020px;">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1 class="pull-left">@yield('content_title')</h1>

            @if(Breadcrumbs::exists(Route::currentRouteName()))
                {{ Breadcrumbs::render() }}
            @endif

            <div class="clearfix grid-width-100"></div>

            @yield('content_header')

            <div class="clearfix grid-width-100"></div>
        </section>

        <!-- Main content -->
        <section class="content">
            @include('notifications::flash')

            @yield('content')
        </section>
    </div>
    <!-- /.content-wrapper -->

    <!-- =============================================== -->

@include('layouts.dashboard.footer')

<!-- =============================================== -->

    @include('dashboard.control')

</div>
<!-- ./wrapper -->

</body>

