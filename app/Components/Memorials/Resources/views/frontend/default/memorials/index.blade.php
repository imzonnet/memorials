@extends('Dashboard::frontend.default.master')

@section('title')
    Welcome to Memorials
@stop

@section('content')

    <section id="section-search" class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12 col-md-offset-2 col-lg-offset-2">
                    <div class="block search-memorial-form">
                        <form action="#" method="post">
                            <div class="input-group input-group-lg">
                                <input type="text" class="form-control" placeholder="Search for Memorial Page">
                                  <span class="input-group-btn">
                                    <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                                  </span>
                            </div><!-- /input-group -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /#section-search -->

    <section class="memorial-wrap section" style="background-image: url('{{get_template_directory() . '/images/profile-bg.png'}}')">
        <div class="container-fluid">
            <div class="row memorial-header">
                <div class="container">
                    <div class="row">
                        <div class="avatar col-md-3 col-lg-3 col-sm-12 col-xs-12">
                            <a href="#"><img src="{{get_template_directory() . '/images/user.jpg'}}" alt="Hello"/></a>
                        </div>
                        <div class="info col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <h2 class="name">Marianne Ada Walker</h2>
                            <ul class="memorial-date date-group list-unstyled list-inline">
                                <li class="birthday">11. 12. 1920</li>
                                <li class="death">09. 06. 2014</li>
                            </ul>
                            <div class="maried">Maried to <a href="#">Marie  Johnson</a></div>
                            <div class="buried-address">Burried in Gufuneskirkjugarður, Grave nr.: E-11-175</div>
                            <button class="btn btn-default">Find on map <i class="fa fa-map-marker"></i></button>
                        </div>
                        <div class="relationship col-md-3 col-lg-3 col-sm-12 col-xs-12">
                            <div class="relationship-list">
                                <h3 class="title">Connected Users <span class="label label-info">102</span></h3>
                                <ul class="users-list">
                                    <li><a href="#"><img src="{{get_template_directory() . '/images/user.png'}}" alt="User Name"/></a></li>
                                    <li><a href="#"><img src="{{get_template_directory() . '/images/c1.jpg'}}" alt="User Name"/></a></li>
                                    <li><a href="#"><img src="{{get_template_directory() . '/images/c1.jpg'}}" alt="User Name"/></a></li>
                                    <li><a href="#"><img src="{{get_template_directory() . '/images/c1.jpg'}}" alt="User Name"/></a></li>
                                    <li><a href="#"><img src="{{get_template_directory() . '/images/c1.jpg'}}" alt="User Name"/></a></li>
                                    <li class="view-more"><a href="#"><span>99+</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row memorial-navigation">
                <div class="container">
                    <div class="row">
                        <ul class="menu">
                            <li class="active"><a href="#"><i class="fa fa-user"></i><span>Profile</span></a></li>
                            <li><a href="#"><i class="fa fa-file"></i><span>Biography</span></a></li>
                            <li><a href="#"><i class="fa fa-camera"></i><span>Photos</span></a></li>
                            <li><a href="#"><i class="fa fa-video-camera"></i><span>Videos</span></a></li>
                            <li><a href="#"><i class="fa fa-book"></i><span>Guestbook</span></a></li>
                            <li><a href="#"><i class="fa fa-group"></i><span>Family</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /#memorial -->

    <section id="section-main-content" class="section clearfix">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="biography-teaser">
                        <h2>Biografi</h2>
                        <ul class="info">
                            <li class="date"><i class="fa fa-calendar"></i> 09. 02. 2015</li>
                            <li class="marie"><i class="fa fa-user"></i> Marie Herreford Johnson</li>
                        </ul>
                        <div class="content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio.</p>
                            <a href="#" class="readmore btn btn-white-black">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="guestbook-block">
                        <h3 class="block-title">Guestbook <a href="#"><span class="label label-info">Write new message <i class="fa fa-plus"></i></a></span></h3>
                        <div class="content">
                            <div class="guestbook-teaser">
                                <div class="header">
                                    <img src="{{get_template_directory() . '/images/guestbook.png'}}" alt=""/>
                                    <div class="title">
                                        <h3>Lilly Mc Marrod Johnson</h3>
                                        <div class="date death"><i class="fa fa-calendar"></i> 09. 02. 2015</div>
                                    </div>
                                </div>
                                <div class="info">
                                    <h3>Title goes here</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan  dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan.</p>
                                    <a href="#" class="readmore btn btn-info">Read More</a>
                                </div>
                            </div>

                            <div class="guestbook-teaser">
                                <div class="header">
                                    <img src="{{get_template_directory() . '/images/guestbook.png'}}" alt=""/>
                                    <div class="title">
                                        <h3>Lilly Mc Marrod Johnson</h3>
                                        <div class="date death"><i class="fa fa-calendar"></i> 09. 02. 2015</div>
                                    </div>
                                </div>
                                <div class="info">
                                    <h3>Title goes here</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan  dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan.</p>
                                    <a href="#" class="readmore btn btn-info">Read More</a>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="btn btn-primary btn-lg">Go to guestbook</a>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /#section-main-content-->

    <section id="section-gallery" class="section bg-blue">
        <div class="container">
            <div class="row">
                <div class="block block-gallery-list">
                    <div class="block-header title-center">
                        <h3 class="block-title white">Photo Gallery</h3>
                        <div class="block-icon white-blue"><span><i class="fa fa-group"></i></span></div>
                    </div>
                    <div class="block-content">
                        <div class="gallery-list row">
                            <div class="gallery-items col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                <div class="item large">
                                    <img src="{{get_template_directory() . '/images/user.jpg'}}" alt=""/>
                                    <h3 class="name">Marino him self in 2007</h3>
                                </div>
                                <div class="item">
                                    <img src="{{get_template_directory() . '/images/p1.png'}}" alt=""/>
                                    <h3 class="name">Marino him self in 2007</h3>
                                </div>
                                <div class="item">
                                    <img src="{{get_template_directory() . '/images/p2.png'}}" alt=""/>
                                    <h3 class="name">Marino him self in 2007</h3>
                                </div>
                            </div>
                            <div class="gallery-items col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                <div class="item large">
                                    <img src="{{get_template_directory() . '/images/user.jpg'}}" alt=""/>
                                    <h3 class="name">Marino him self in 2007</h3>
                                </div>
                                <div class="item">
                                    <img src="{{get_template_directory() . '/images/p1.png'}}" alt=""/>
                                    <h3 class="name">Marino him self in 2007</h3>
                                </div>
                                <div class="item">
                                    <img src="{{get_template_directory() . '/images/next-photo.png'}}" alt="View More"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /#section-gallery-->

    <section id="section-timeline" class="section bg-dark">
        <div class="container">
            <div class="row">
                <div class="block block-life-timeline">
                    <div class="block-header title-center">
                        <h3 class="block-title white">Life Timeline</h3>
                        <div class="block-icon white-dark"><span><i class="fa fa-clock-o"></i></span></div>
                    </div>
                    <div class="block-content">
                        <ul class="bxslider timeline-list">
                            <li>
                                <div class="timeline-item">
                                    <h2 class="date">1922</h2>
                                    <h3 class="title">Born in Reykjavík, Iceland</h3>
                                    <a href="#" class="btn btn-dafault">Read More</a>
                                </div>
                            </li>
                            <li>
                                <div class="timeline-item">
                                    <h2 class="date">1922</h2>
                                    <h3 class="title">Born in Reykjavík, Iceland</h3>
                                    <a href="#" class="btn btn-dafault">Read More</a>
                                </div>
                            </li>
                            <li>
                                <div class="timeline-item">
                                    <h2 class="date">1922</h2>
                                    <h3 class="title">Born in Reykjavík, Iceland</h3>
                                    <a href="#" class="btn btn-dafault">Read More</a>
                                </div>
                            </li>
                            <li>
                                <div class="timeline-item">
                                    <h2 class="date">1922</h2>
                                    <h3 class="title">Born in Reykjavík, Iceland</h3>
                                    <a href="#" class="btn btn-dafault">Read More</a>
                                </div>
                            </li>
                            <li>
                                <div class="timeline-item">
                                    <h2 class="date">1922</h2>
                                    <h3 class="title">Born in Reykjavík, Iceland</h3>
                                    <a href="#" class="btn btn-dafault">Read More</a>
                                </div>
                            </li>
                            <li>
                                <div class="timeline-item">
                                    <h2 class="date">1922</h2>
                                    <h3 class="title">Born in Reykjavík, Iceland</h3>
                                    <a href="#" class="btn btn-dafault">Read More</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section><!-- /#section-timeline -->

    <section id="section-introduction" class="section bg-blue">
        <div class="container">
            <div class="row">
                <div class="block block-introduction">
                    <div class="block-header">
                        <h2 class="block-title"><strong>QR-Code</strong> for Gravestone</h2>
                    </div>
                    <div class="block-content">
                        <div class="row">
                            <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio.</p>
                                <a href="#" class="btn btn-default btn-slg">PRICING</a> <a href="#" class="btn btn-black btn-slg">SINGUP NOW</a>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /#section-introduction -->

@stop