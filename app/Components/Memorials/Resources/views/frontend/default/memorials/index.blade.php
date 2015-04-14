@extends('Dashboard::frontend.default.master')

@section('title')
    {{$memorial->name}}
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
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="biography-teaser">
                        <h2>Biografi</h2>
                        <ul class="info">
                            <li class="date"><i class="fa fa-calendar"></i> {{$memorial->death}}</li>
                            <li class="marie"><i class="fa fa-user"></i> Marie Herreford Johnson</li>
                        </ul>
                        <div class="content">
                            {{$memorial->biography}}
                            <p><a href="{{$memorial->present()->getBiographyPath}}" class="readmore btn btn-white-black">Read More</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="guestbook-block">
                        <h3 class="block-title">Guestbook <a href="#"><span class="label label-info">Write new message <i class="fa fa-plus"></i></a></span></h3>
                        <div class="content">
                            @foreach($guestbooks as $guestbook)
                            <div class="guestbook-teaser">
                                <div class="header">
                                    <img src="{{asset($guestbook->user->avatar)}}" alt=""/>
                                    <div class="title">
                                        <h3>{{$guestbook->user->name}}</h3>
                                        <div class="date death"><i class="fa fa-calendar"></i> {{$guestbook->created_at}}</div>
                                    </div>
                                </div>
                                <div class="info">
                                    <h3>{{$guestbook->title}}</h3>
                                    <p>{{str_limit($guestbook->description)}}</p>
                                    <a href="#" class="readmore btn btn-info">Read More</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <a href="{{$memorial->present()->getGuestbookPath}}" class="btn btn-primary btn-lg">Go to guestbook</a>
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