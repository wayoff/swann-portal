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
                    <a href="/"><i class="fa fa-fw fa-home"></i> Home</a>
                </li>
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
                <a href="javascript:;" data-toggle="collapse" data-target="#cat"><i class="fa fa-fw fa-arrows-v"></i> Categories <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="cat" class="collapse">
                    <li>
                        <a href="/admin/categories"><i class="fa fa-fw fa-table"></i> Product </a>
                    </li>
                    <li>
                        <a href="/admin/faq-categories"><i class="fa fa-fw fa-newspaper-o"></i> FAQ </a>
                    </li>
                    <li>
                        <a href="/admin/procedure-categories"><i class="fa fa-fw fa-university"></i> Troubleshooting </a>
                    </li>
                    <li>
                        <a href="/admin/screenshot-categories"><i class="fa fa-fw fa-cc"></i> Screenshots</a>
                    </li>
                    <li>
                        <a href="/admin/policy-categories"><i class="fa fa-fw fa-flag"></i> Policy </a>
                    </li>
                    <li>
                        <a href="/admin/specification-categories"><i class="fa fa-fw fa-gavel"></i> Specification </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#quest"><i class="fa fa-fw fa-certificate"></i> Questions <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="quest" class="collapse">
                    <li>
                        <a href="/admin/questions"><i class="fa fa-fw fa-question"></i> General </a>
                    </li>
                    <li>
                        <a href="/admin/questions/products"><i class="fa fa-fw fa-book"></i> For Products</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#hpa"><i class="fa fa-fw fa-coffee"></i> Homepage Assets <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="hpa" class="collapse">
                    <li>
                        <a href="/admin/sliders"><i class="fa fa-fw fa-desktop"></i> Sliders</a>
                    </li>
                    <li>
                        <a href="/admin/questions"><i class="fa fa-fw fa-question"></i> General Question</a>
                    </li>
                    <li>
                        <a href="/admin/videos"><i class="fa fa-fw fa-video-camera"></i> Videos</a>
                    </li>
                    <li>
                        <a href="/admin/news"><i class="fa fa-fw fa-file"></i> News</a>
                    </li>
                    <li>
                        <a href="/admin/commendations"><i class="fa fa-fw fa-user"></i> Commendation</a>
                    </li>
                    <li>
                        <a href="/admin/announcements"><i class="fa fa-fw fa-exclamation-circle"></i> Announcements</a>
                    </li>
                    <li>
                        <a href="/admin/footers"><i class="fa fa-fw fa-caret-square-o-down"></i> Footer</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="/admin/products"><i class="fa fa-fw fa-book"></i> Products</a>
            </li>
            <li>
                <a href="/admin/feedbacks"><i class="fa fa-fw fa-bolt"></i> Feedbacks</a>
            </li>

            <li>
                <a href="/admin/screenshots"><i class="fa fa-fw fa-cc"></i> Screenshots</a>
            </li>
            <li>
                <a href="/admin/procedures"><i class="fa fa-fw fa-wrench"></i> Troubleshooting</a>
            </li>
            <li>
                <a href="/admin/specifications"><i class="fa fa-fw fa-gavel"></i> Specifications</a>
            </li>
            <li>
                <a href="/admin/users"><i class="fa fa-fw fa-users"></i> Users</a>
            </li><!-- 
            <li>
                <a href="/admin/tags"><i class="fa fa-fw fa-edit"></i> Tags</a>
            </li> -->
            <li>
                <a href="/admin/warranties"><i class="fa fa-fw fa-file"></i> Warranties</a>
            </li>
            <li>
                <a href="/admin/lmi-sessions"><i class="fa fa-fw fa-eye"></i> LMI Sessions</a>
            </li>
            <li>
                <a href="/admin/schedules"><i class="fa fa-fw fa-newspaper-o"></i> Schedules </a>
            </li>
            @if($admin->id === 1 || $admin->id === 7)
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#sp"><i class="fa fa-fw fa-building"></i> Supervisor <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="sp" class="collapse">
                        <li>
                            <a href="/admin/agreement-categories"><i class="fa fa-fw fa-bookmark-o"></i> OP&P Categories </a>
                        </li>
                        <li>
                            <a href="/admin/agreements"><i class="fa fa-fw fa-bookmark-o"></i> Operations Policies & Procedures </a>
                        </li>
                        <li>
                            <a href="/admin/supervisor-passwords"><i class="fa fa-fw fa-lock"></i> Password</a>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>