<header id="navigation" class="exp-section">
    <div class="container">
        <div class="row">
            <div class="navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><img src="{{get_template_directory() . '/images/logo.png'}}" alt="" /></a>
                </div>
                <nav class="collapse navbar-collapse" role="navigation">
                    <ul id="menu-primary-navigation" class="menu nav navbar-nav">
                        <li class="current-menu-item"><a href="{{url('home')}}">Home</a></li>
                        <li><a href="{{url('memorial')}}">Memorials</a></li>
                        <li><a href="#">About Us</a>
                            <ul class="sub-menu">
                                <li><a href="#">Pricing</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Pricing</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                    <div class="user-login-form">
                        <a href="#"><i class="fa fa-user"></i></a>
                    </div>
                </nav>
            </div><!-- end menu -->
        </div>
    </div>
</header><!--#navigation-->