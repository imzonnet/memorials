@extends('Dashboard::backend.default.master')

@section('title')
    List Users
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Birthday</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Task</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                            <tr class="odd gradeX">
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->birthday}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->address}}</td>
                                <td class="center" style="min-width: 100px;">
                                        {!! Form::open(['route' => ['backend.user.destroy', $user->id], 'method' => 'delete', 'class' => 'form-delete']) !!}
                                    <div class="btn-group" role="group" aria-label="...">
                                        <a href="{{route('backend.user.edit',[$user->id])}}" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-pencil"></i></a>
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