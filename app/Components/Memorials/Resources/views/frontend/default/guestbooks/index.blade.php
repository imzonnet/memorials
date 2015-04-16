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
                            <div class="photo-item col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                <div class="guestbook-teaser">
                                    <div class="header">
                                        <img alt="" src="http://lorempixel.com/299/235/people/?10021">
                                        <div class="title">
                                            <h3>Lambert Block IV</h3>
                                            <div class="date death"><i class="fa fa-calendar"></i> 16. 08. 1971</div>
                                        </div>
                                    </div>
                                    <div class="info">
                                        <h3>Dr. Alysa Considine</h3>
                                        <p>Saepe quo rem cumque quod. Est similique aliquam et nulla. Temporibus eum qui dolores adipisci offic...</p>
                                        <a class="readmore btn btn-info" href="#">Read More</a>
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
    <script type="text/javascript" src="{{asset('assets/fancybox/helpers/jquery.fancybox-media.js?v=2.1.5')}}"></script>
@stop