@include('layouts._header')
@include('layouts._navbar')
    <div class="container Home__Container">
        <div class="row background-white">
            <div class="col-md-12 Page__Title--Container">
                <h1 class="Page__Title">@yield('Page__Title')</h1>
                <p class="Page__Title--Description">
                    @yield('Page__Description')
                </p>
            </div>

            <div class="col-md-12">
                @yield('content')
            </div>
        </div>
    </div>
@include('layouts._footer');