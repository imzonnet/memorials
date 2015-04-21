@extends('Dashboard::backend.default.master')

@section('title')
    @if(isset($guestbook))
        Edit {{$guestbook['title']}}
    @else
        Add New Guestbook For {{$memorial->name}}
    @endif
@stop

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading"></div>
        <div class="panel-body">
            @if( isset($guestbook) )
                {!! Form::open(['route' => ['backend.memorial.guestbook.update', $guestbook['mem_id'], $guestbook['id']], 'method' => 'PUT'])!!}
                {!! Form::hidden('id', $guestbook['id']) !!}
            @else
                {!! Form::open(['route' => ['backend.memorial.guestbook.store', $memorial->id], 'method' => 'POST']) !!}
            @endif
            {!! Form::hidden('mem_id', $memorial->id) !!}
            <div class="form-group">
                <label>Title</label>
                {!!Form::text('title', isset($guestbook) ? $guestbook['title'] : old('title'), ['class' => 'form-control','placeholder' => 'The title...'] ) !!}
                {!! $errors->first('title', '<span class="help-block error">:message</span>') !!}
            </div>

            <div class="form-group">
                <label>Description</label>
                {!!Form::textarea('description', isset($guestbook) ? $guestbook['description'] : old('description'), ['class' => 'form-control', 'placeholder' => 'The content'] ) !!}
                {!! $errors->first('description', '<span class="help-block error">:message</span>') !!}
            </div>

            <div class="form-group">
                {!! Form::button('Cancel', ['class' => 'btn btn-warning', 'onclick' => 'window.history.back()']) !!}
                @if(isset($guestbook))
                    {!! Form::submit('Update', ['class' => 'btn btn-success', 'name' => 'update']) !!}
                @else
                    {!! Form::submit('Create', ['class' => 'btn btn-success', 'name' => 'create']) !!}
                @endif
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@stop
