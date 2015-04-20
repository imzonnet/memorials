@extends('Dashboard::frontend.default.master')

@section('content')
<section id="section-users" class="section bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 sign-up-block"">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="sign-up-form">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="input-group input-group-lg">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            {!! Form::text('name', old('name'), ['placeholder'=>"Enter Name Here", 'class'=>"form-control"]) !!}
                        </div>
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            {!! Form::text('email', old('email'), ['placeholder'=>"Enter email address", 'class'=>"form-control"]) !!}
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="input-group input-group-lg">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    {!! Form::password('password', ['placeholder'=>"Choose Password", 'class'=>"form-control"]) !!}
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="input-group input-group-lg">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    {!! Form::password('password_confirmation', ['placeholder'=>"Re-Type Password", 'class'=>"form-control"]) !!}
                                </div>
                            </div>
                        </div>

                        <div class="input-group input-group-lg">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            {!! Form::text('birthday', old('birthday'), ['placeholder'=>"Enter Birthday Here", 'class'=>"form-control"]) !!}
                        </div>

                        <div class="input-group input-group-lg">
                            <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                            {!! Form::text('address', old('address'), ['placeholder'=>"Enter Address Here", 'class'=>"form-control"]) !!}
                        </div>

                        <div class="input-group input-group-lg">
                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                            {!! Form::text('phone', old('phone'), ['placeholder'=>"Enter Phone Here", 'class'=>"form-control"]) !!}
                        </div>

                        <div class="input-group-lg">
                            <input type="submit" class="btn-submit form-control" value="SIGNUP NOW">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
