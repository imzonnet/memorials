@extends('Memorials::frontend.default.master')

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
                            {!! str_limit($memorial->biography, 1500) !!}
                            <p><a href="{{$memorial->present()->getBiographyPath}}" class="readmore btn btn-white-black">Read More</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="guestbook-block">
                        <h3 class="block-title">Guestbook <a href="#"><span class="label label-info">Write new message <i class="fa fa-plus"></i></a></span></h3>
                        <div class="content">
                            @if(count($guestbooks) > 0)
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
                                        {!! str_limit($guestbook->description) !!}
                                        <p><a href="{{$memorial->present()->getGuestbooksPath}}" class="readmore btn btn-info">Read More</a></p>
                                    </div>
                                </div>
                                @endforeach
                            @else
                                <p>Don't have any guestbook</p>
                            @endif
                        </div>
                        <a href="{{$memorial->present()->getGuestbooksPath}}" class="btn btn-primary btn-lg">Go to guestbook</a>
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
                            @if( count($albums) > 3 )
                                @foreach($albums as $index => $album)
                                    @if($index == 0 || $index % 3 == 0)
                                        <div class="gallery-items col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                    @endif
                                            <div class="item {{$index == 0 || $index % 3 == 0 ? "large" : ''}}">
                                                <a href="{{$album->present()->getPermalink}}"><img src="{{asset($album->photoItems->first()->image)}}" alt=""/></a>
                                                <h3 class="name"><a href="{{$album->present()->getPermalink}}">{{$album->title}}</a></h3>
                                            </div>
                                            @if($index == (count($albums) - 1))
                                                <div class="item">
                                                    <a href="{{$memorial->present()->getPhotoAlbumsPath}}"><img src="{{get_template_directory() . '/images/next-photo.png'}}" alt="View More"/></a>
                                                </div>
                                            @endif
                                    @if($index != 0 && $index % 2 == 0)
                                        </div>
                                    @endif
                                @endforeach
                            @else
                                <div class="gallery-items col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                    @foreach($albums as $index => $album)
                                        <div class="item {{$index == 0 || $index % 3 == 0 ? "large" : ''}}">
                                            <a href="{{$album->present()->getPermalink}}"><img src="{{asset($album->photoItems->first()->image)}}" alt=""/></a>
                                            <h3 class="name"><a href="{{$album->present()->getPermalink}}">{{$album->title}}</a></h3>
                                        </div>
                                    @endforeach
                                        <div class="item">
                                            <a href="{{$memorial->present()->getPhotoAlbumsPath}}"><img src="{{get_template_directory() . '/images/next-photo.png'}}" alt="View More"/></a>
                                        </div>
                                </div>
                            @endif
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
                            @foreach($timelines as $timeline)
                            <li>
                                <div class="timeline-item">
                                    <h2 class="date">{{$timeline->year}}</h2>
                                    <h3 class="title">{{$timeline->title}}</h3>
                                    <a href="#" class="btn btn-dafault">Read More</a>
                                </div>
                            </li>
                            @endforeach
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