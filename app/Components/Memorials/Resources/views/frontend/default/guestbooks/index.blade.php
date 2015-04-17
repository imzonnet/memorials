@extends('Memorials::frontend.default.master')

@section('title')
    Guestooks | Memorials
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
                <div class="block guestbooks-list">
                    <h2 class="block-title">Guestbook
                        <a href="#"><span class="label label-info ">Write new message <i class="fa fa-plus"></i></span></a>
                    </h2>
                    <div class="content">
                        <div id="guestbooks-list">
                            @foreach($guestbooks as $guestbook)
                            <div class="guestbook-teaser-wrap col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                <div class="guestbook-teaser">
                                    <div class="header">
                                        <img alt="" src="{{$guestbook->user->avatar}}">
                                        <div class="title">
                                            <h3>{{$guestbook->user->name}}</h3>
                                            <div class="date death"><i class="fa fa-calendar"></i> {{$guestbook->created_at}}</div>
                                        </div>
                                    </div>
                                    <div class="info">
                                        <h3>{{$guestbook->title}}</h3>
                                        <div class="readmore">
                                            {!! $guestbook->description !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div><!-- /#photo-list -->
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

@section('scripts')
    <script>
        $(function(){
            $('div.readmore').readmore({
                collapsedHeight: 60,
                moreLink: '<p><a href="#" class="btn btn-info">Read more</a></p>',
                lessLink: '<p><a href="#" class="btn btn-info">Close</a></p>'
            });
        });
    </script>

@stop