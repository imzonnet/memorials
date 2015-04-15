@extends('Dashboard::backend.default.master')

@section('title')
    @if(isset($album))
        Edit {{$album['title']}}
    @else
        Add New Photo Album For {{$memorial->name}}
    @endif
@stop

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading"></div>
        <div class="panel-body">
            @if( isset($album) )
                {!! Form::open(['route' => ['backend.memorial.album.update', $album['mem_id'], $album['id']], 'method' => 'PUT'])!!}
                {!! Form::hidden('id', $album['id']) !!}
            @else
                {!! Form::open(['route' => ['backend.memorial.album.store', $memorial->id], 'method' => 'POST']) !!}
            @endif
            {!! Form::hidden('mem_id', $memorial->id) !!}
            <div class="form-group">
                <label>Title</label>
                {!!Form::text('title', isset($album) ? $album['title'] : old('title'), ['class' => 'form-control','placeholder' => 'The title...'] ) !!}
                {!! $errors->first('title', '<span class="help-block error">:message</span>') !!}
            </div>

            <div class="form-group">
                <label>Description</label>
                {!!Form::textarea('description', isset($album) ? $album['description'] : old('description'), ['class' => 'form-control', 'placeholder' => 'The content'] ) !!}
                {!! $errors->first('description', '<span class="help-block error">:message</span>') !!}
            </div>

            <div class="form-group">
                <label>Public
                {!!Form::checkbox('state', 1, isset($album) ? $album['state'] : old('state') ) !!}</label>
            </div>

            <div class="form-group">
                {!! Form::button('Cancel', ['class' => 'btn btn-warning', 'onclick' => 'window.history.back()']) !!}
                @if(isset($album))
                    {!! Form::submit('Update', ['class' => 'btn btn-success', 'name' => 'update']) !!}
                @else
                    {!! Form::submit('Create & Upload photo', ['class' => 'btn btn-success', 'name' => 'create']) !!}
                @endif
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@stop