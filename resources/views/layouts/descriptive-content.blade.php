@include('layouts._header')
@include('layouts._navbar')
    <div class="container Home__Container" id="Main__Content">
        <div class="row background-white">
            <div class="col-md-12 Page__Title--Container">
                <h1 class="Page__Title">@yield('Page__Title')</h1>
                <p class="Page__Title--Description">
                    @yield('Page__Description')
                </p>
                <hr />
            </div>

            <div class="col-md-12">
                @yield('Page__BreadCrumbs')
            </div>

            <div class="col-md-12">
                @yield('content')
            </div>
        </div>
    </div>
@include('layouts._footer');