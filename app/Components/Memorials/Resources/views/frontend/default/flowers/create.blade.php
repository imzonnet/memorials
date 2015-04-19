@extends('Memorials::frontend.default.master')

@section('title')
    Flower Order Page | Memorials
@stop

@section('content')

    <!-- Memorial Navigation -->
    @include('Memorials::frontend.default.memorials._NavigationMemorial')

    <section id="section-main-content" class="section clearfix">
        <div class="container">
            <div class="row">
                <div class="block flower-bid-wrap">
                    <div class="block-header title-center">
                        <h2 class="block-title">Contact Information</h2>
                        <div class="block-sub-title">Lorem ipsum dolor sit amet, at eam recusabo suavitate, ne has apeirian<br />sapientem accusamus.Te postulant evertitur eum. An has indoctum partiendo mnesarchum. Te quando copiosae cum.</div>
                    </div>
                    <div class="content">
                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                            <div class="flower-order services-list">
                                <div class="service-teaser">
                                    <div class="service-inner">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h2 class="title">{{$flower->title}}</h2>
                                                <span>{{$flower->stock}} stk Available</span>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="price">Price {!! $flower->price !!}</div>
                                            </div>
                                        </div>
                                        <div class="description">
                                            {!! $flower->description !!}
                                        </div>
                                        @foreach($flower->items->take(2) as $item)
                                            <div class="item-box">
                                                <img alt="" src="{{asset($item->image)}}">
                                                <h3>{{$item->title}}</h3>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flower-contact-form col-md-8 col-lg-8 col-sm-12 col-xs-12">
                            {!! Form::open(['route' => ['memorial.flower.bid', str_slug($memorial->name), $memorial->id, $flower->id], 'method'=>'post', 'class' => 'form-custom']) !!}
                            {!! Form::hidden('mem_id', $memorial->id) !!}
                            {!! Form::hidden('flower_id', $flower->id) !!}
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
                            <div class="form-group">
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
