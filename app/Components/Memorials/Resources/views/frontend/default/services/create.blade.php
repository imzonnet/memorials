@extends('Dashboard::frontend.default.master')

@section('title')
    Service Order Page | Memorials
@stop

@section('content')

    <!-- Memorial Navigation -->
    @include('Memorials::frontend.default.memorials._NavigationMemorial')

    <section id="section-main-content" class="section clearfix">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 col-md-offset-3 col-lg-offset-3">
                    <div class="service-bid-wrap">
                        <div class="header">
                            <img src="{{asset($service->image)}}" alt="{{$service->title}}"/>
                            <h2 class="title">{{$service->title}}</h2>
                            <div class="text">
                                {!! $service->description !!}
                            </div>
                        </div>
                        <div class="content">
                            {!! Form::open(['route' => ['memorial.services.bid', str_slug($memorial->name), $memorial->id, $service->id], 'method'=>'post', 'class' => 'form-custom']) !!}
                            {!! Form::hidden('mem_id', $memorial->id) !!}
                            {!! Form::hidden('service_id', $service->id) !!}
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                {!!Form::text('contact_name', old('contact_name'), ['class' => 'form-control','placeholder' => 'Full Name'] ) !!}
                            </div>
                            {!! $errors->first('contact_name', '<p class="help-block error">:message</p>') !!}
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                {!!Form::text('contact_email', old('contact_email'), ['class' => 'form-control','placeholder' => 'Email ']) !!}
                            </div>
                            {!! $errors->first('contact_email', '<p class="help-block error">:message</p>') !!}
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                {!!Form::text('contact_phone', old('contact_phone'), ['class' => 'form-control','placeholder' => 'Phone'] ) !!}
                            </div>
                            {!! $errors->first('contact_phone', '<p class="help-block error">:message</p>') !!}
                            <div class="form-group textarea-group">
                                <span class="textarea-icon"><i class="fa fa-file-text"></i></span>
                                {!!Form::textarea('message', old('message'), ['class' => 'form-control', 'placeholder' => 'Write Message'] ) !!}
                            </div>
                            {!! $errors->first('message', '<p class="help-block error">:message</p>') !!}
                            <div class="form-group btn-action">
                                {!! Form::button('Cancel', ['class' => 'btn btn-cancel', 'onclick' => 'window.history.back()']) !!}
                                {!! Form::submit('Send', ['class' => 'btn btn-info', 'name' => 'create']) !!}
                            </div>
                            {!! Form::close() !!}
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