@extends('Dashboard::backend.default.master')

@section('title')
    List flowers of {{$memorial->name}}
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{route('backend.memorial.index')}}" class="btn btn-primary"><i class="fa fa-angle-double-left"></i> Back</a>
                    <a href="{{route('backend.memorial.flower.create', [$memorial->id])}}" class="btn btn-success"><i class="fa fa-plus"></i> Add New</a>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover dataTables" id="dataTables">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Flower Name</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Message</th>
                                <th class="task">Task</th>
                            </tr>

                            </thead>
                            <tbody>
                            @foreach($memorial_flowers as $flower)
                                <tr class="odd gradeX">
                                    <td>{{$flower->id}}</td>
                                    <td>{{$flower->flower->title}}</td>
                                    <td>{{$flower->contact_name}}</td>
                                    <td>{{$flower->contact_email}}</td>
                                    <td>{{$flower->contact_phone}}</td>
                                    <td>{{$flower->message}}</td>
                                    <td class="center" style="min-width: 100px;">
                                        {!! Form::open(['route' => ['backend.memorial.flower.destroy', $flower['mem_id'], $flower['id'] ], 'method' => 'delete', 'class' => 'form-delete']) !!}
                                        <div class="btn-group" role="group" aria-label="...">
                                            <a href="{{route('backend.memorial.flower.edit',[$flower['mem_id'], $flower['id']])}}" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-pencil"></i> Edit</a>
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
