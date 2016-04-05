 <!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top Navbar" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand Navbar__Brand" href="/admin"> Swann Portal </a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav Navbar__Menu">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ $admin->name }} <b class="caret"></b></a>
            <ul class="dropdown-menu Navbar__Menu--Dropdown">
                <!-- <li>
                    <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                </li>
                <li class="divider"></li> -->
                <li>
                    <a href="/logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav Navbar__Menu">
            <li>
                <a href="/admin/dashboard"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>
            <li>
                <a href="/admin/products"><i class="fa fa-fw fa-book"></i> Products</a>
            </li>
            <li>
                <a href="/admin/categories"><i class="fa fa-fw fa-table"></i> Categories</a>
            </li>
            <li>
                <a href="/admin/questions"><i class="fa fa-fw fa-question"></i> Questions</a>
            </li>
            <li>
                <a href="/admin/sliders"><i class="fa fa-fw fa-desktop"></i> Sliders</a>
            </li>
            <li>
                <a href="/admin/videos"><i class="fa fa-fw fa-video-camera"></i> Videos</a>
            </li>
            <li>
                <a href="/admin/news"><i class="fa fa-fw fa-file"></i> News</a>
            </li>
            <li>
                <a href="/admin/users"><i class="fa fa-fw fa-users"></i> Users</a>
            </li>
            <li>
                <a href="/"><i class="fa fa-fw fa-home"></i> Home</a>
            </li>
            <!-- <li>
                <a href="forms.html"><i class="fa fa-fw fa-edit"></i> Forms</a>
            </li>
            <li>
                <a href="bootstrap-elements.html"><i class="fa fa-fw fa-desktop"></i> Bootstrap Elements</a>
            </li>
            <li>
                <a href="bootstrap-grid.html"><i class="fa fa-fw fa-wrench"></i> Bootstrap Grid</a>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="demo" class="collapse">
                    <li>
                        <a href="#">Dropdown Item</a>
                    </li>
                    <li>
                        <a href="#">Dropdown Item</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="blank-page.html"><i class="fa fa-fw fa-file"></i> Blank Page</a>
            </li>
            <li>
                <a href="index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> RTL Dashboard</a>
            </li> -->
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>