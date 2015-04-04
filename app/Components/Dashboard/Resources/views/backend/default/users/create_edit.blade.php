@extends('Dashboard::backend.default.master')

@section('title')
    @if(isset($user))
        Edit {{$user->name}}
    @else
        Add New
    @endif
@stop

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading"></div>
        <div class="panel-body">
            @if( isset($user) )
                {!! Form::open(['route' => ['backend.user.update', $user->id], 'method' => 'PUT']) !!}
                {!! Form::hidden('id', $user->id) !!}
            @else
                {!! Form::open(['route' => 'backend.user.store', 'method' => 'post']) !!}
            @endif
            <div class="form-group">
                <label>Full Name</label>
                {!!Form::text('name', isset($user) ? $user->name : old('name'), ['class' => 'form-control',
                'placeholder' => 'John Nguyen'] ) !!}
                {!! $errors->first('name', '<span class="help-block error">:message</span>') !!}
            </div>
            <div class="form-group">
                <label>Email</label>
                {!!Form::text('email', isset($user) ? $user->email : old('email'), ['class' => 'form-control',
                'placeholder' => 'name@mail.com'] ) !!}
                {!! $errors->first('email', '<span class="help-block error">:message</span>') !!}
            </div>
            <div class="form-group">
                <label>Password</label>
                {!!Form::password('password', ['class' => 'form-control', 'placeholder' => 'Type your password'] ) !!}
                {!! $errors->first('password', '<span class="help-block error">:message</span>') !!}
            </div>
            <div class="form-group">
                <label>Password Confirm</label>
                {!!Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirm your password'] ) !!}
                {!! $errors->first('password_confirmation', '<span class="help-block error">:message</span>') !!}
            </div>

            <div class="form-group">
                <label>Birthday</label>

                <div class="input-group date date-picker" data-date-format="yyyy-mm-dd">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
                    {!!Form::date('birthday', isset($user) ? $user->birthday : old('birthday') , [ 'class' =>
                    'form-control', 'placeholder' => '1987-10-10'] ) !!}
                </div>
                {!! $errors->first('birthday', '<span class="help-block error">:message</span>') !!}
            </div>

            <div class="form-group">
                <label>Address</label>
                {!!Form::text('address', isset($user) ? $user->address : old('address') , ['class' => 'form-control',
                'placeholder' => '123 abc def, AZ'] ) !!}
                {!! $errors->first('address', '<span class="help-block error">:message</span>') !!}
            </div>
            <div class="form-group">
                <label>Phone</label>
                {!!Form::text('phone', isset($user) ? $user->phone : old('phone') , ['class' => 'form-control',
                'placeholder' => '123.456.789'] ) !!}
                {!! $errors->first('phone', '<span class="help-block error">:message</span>') !!}
            </div>

            <div class="form-group">
                @if(isset($user))
                {!! Form::submit('Update', ['class' => 'btn btn-success', 'name' => 'update']) !!}
                @else
                {!! Form::submit('Register', ['class' => 'btn btn-primary', 'name' => 'create']) !!}
                @endif
            </div>
            {!! Form::close() !!}

        </div>
    </div>


@stop

@section('scripts')
    <script src="{{asset('public/backend/default/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script>
        $(function () {
            $('.date-picker').datepicker({})
        }(jQuery));
    </script>
@stop
@section('styles')
    <link rel="stylesheet"
          href="{{asset('public/backend/default/bower_components/bootstrap-datepicker/css/bootstrap-datepicker3.standalone.css')}}">
@stop