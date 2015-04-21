@extends('Dashboard::frontend.default.master')

@section('content')
<section id="section-users" class="section bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="sign-up-block">
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
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="text" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
                            </div>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="text" class="form-control" placeholder="Password" name="password">
                            </div>

                            <div class="form-group">
                                <div class="col-md-6">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-1">
                                    <button type="submit" class="btn btn-default">Login</button>

                                    <a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a>
                                </div>
                            </div>
                        </form>
                        <p><a class="btn btn-link white" href="{{ url('/auth/register') }}">Don't have account? Click here to Sign Up?</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
