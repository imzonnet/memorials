@extends('Dashboard::backend.default.master')

@section('title')
    List Videos of {{$memorial->name}}
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{route('backend.memorial.index')}}" class="btn btn-primary"><i class="fa fa-angle-double-left"></i> Back</a>
                    <a href="{{route('backend.memorial.video.create', [$memorial->id])}}" class="btn btn-success"><i class="fa fa-plus"></i> Add New</a>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover dataTables" id="dataTables">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Preview</th>
                                <th class="task">Task</th>
                            </tr>

                            </thead>
                            <tbody>
                            @foreach($videos as $video)
                                <tr class="odd gradeX">
                                    <td>{{$video['id']}}</td>
                                    <td>{{$video['title']}}</td>
                                    <td>{{$video['url']}}</td>
                                    <td class="center" style="min-width: 100px;">
                                        {!! Form::open(['route' => ['backend.memorial.video.destroy', $video['mem_id'], $video['id'] ], 'method' => 'delete', 'class' => 'form-delete']) !!}
                                        <div class="btn-group" role="group" aria-label="...">
                                            <a href="{{route('backend.memorial.video.edit',[$video['mem_id'], $video['id']])}}" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-pencil"></i> Edit</a>
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
