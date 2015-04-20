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
                <div class="block guestbooks-list">
                    <div class="block-header">
                        <h2 class="block-title">Write new message</h2>
                    </div>
                    <div class="content">
                        <div id="guestbooks-list">
                            {!! Form::open(['route' => ['memorial.guestbooks.store', str_slug($memorial->name),$memorial->id], 'method' => 'POST']) !!}
                            {!! Form::hidden('mem_id', $memorial->id) !!}
                            <div class="form-group">
                                <label>Title</label>
                                {!!Form::text('title', old('title'), ['class' => 'form-control','placeholder' => 'The title...'] ) !!}
                                {!! $errors->first('title', '<span class="help-block error">:message</span>') !!}
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                {!!Form::textarea('description', old('description'), ['class' => 'form-control', 'placeholder' => 'The content'] ) !!}
                                {!! $errors->first('description', '<span class="help-block error">:message</span>') !!}
                            </div>

                            <div class="form-group">
                                {!! Form::button('Cancel', ['class' => 'btn btn-warning', 'onclick' => 'window.history.back()']) !!}
                                {!! Form::submit('Create', ['class' => 'btn btn-success', 'name' => 'create']) !!}
                            </div>
                            {!! Form::close() !!}
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