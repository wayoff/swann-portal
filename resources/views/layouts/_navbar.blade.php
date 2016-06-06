@if($admin)
    <meta id="user" data-content="{{json_encode($admin->toArray())}}">
@endif

<meta id="announcement" data-content="{{ !empty($announcement) ? json_encode($announcement->toArray()) : json_encode([])}}">

<div class="navbar navbar-inverse Navbar" role="navigation">
    @if(!empty($announcement))
        <div class="Annimate__Container">
            <div class="container hidden-sm hidden-xs">
                <!-- <div class="Annimate">
                    <h4 class="Annimate__Text">
                        text here
                    </h4>
                </div> -->

                <marquee behavior="scroll" direction="left" class="Annimate__Text" id="Annimate__Text">
                </marquee>
            </div>
        </div>
    @endif
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
                            @foreach($categories->sortBy('order') as $category)
                                @if($category->children->count() === 0)
                                    <li>
                                        <a href="{{ route('categories.{id}.products.index', $category->id) }}">
                                            {{ $category->name }}
                                        </a>
                                    </li>
                                @else
                                    <li class="dropdown-submenu">
                                        <a href="{{ route('categories.{id}.products.index', $category->id) }}"> {{ $category->name }} </a>
                                        <ul class="dropdown-menu Navbar__Menu--Dropdown">
                                            @foreach($category->children->sortBy('order') as $children)

                                                @if($children->children->count() === 0)
                                                    <li>
                                                        <a href="{{ route('categories.{id}.products.index', $children->id) }}">
                                                            {{ $children->name }}
                                                        </a>
                                                    </li>
                                                @else
                                                    <li class="dropdown-submenu">
                                                        <a href="{{ route('categories.{id}.products.index', $children->id) }}"> {{ $children->name }} </a>
                                                        <ul class="dropdown-menu Navbar__Menu--Dropdown">
                                                            @foreach($children->children->sortBy('order') as $grand)
                                                                <li>
                                                                    <a href="{{ route('categories.{id}.products.index', $grand->id) }}">
                                                                        {{$grand->name}}
                                                                    </a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                    <!-- <li><a href="#">Support</a></li> -->
                    <li><a href="{{ url('news') }}">News</a></li>
                    <li class="dropdown">
                        <a href="#"> Policy <b class="caret"></b></a>
                        <ul class="dropdown-menu Navbar__Menu--Dropdown">
                            @foreach($policyCategories as $policyCategory)
                                <li class="dropdown-submenu">
                                    <a href="#">
                                        {{$policyCategory->name}}
                                    </a>
                                    <ul class="dropdown-menu Navbar__Menu--Dropdown">
                                        @foreach($policyCategory->children as $child)
                                            <li>
                                                <a href="{{url('warranties/' . $child->id)}}">
                                                    {{$child->name}}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                            
                            @foreach($warranties as $warranty)
                                <li>
                                    <a target="_blank" 
                                        href="{{$warranty->document->getDocument()}}">
                                        {{$warranty->name}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>


                    @if($admin)
                        <li><a href="{{url('lmi-sessions')}}">LMI</a></li>
                    @endif

                    <li class="dropdown">
                        <a href="#"> Time Zones <b class="caret"></b></a>
                        <ul class="dropdown-menu Navbar__Menu--Dropdown">
                            <!-- <li><a href="/timezone/australia">Australia</a></li> -->
                            <!-- <li><a href="/timezone/united-kingdom">United Kingdom</a></li> -->
                            <li><a href="/timezone/united-states">United States</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#"> SwannPH <b class="caret"></b></a>
                        <ul class="dropdown-menu Navbar__Menu--Dropdown">
                            <li><a data-toggle="modal" href='#schedule_modal' id="_schedule"> Schedule </a></li>
                        </ul>
                    </li>

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
                                Account <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu Navbar__Menu--Dropdown" role="menu">
                                @if(!$admin->role_id)
                                    <li>
                                        <a href="{{ url('/admin') }}">
                                            <i class="fa fa-btn fa-desktop"></i>
                                            Dashboard
                                        </a>
                                    </li>
                                @endif
                                @if($admin)
                                    <li>
                                        <a href="#supervisor_password_modal" id="_terms" data-toggle="modal" >
                                            Supervisor
                                        </a>
                                    </li>
                                @endif
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