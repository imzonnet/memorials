@extends('Dashboard::backend.default.master')

@section('title')
    @if(isset($category))
        Edit {{$category->name}}
    @else
        Add new categorys
    @endif
@stop

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading"></div>
        <div class="panel-body">
            @if( isset($category) )
                {!! Form::open(['route' => ['backend.'.$post_type.'-categories.update', $category->id], 'method' => 'PUT', 'files' => true])!!}
                {!! Form::hidden('id', $category->id) !!}
            @else
                {!! Form::open(['route' => 'backend.'.$post_type.'-categories.store', 'method' => 'post', 'files' => true]) !!}
            @endif
                {!! Form::hidden('type', $post_type) !!}
            <div class="form-group">
                <label>Name</label>
                {!!Form::text('title', isset($category) ? $category->title : old('title'), ['class' => 'form-control', 'placeholder' => 'Service name'] ) !!}
                {!! $errors->first('title', '<span class="help-block error">:message</span>') !!}
            </div>

            <div class="form-group">
                <label>Description</label>
                {!!Form::textarea('description', isset($category) ? $category->description : old('description'), ['class' => 'form-control', 'placeholder' => ''] ) !!}
                {!! $errors->first('description', '<span class="help-block error">:message</span>') !!}
            </div>

            <div class="form-group">
                {!! Form::button('Cancel', ['class' => 'btn btn-warning', 'onclick' => 'window.history.back()']) !!}
                @if(isset($category))
                    {!! Form::submit('Update', ['class' => 'btn btn-success', 'name' => 'update']) !!}
                @else
                    {!! Form::submit('Create', ['class' => 'btn btn-success', 'name' => 'create']) !!}
                @endif
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@stop