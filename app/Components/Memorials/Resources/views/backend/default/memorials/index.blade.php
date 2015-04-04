@extends('Dashboard::backend.default.master')

@section('title')
    List memorials
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">

                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Avatar</th>
                                <th>Name</th>
                                <th>Birthday</th>
                                <th>Death</th>
                                <th>Buried</th>
                                <th>Task</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($memorials as $memorial)
                            <tr class="odd gradeX">
                                <td>{{$memorial->id}}</td>
                                <td><img src="{{asset($memorial->avatar)}}" alt="" width="100px" height="100px" /> </td>
                                <td>{{$memorial->name}}</td>
                                <td>{{$memorial->birthday}}</td>
                                <td>{{$memorial->death}}</td>
                                <td>{{$memorial->buried}}</td>
                                <td class="center" style="min-width: 100px;">
                                        {!! Form::open(['route' => ['backend.memorial.destroy', $memorial->id], 'method' => 'delete', 'class' => 'form-delete']) !!}
                                    <div class="btn-group" role="group" aria-label="...">
                                        <a href="{{route('backend.memorial.edit',[$memorial->id])}}" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-pencil"></i></a>
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
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

@section('scripts')
    <script src="{{asset('public/backend/default/bower_components/DataTables/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('public/backend/default/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>
@stop