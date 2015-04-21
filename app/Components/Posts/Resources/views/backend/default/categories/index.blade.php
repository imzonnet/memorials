@extends('Dashboard::backend.default.master')

@section('title')
    List {{$post_type}} categories
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{route('backend.'.$post_type.'-categories.create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Add New</a>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover dataTables" id="dataTables">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th class="task">Task</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $index => $category)
                                <tr class="odd gradeX">
                                    <td>{{$index}}</td>
                                    <td>{{$category->title}}</td>
                                    <td>{!! str_limit($category->description, 70) !!}</td>

                                    <td class="center" style="min-width: 100px;">
                                        {!! Form::open(['route' => ['backend.'.$post_type.'-categories.destroy', $category->id], 'method' => 'delete', 'class' => 'form-delete']) !!}
                                        <div class="btn-group" role="group" aria-label="...">
                                            <a href="{{route('backend.'.$post_type.'-categories.edit',[$category->id])}}" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-pencil"></i> Edit</a>
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
                                        </div>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
@stop
