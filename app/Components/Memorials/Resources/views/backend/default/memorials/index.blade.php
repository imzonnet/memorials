@extends('Dashboard::backend.default.master')

@section('title')
    List memorials
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{route('backend.memorial.create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Add New</a>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover dataTables" id="dataTables">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Avatar</th>
                                <th>Name</th>
                                <th>Birthday</th>
                                <th>Death</th>
                                <th>Buried</th>
                                <th class="task">Task</th>
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
                                        <!-- Single button -->
                                            <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                More Info <span class="caret"></span>
                                            </button>
                                            <a href="{{route('backend.memorial.edit',[$memorial->id])}}" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-pencil"></i> Edit</a>
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="{{route('backend.memorial.guestbook.index', [$memorial->id])}}">Guestbooks</a></li>
                                                <li><a href="{{route('backend.memorial.album.index', [$memorial->id])}}">Photo Albums</a></li>
                                                <li><a href="{{route('backend.memorial.video.index', [$memorial->id])}}">Videos</a></li>
                                                <li><a href="{{route('backend.memorial.service.index', [$memorial->id])}}">Services</a></li>
                                                <li><a href="{{route('backend.memorial.flower.index', [$memorial->id])}}">Flowers</a></li>
                                            </ul>
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
