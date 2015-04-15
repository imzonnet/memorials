<!-- Page Content -->
<section id="section-messages" class="section">
    <div class="container">
        <div class="row">
            <!-- /.col-lg-12 -->
            <div class="clearfix"></div>
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
    </div>
    <!-- /.container-fluid -->
</section><!-- /.main-content-->