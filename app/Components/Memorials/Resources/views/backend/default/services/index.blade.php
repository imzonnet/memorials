@extends('Dashboard::backend.default.master')

@section('title')
    List Services of {{$memorial->name}}
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{route('backend.memorial.index')}}" class="btn btn-primary"><i class="fa fa-angle-double-left"></i> Back</a>
                    <a href="{{route('backend.memorial.service.create', [$memorial->id])}}" class="btn btn-success"><i class="fa fa-plus"></i> Add New</a>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover dataTables" id="dataTables">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Message</th>
                                <th class="task">Task</th>
                            </tr>

                            </thead>
                            <tbody>
                            @foreach($services as $service)
                                <tr class="odd gradeX">
                                    <td>{{$service['id']}}</td>
                                    <td>{{$service['contact_name']}}</td>
                                    <td>{{$service['contact_email']}}</td>
                                    <td>{{$service['contact_phone']}}</td>
                                    <td>{{$service->present()->hello()}}</td>
                                    <td class="center" style="min-width: 100px;">
                                        {!! Form::open(['route' => ['backend.memorial.service.destroy', $service['mem_id'], $service['id'] ], 'method' => 'delete', 'class' => 'form-delete']) !!}
                                        <div class="btn-group" role="group" aria-label="...">
                                            <a href="{{route('backend.memorial.service.edit',[$service['mem_id'], $service['id']])}}" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-pencil"></i> Edit</a>
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
