@extends('Dashboard::backend.default.master')

@section('title')
    List Flowers
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{route('backend.flower.create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Add New</a>
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
                                <th>State</th>
                                <th style="max-width: 200px;">Task</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($flowers as $flower)
                            <tr class="odd gradeX">
                                <td>{{$flower->id}}</td>
                                <td>{{$flower->title}}</td>
                                <td>{!! str_limit($flower->description) !!}</td>
                                <td>{{sate_convert($flower->state)}}</td>

                                <td class="center" style="min-width: 100px;">
                                    {!! Form::open(['route' => ['backend.flower.destroy', $flower->id], 'method' => 'delete', 'class' => 'form-delete']) !!}
                                    <div class="btn-group" role="group" aria-label="...">
                                        <a href="{{route('backend.flower.edit',[$flower->id])}}" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-pencil"></i> Edit</a>
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
