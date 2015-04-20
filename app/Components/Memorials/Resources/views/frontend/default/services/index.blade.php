@extends('Dashboard::frontend.default.master')

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
                <div class="block block-2 block-services-list">
                    <div class="block-header title-center">
                        <h3 class="block-title">Services</h3>
                        <div class="block-sub-title">Our partners provide users with services related to the graves </div>
                    </div>
                    <div class="content">
                        <div class="services-list">
                        @foreach($services as $service)
                            <div class="service-teaser col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                <div class="service-inner">
                                    <img alt="" src="{{asset($service->image)}}">
                                    <h3 class="title">{{$service->title}}</h3>
                                    <div class="text">
                                        {!! $service->description !!}
                                    </div>
                                    <p><a href="{{route('memorial.services.bid', [str_slug($memorial->name), $memorial->id, $service->id])}}" class="btn btn-info btn-bid">Get A Bid</a></p>
                                </div>
                            </div>
                        @endforeach
                            <div class="service-teaser col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                <div class="service-inner">
                                    <img alt="" src="{{asset('templates/frontend/default/images/services/2.png')}}">
                                    <h3 class="title">Order Flowers</h3>
                                    <div class="text">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan  dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan.</p>
                                    </div>
                                    <p><a href="{{route('memorial.flowers',[str_slug($memorial->name), $memorial->id])}}" class="btn btn-info btn-bid">Buy</a></p>
                                </div>
                            </div>
                        </div>

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
