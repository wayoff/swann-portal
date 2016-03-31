@include('admin.layouts._header')
<body>
    <div id="wrapper">
            @include('admin.layouts._navbar')
            <div id="page-wrapper">
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                @yield('Page__Description')
                            </h1>
                            @yield('Breadcrumb')
                        </div>

                        <div class="col-lg-12">
                            @yield('Content')
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
        </div>
</body>
@include('admin.layouts._footer')