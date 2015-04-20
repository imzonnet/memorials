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
                <div class="block block-2 block-flowers-list">
                    <div class="block-header title-center">
                        <h3 class="block-title"><img src="{{asset(get_template_directory() .'/images/flowers/icon.png')}}" alt=""/> <br />Order Flowers To Be Put On Grave</h3>
                    </div>
                    <div class="content">
                        <div class="flowers-list services-list">
                        @foreach($flowers as $flower)
                            <div class="service-teaser col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                <div class="service-inner">
                                    <h2 class="title">{{$flower->title}}</h2>
                                    @foreach($flower->items->take(2) as $item)
                                        <div class="item-box">
                                            <img alt="" src="{{asset($item->image)}}">
                                            <h3>{{$item->title}}</h3>
                                        </div>
                                    @endforeach
                                    <div class="price">Price {!! $flower->price !!}</div>
                                    <p><a href="{{route('memorial.flower.bid', [str_slug($memorial->name), $memorial->id, $flower->id])}}" class="btn btn-info btn-bid">Get A Bid</a></p>
                                </div>
                            </div>
                        @endforeach
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
