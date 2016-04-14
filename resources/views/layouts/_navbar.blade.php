<div class="navbar navbar-inverse Navbar" role="navigation">
    <div class="container">
        <div class="Navbar__Technical--Support-Container">
            <h1 class="Navbar__Technical--Support hidden-sm hidden-xs">
                Internal KBaze
            </h1>
        </div>
        <ul class="Navbar__Contact--List">
            <li>
                <a 
                    href="https://secure.logmeinrescue.com/Customer/Code.aspx" 
                    data-toggle="tooltip" 
                    data-placement="bottom"
                    title="LogMeIn123.com"
                    target="_blank" 
                 >
                    <img src="/img/LMI-icon.png" alt="LogMeIn Icon" height="18" width="18">
                </a>
            </li>
        </ul>
    </div>
    <div class="Navbar__Main">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header Navbar__Header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand Navbar__Brand--Anchor" href="/">
                    <img src="/img/swann-logo.png" class="Navbar__Brand-Image" alt="Swann Logo">
                    <!-- <div class="pull-right Navbar__Brand-Title-Container">
                        <span class="Navbar__Brand-Title"> Technical Support</span>
                    </div> -->
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse  navbar-ex1-collapse">
                <ul class="nav navbar-nav navbar Navbar__Menu">
                    <li><a href="/">Home</a></li>
                    <li class="dropdown">
                        <a href="{{route('products.index')}}"> Products <b class="caret"></b></a>
                        <ul class="dropdown-menu Navbar__Menu--Dropdown">
                            @foreach($categories as $category)
                                <li><a href="{{ route('categories.{id}.products.index', $category->id) }}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <!-- <li><a href="#">Support</a></li> -->
                    <li><a href="{{ url('news') }}">News & Updates</a></li>
                    @if(!$warranties->isEmpty())
                    <li class="dropdown">
                        <a href="#"> Warranty <b class="caret"></b></a>
                        <ul class="dropdown-menu Navbar__Menu--Dropdown">
                            <!-- <li>
                                <a href="#"> Warranty Procedure <b class="right-caret"></b></a>
                            </li> -->
                            <li><a href="#">Warranty Procedure</a></li>
                            <li class="nav-divider"></li>
                            @foreach($warranties->where('warranty_procedure', 1)->all() as $warrantyProcedure)
                            <li>
                                <a target="_blank" 
                                    href="{{$warrantyProcedure->document->getDocument()}}">
                                    {{$warrantyProcedure->name}}
                                </a>
                            </li>
                            @endforeach
                            <li class="nav-divider"></li>
                            @foreach($warranties->where('warranty_procedure', 0)->all() as $warrantyNonProcedure)
                            <li>
                                <a target="_blank" 
                                    href="{{$warrantyNonProcedure->document->getDocument()}}">
                                    {{$warrantyNonProcedure->name}}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    @endif
                    <li><a href="#">LMI Sessions</a></li>
                    <li class="dropdown">
                        <a href="#"> Time Zones <b class="caret"></b></a>
                        <ul class="dropdown-menu Navbar__Menu--Dropdown">
                            <li><a href="#">Australia</a></li>
                            <li><a href="#">United Kingdom</a></li>
                            <li><a href="#">United States</a></li>
                        </ul>
                    </li>
                    <!-- <li><a href="#">Company</a></li> -->
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar navbar-right Navbar__Menu">
                    <!-- Authentication Links -->
                    <li><a href="/search"> Search </a></li>
                    @if (!$admin)
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <!-- <li><a href="{{ url('/register') }}">Register</a></li> -->
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ $admin->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu Navbar__Menu--Dropdown" role="menu">
                                <li><a href="{{ url('/admin') }}"><i class="fa fa-btn fa-desktop"></i>Dashboard</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
                <!-- 
                <form action="/search" class="navbar-form pull-right" method="get">
                    <input type="text" 
                            name="q" 
                            style="width: 200px;" 
                            id="Navbar__Form--input" 
                            class="form-control Navbar__Form--input typeahead"
                            autocomplete="off"
                            data-provide="typeahead"
                    >
                </form>
                 -->
            </div><!-- /.navbar-collapse -->
        </div>
    </div>
</div>