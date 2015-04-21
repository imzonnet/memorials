@extends('Dashboard::backend.default.master')

@section('title')
    @if(isset($post))
        Edit {{$post_type}} {{$post->name}}
    @else
        Add new {{$post_type}}
    @endif
@stop

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading"></div>
        <div class="panel-body">
            @if( isset($post) )
                {!! Form::open(['route' => ['backend.'.$post_type.'s.update', $post->id], 'method' => 'PUT', 'files' => true])!!}
                {!! Form::hidden('id', $post->id) !!}
            @else
                {!! Form::open(['route' => 'backend.'.$post_type.'s.store', 'method' => 'post', 'files' => true]) !!}
            @endif
                {!! Form::hidden('type', $post_type) !!}
            <div class="form-group">
                <label>Title</label>
                {!!Form::text('title', isset($post) ? $post->title : old('title'), ['class' => 'form-control', 'placeholder' => 'Service name'] ) !!}
                {!! $errors->first('title', '<span class="help-block error">:message</span>') !!}
            </div>

            <div class="form-group">
                <label>Description</label>
                {!!Form::textarea('description', isset($post) ? $post->description : old('description'), ['class' => 'form-control', 'placeholder' => ''] ) !!}
                {!! $errors->first('description', '<span class="help-block error">:message</span>') !!}
            </div>
            @if($post_type === 'post')
            <div class="form-group">
                <label>Category</label>
                {!!Form::select('category_id[]', $categories, isset($post) ? $post->present()->selected_categories : old('category_id'), ['class' => 'form-control chosen-select', 'placeholder' => '', 'multiple' => 'multiple'] ) !!}
                {!! $errors->first('category_id', '<span class="help-block error">:message</span>') !!}
            </div>
            @endif
            <div class="form-group">
                <label>Publish {!!Form::checkbox('state', 1, isset($post) ? $post->state : old('state')) !!}</label>
            </div>


            <div class="form-group">
                {!! Form::button('Cancel', ['class' => 'btn btn-warning', 'onclick' => 'window.history.back()']) !!}
                @if(isset($post))
                    {!! Form::submit('Update', ['class' => 'btn btn-success', 'name' => 'update']) !!}
                @else
                    {!! Form::submit('Create', ['class' => 'btn btn-success', 'name' => 'create']) !!}
                @endif
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@stop

@section('scripts')
    <script src="{{asset('templates/backend/default/bower_components/chosen/chosen.jquery.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $(".chosen-select").chosen();
        });
    </script>
@stop

@section('styles')
    <link rel="stylesheet" href="{{asset('templates/backend/default/bower_components/chosen/chosen.min.css')}}"/>
@stop