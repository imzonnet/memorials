@include('Dashboard::backend.default._layouts._header')

<div id="wrapper">

    <!-- Navigation -->
    @include('Dashboard::backend.default._layouts.NavigationPartial')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">@yield('title')</h1>
                </div>
                <!-- /.col-lg-12 -->
                @if( count($errors) > 0 )
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if( \Session::has('success_message') )
                    <div class="alert alert-success">
                        <strong>Success!</strong> {{ \Session::get('success_message') }}
                    </div>
                @endif
            </div>

            <!-- /.row -->
            @yield('content')
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->


@include('Dashboard::backend.default._layouts._footer')