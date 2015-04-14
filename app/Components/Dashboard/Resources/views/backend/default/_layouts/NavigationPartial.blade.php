<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{route('backend.home')}}">Memorials Admin Panel</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> {{ \Auth::user()->name }} <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a></li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a></li>
                <li><a href="{{route('home')}}"><i class="fa fa-gear fa-fw"></i> Homepage</a></li>
                <li class="divider"></li>
                <li><a href="{{route('backend.auth.getLogout')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="{{route('backend.home')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <!-- User -->
                <li>
                    <a href="{{route('backend.user.index')}}"><i class="fa fa-user fa-fw"></i> Users<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{route('backend.user.index')}}">List Users</a>
                        </li>
                        <li>
                            <a href="{{route('backend.user.create')}}">Add New</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <!-- End User -->
                <!-- Memorials -->
                <li>
                    <a href="{{route('backend.memorial.index')}}"><i class="fa fa-book fa-fw"></i> Memorials<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{route('backend.memorial.index')}}">List Memorials</a>
                        </li>
                        <li>
                            <a href="{{route('backend.memorial.create')}}">Add New</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <!-- End Memorials -->
                <!-- Services -->
                <li>
                    <a href="{{route('backend.service.index')}}"><i class="fa fa-cog fa-fw"></i> Services<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{route('backend.service.index')}}">List Services</a>
                        </li>
                        <li>
                            <a href="{{route('backend.service.create')}}">Add New</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <!-- End Services -->
                <!-- Flowers -->
                <li>
                    <a href="{{route('backend.flower.index')}}"><i class="fa fa-yelp fa-fw"></i> Flowers<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{route('backend.flower.index')}}">List Flowers</a>
                        </li>
                        <li>
                            <a href="{{route('backend.flower.create')}}">Add New</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <!-- End Flowers -->
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
