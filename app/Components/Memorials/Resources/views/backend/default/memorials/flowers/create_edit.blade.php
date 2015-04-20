@extends('Dashboard::backend.default.master')

@section('title')
    @if(isset($memorial_flower))
        Edit flower
    @else
        Add New flower For {{$memorial->name}}
    @endif
@stop

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading"></div>
        <div class="panel-body">
            @if( isset($memorial_flower) )
                {!! Form::open(['route' => ['backend.memorial.flower.update', $memorial->id, $memorial_flower->id], 'method' => 'PUT'])!!}
                {!! Form::hidden('id', $memorial_flower->id) !!}
            @else
                {!! Form::open(['route' => ['backend.memorial.flower.store', $memorial->id], 'method' => 'POST']) !!}
            @endif
            {!! Form::hidden('mem_id', $memorial->id) !!}
            <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-cog"></i></span>
                {!! Form::select('flower_id', $flowers, isset($memorial_flower) ? $memorial_flower->flower_id : old('flower_id'), ['class' => 'form-control']) !!}
                {!! $errors->first('contact_name', '<span class="help-block error">:message</span>') !!}
            </div>
            <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                {!!Form::text('contact_name', isset($memorial_flower) ? $memorial_flower->contact_name : old('contact_name'), ['class' => 'form-control','placeholder' => 'Full Name'] ) !!}
                {!! $errors->first('contact_name', '<span class="help-block error">:message</span>') !!}
            </div>
            <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                {!!Form::text('contact_email', isset($memorial_flower) ? $memorial_flower->contact_email : old('contact_email'), ['class' => 'form-control','placeholder' => 'Email ']) !!}
             {!! $errors->first('contact_email', '<span class="help-block error">:message</span>') !!}
            </div>
            <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                {!!Form::text('contact_phone', isset($memorial_flower) ? $memorial_flower->contact_phone : old('contact_phone'), ['class' => 'form-control','placeholder' => 'Phone'] ) !!}
                {!! $errors->first('contact_phone', '<span class="help-block error">:message</span>') !!}
            </div>
            <div class="form-group">
                {!!Form::textarea('message', isset($memorial_flower) ? $memorial_flower->message : old('message'), ['class' => 'form-control', 'placeholder' => 'Write Message'] ) !!}
                {!! $errors->first('message', '<span class="help-block error">:message</span>') !!}
            </div>
            <div class="form-group">
                {!! Form::button('Cancel', ['class' => 'btn btn-warning', 'onclick' => 'window.history.back()']) !!}
                @if(isset($memorial_flower))
                    {!! Form::submit('Update', ['class' => 'btn btn-success', 'name' => 'update']) !!}
                @else
                    {!! Form::submit('Create', ['class' => 'btn btn-success', 'name' => 'create']) !!}
                @endif
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@stop