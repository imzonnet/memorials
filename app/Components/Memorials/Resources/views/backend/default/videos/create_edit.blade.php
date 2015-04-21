@extends('Dashboard::backend.default.master')

@section('title')
    @if(isset($video))
        Edit {{$video['title']}}
    @else
        Add New Video For {{$memorial->name}}
    @endif
@stop

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading"></div>
        <div class="panel-body">
            @if( isset($video) )
                {!! Form::open(['route' => ['backend.memorial.video.update', $video['mem_id'], $video['id']], 'method' => 'PUT'])!!}
                {!! Form::hidden('id', $video['id']) !!}
            @else
                {!! Form::open(['route' => ['backend.memorial.video.store', $memorial->id], 'method' => 'POST']) !!}
            @endif
            {!! Form::hidden('mem_id', $memorial->id) !!}
            <div class="form-group">
                <label>Title</label>
                {!!Form::text('title', isset($video) ? $video['title'] : old('title'), ['class' => 'form-control','placeholder' => 'The title...'] ) !!}
                {!! $errors->first('title', '<span class="help-block error">:message</span>') !!}
            </div>

            <div class="form-group">
                <label>URL</label>
                {!!Form::text('url', isset($video) ? $video['url'] : old('url'), ['class' => 'form-control','placeholder' => 'Support Youtube & Video host'] ) !!}
                {!! $errors->first('url', '<span class="help-block error">:message</span>') !!}
            </div>

            <div class="form-group">
                {!! Form::button('Cancel', ['class' => 'btn btn-warning', 'onclick' => 'window.history.back()']) !!}
                @if(isset($video))
                    {!! Form::submit('Update', ['class' => 'btn btn-success', 'name' => 'update']) !!}
                @else
                    {!! Form::submit('Create', ['class' => 'btn btn-success', 'name' => 'create']) !!}
                @endif
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@stop