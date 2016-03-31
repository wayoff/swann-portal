@include('layouts._header')
@include('layouts._navbar')
@include('layouts._sidebar')
    <div class="container Home__Container">
        @yield('content')
    </div>
@include('layouts._footer')