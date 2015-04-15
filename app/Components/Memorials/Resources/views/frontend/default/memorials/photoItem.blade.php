@extends('Memorials::frontend.default.master')

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
                    <h2 class="block-title">{{$album->title}}</h2>
                    <div class="content">
                        <div id="photo-list" class="photo-list">
                            @foreach($photos as $photo)
                            <div class="photo-item col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                <div class="photo-item-inner">
                                    <div class="header">
                                        <a class="btn-photo-view" data-modal="#photo-modal-{{$photo->id}}" href="{{$photo->present()->getPermalink}}" alt="{{$photo->title}}" title="Click to view full image">
                                            <img src="{{asset($photo->image)}}" alt=""/>
                                            <ul class="info">
                                                <li class="name">{{$photo->title}}</li>
                                                <li class="comment-count"><i class="fa fa-comment-o"></i> {{$photo->present()->comments_count}}</li>
                                            </ul>
                                        </a>
                                    </div>
                                    <ul class="author">
                                        <li><i class="fa fa-user"></i> {{$photo->user->name}}</li>
                                        <li><i class="fa fa-calendar"></i> {{$photo->created_at}}</li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach
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

@section('scripts')
    <script src="{{asset('assets/shuffle/modernizr.custom.min.js')}}"></script>
    <script src="{{asset('assets/shuffle/jquery.shuffle.min.js')}}"></script>
    <script>
        $(window).load(function() {
            var $grid = $('#photo-list'),
                    $sizer = $grid.find('.shuffle__sizer');

            $grid.shuffle({
                itemSelector: '.photo-item',
                sizer: $sizer
            });
        });
        $(document).ready(function(){
           $('.btn-photo-view').click(function(e){
               e.preventDefault();
               var thisEl = $(this), url = thisEl.attr('href');
               $('body').append('<div class="loading-animate"></div>');
               $.get(url, function(data){
                   $('body').append(data);
                   $('.loading-animate').fadeOut();
                   $('#photo-modal').modal();
               });
           });
            $(document).on('hidden.bs.modal', '.photo-modal', function () {
                $(this).remove();
            });
        });
    </script>
@stop