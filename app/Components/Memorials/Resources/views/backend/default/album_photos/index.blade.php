@extends('Dashboard::backend.default.master')

@section('title')
    List Photo Albums of {{$album->title}}
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{route('backend.memorial.album.index', [$album->mem_id])}}" class="btn btn-primary"><i class="fa fa-angle-double-left"></i> Back</a>
                    <a href="{{route('backend.album.photo.index', [$album->id])}}" class="btn btn-success"><i class="fa fa-refresh"></i> Refresh</a>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="photo-items rows">
                    @foreach($photos as $photo)
                        <div class="item col-md-3 col-lg-3 col-xs-6 col-sm-4">
                            <a class="fancybox" data-fancybox-group="gallery" href="{{asset($photo['image'])}}" title="{{$photo['title']}}" ><img src="{{asset($photo['image'])}}" alt="{{$photo['title']}}" /></a>
                            <button type="button" class="btn btn-danger btn-photo-delete" data-action="{{route('backend.album.photo.destroy', [$photo['album_id'], $photo['id']])}}"><i class="fa fa-trash"></i></button>
                        </div>
                    @endforeach
                    </div>
                    <div class="clearfix"></div>
                    {!! str_replace('/?', '?', $photos->render()) !!}
                </div>
                <!-- /.panel-body -->
                <div class="panel-footer">
                    <h3>Upload Photo</h3>
                    <form id="uploadDropzone" action="{{route('backend.upload.photo', $album->id)}}" method="post" enctype="multipart/form-data" class="dropzone"></form>
                </div>
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
@stop

@section('scripts')
    <script src="{{asset('public/assets/dropzone/dropzone.js?v=4')}}"></script>
    <script type="text/javascript" src="{{asset('public/assets/fancybox/jquery.fancybox.js?v=2.1.5')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/fancybox/jquery.fancybox.css?v=2.1.5')}}" media="screen" />
    <script>
        Dropzone.options.uploadDropzone = {
            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
            acceptedFiles: 'image/*'
        };
        $('.fancybox').fancybox();
        /**
         * Delete Image
         */
        $('.btn-photo-delete').click(function(){
            if(confirm('Do you want delete this image?')) {
                var thisEl = $(this), action = thisEl.data('action'),
                        parent = thisEl.closest('.item');
                $('body').append('<div class="loading-animate"></div>');
                $.ajax({
                    headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                    url : action,
                    type : 'DELETE',
                    success : function() {
                        $('.loading-animate').fadeOut();
                        $('.photo-items').before('<div class="timeline-alert-flash alert alert-success clearfix" role="alert">Delete Success</div>');
                        parent.fadeOut(500, function () {
                            $(this).remove();
                            $('.timeline-alert-flash').delay(800).fadeOut(500, function () {
                                $(this).remove();
                            });
                        });
                    },
                    error: function() {
                        $('.loading-animate').fadeOut();
                        $('.photo-items').before('<div class="timeline-alert-flash alert alert-danger clearfix" role="alert">Error! Please check and try again!</div>');
                        $('.timeline-alert-flash').delay(3000).fadeOut(500, function () {
                            $(this).remove();
                        });
                    }
                });
            }
        });
    </script>
@stop
@section('styles')
    <link rel="stylesheet" href="{{asset('public/assets/dropzone/dropzone.css')}}">
@stop