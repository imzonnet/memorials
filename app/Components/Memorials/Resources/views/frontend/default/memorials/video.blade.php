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

    <!-- Memorial Navigation -->
    @include('Memorials::frontend.default.memorials._NavigationMemorial')

    <section id="section-main-content" class="section clearfix">
        <div class="container">
            <div class="row">
                <div class="block photo-albums">
                    <h2 class="block-title">Videos</h2>
                    <div class="content">
                        <div id="photo-list" class="photo-list">
                            <div class="photo-item col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                <div class="photo-item-inner">
                                    <div class="header">
                                        <a href="#"><img src="{{get_template_directory() . '/images/album.png'}}" alt=""/></a>
                                        <ul class="info">
                                            <li class="name"><a href="#">Family Photos</a></li>
                                            <li class="comment-count"><a href="#"><i class="fa fa-video-camera"></i> 0:19:22</a></li>
                                        </ul>
                                    </div>
                                    <ul class="author">
                                        <li><i class="fa fa-user"></i> Marie Herreford Johnson</li>
                                        <li><i class="fa fa-calendar"></i> 09.02.2015</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="photo-item col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                <div class="photo-item-inner">
                                    <div class="header">
                                        <a href="#"><img src="{{get_template_directory() . '/images/album2.jpg'}}" alt=""/></a>
                                        <ul class="info">
                                            <li class="name"><a href="#">Family Photos</a></li>
                                            <li class="comment-count"><a href="#"><i class="fa fa-comment-o"></i> 1.540</a></li>
                                        </ul>
                                    </div>
                                    <ul class="author">
                                        <li><i class="fa fa-user"></i> Marie Herreford Johnson</li>
                                        <li><i class="fa fa-calendar"></i> 09.02.2015</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="photo-item col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                <div class="photo-item-inner">
                                    <div class="header">
                                        <a href="#"><img src="{{get_template_directory() . '/images/album.png'}}" alt=""/></a>
                                        <ul class="info">
                                            <li class="name"><a href="#">Family Photos</a></li>
                                            <li class="comment-count"><a href="#"><i class="fa fa-comment-o"></i> 1.540</a></li>
                                        </ul>
                                    </div>
                                    <ul class="author">
                                        <li><i class="fa fa-user"></i> Marie Herreford Johnson</li>
                                        <li><i class="fa fa-calendar"></i> 09.02.2015</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="photo-item col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                <div class="photo-item-inner">
                                    <div class="header">
                                        <a href="#"><img src="{{get_template_directory() . '/images/album2.jpg'}}" alt=""/></a>
                                        <ul class="info">
                                            <li class="name"><a href="#">Family Photos</a></li>
                                            <li class="comment-count"><a href="#"><i class="fa fa-comment-o"></i> 1.540</a></li>
                                        </ul>
                                    </div>
                                    <ul class="author">
                                        <li><i class="fa fa-user"></i> Marie Herreford Johnson</li>
                                        <li><i class="fa fa-calendar"></i> 09.02.2015</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="photo-item col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                <div class="photo-item-inner">
                                    <div class="header">
                                        <a href="#"><img src="{{get_template_directory() . '/images/album.png'}}" alt=""/></a>
                                        <ul class="info">
                                            <li class="name"><a href="#">Family Photos</a></li>
                                            <li class="comment-count"><a href="#"><i class="fa fa-comment-o"></i> 1.540</a></li>
                                        </ul>
                                    </div>
                                    <ul class="author">
                                        <li><i class="fa fa-user"></i> Marie Herreford Johnson</li>
                                        <li><i class="fa fa-calendar"></i> 09.02.2015</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="photo-item col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                <div class="photo-item-inner">
                                    <div class="header">
                                        <a href="#"><img src="{{get_template_directory() . '/images/album2.jpg'}}" alt=""/></a>
                                        <ul class="info">
                                            <li class="name"><a href="#">Family Photos</a></li>
                                            <li class="comment-count"><a href="#"><i class="fa fa-comment-o"></i> 1.540</a></li>
                                        </ul>
                                    </div>
                                    <ul class="author">
                                        <li><i class="fa fa-user"></i> Marie Herreford Johnson</li>
                                        <li><i class="fa fa-calendar"></i> 09.02.2015</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="photo-item col-md-3 col-lg-3 col-sm-3 col-xs-12">
                                <div class="photo-item-inner">
                                    <div class="header">
                                        <a href="#"><img src="{{get_template_directory() . '/images/album2.jpg'}}" alt=""/></a>
                                        <ul class="info">
                                            <li class="name"><a href="#">Family Photos</a></li>
                                            <li class="comment-count"><a href="#"><i class="fa fa-comment-o"></i> 1.540</a></li>
                                        </ul>
                                    </div>
                                    <ul class="author">
                                        <li><i class="fa fa-user"></i> Marie Herreford Johnson</li>
                                        <li><i class="fa fa-calendar"></i> 09.02.2015</li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- /#photo-list -->
                    </div>
                    <div class="footer">
                        <button class="btn btn-info btn-lg">Load More Images</button>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /#section-main-content-->

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
