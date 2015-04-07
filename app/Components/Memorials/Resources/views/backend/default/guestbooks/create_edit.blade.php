@extends('Dashboard::backend.default.master')

@section('title')
    @if(isset($guestbook))
        Edit {{$guestbook['title']}}
    @else
        Add New Guestbook For {{$memorial->name}}
    @endif
@stop

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading"></div>
        <div class="panel-body">
            @if( isset($guestbook) )
                {!! Form::open(['route' => ['backend.memorial.guestbook.update', $guestbook['mem_id'], $guestbook['id']], 'method' => 'PUT'])!!}
                {!! Form::hidden('id', $guestbook['id']) !!}
            @else
                {!! Form::open(['route' => ['backend.memorial.guestbook.store', $memorial->id], 'method' => 'POST']) !!}
            @endif
            {!! Form::hidden('mem_id', $memorial->id) !!}
            <div class="form-group">
                <label>Title</label>
                {!!Form::text('title', isset($guestbook) ? $guestbook['title'] : old('title'), ['class' => 'form-control','placeholder' => 'The title...'] ) !!}
                {!! $errors->first('title', '<span class="help-block error">:message</span>') !!}
            </div>

            <div class="form-group">
                <label>Description</label>
                {!!Form::textarea('description', isset($guestbook) ? $guestbook['description'] : old('description'), ['class' => 'form-control', 'placeholder' => 'The content'] ) !!}
                {!! $errors->first('description', '<span class="help-block error">:message</span>') !!}
            </div>

            <div class="form-group">
                {!! Form::button('Cancel', ['class' => 'btn btn-warning', 'onclick' => 'window.history.back()']) !!}
                @if(isset($guestbook))
                    {!! Form::submit('Update', ['class' => 'btn btn-success', 'name' => 'update']) !!}
                @else
                    {!! Form::submit('Create', ['class' => 'btn btn-success', 'name' => 'create']) !!}
                @endif
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@stop

@section('scripts')
    <script src="{{asset('public/backend/default/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('public/backend/default/bower_components/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
    <script src="{{asset('public/assets/dropzone/dropzone.js')}}"></script>
    <script>
        $(function () {
            $('.date-picker').datepicker({})
            $(".timeline-option").bootstrapSwitch().on('switchChange.bootstrapSwitch', function (event, state) {
                if (state || $(this).is(":checked")) {
                    $('.timeline-group').slideDown();
                } else {
                    $('.timeline-group').slideUp();
                }
            }).trigger('switchChange.bootstrapSwitch');

            $(document).on('click', '.timeline-btn-desc', function () {
                var parent = $(this).closest('.timeline-form');
                if ($('.info', parent).css('display') == 'none') {
                    $('.info', parent).slideDown('fast');
                    $(this).removeClass('btn-primary').addClass('btn-success').html('<i class="fa fa-minus"></i> Hide Description');
                } else {
                    $('.info', parent).slideUp('fast');
                    $(this).removeClass('btn-success').addClass('btn-primary').html('<i class="fa fa-plus"></i> Add Description');
                }
            });
            /**
             * Create The Form
             */
            $('.timeline-btn-addnew').click(function () {
                var timeline_form = create_form();
                $('#timeline-group-body').append(timeline_form);

            });
            /**
             * Delete the form
             */
            $(document).on('click', '.timeline-btn-delete', function () {
                var thisEl = $(this), parent = thisEl.closest('.timeline-form'),
                        tid = $('.timeline_id', parent).val();
                if (tid > 0) {
                    if (confirm("Are you sure you want to delete the selected record ?")) {
                        $('body').append('<div class="loading-animate"></div>');
                        var path = '{{url("backend/timeline")}}/' + tid;
                        $.ajax({
                            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                            url: path,
                            type: "DELETE",
                            success: function (data) {
                                $('.loading-animate').fadeOut();
                                if (data.status) {
                                    parent.before('<div class="timeline-alert-flash alert alert-success" role="alert">Delete Success</div>');
                                    parent.slideUp(400, function () {
                                        $(this).remove();
                                        $('.timeline-alert-flash').delay(500).fadeOut(500, function () {
                                            $(this).remove();
                                        });
                                    });
                                    create_form_number('-');
                                }

                            },
                            error: function () {
                                $('.loading-animate').fadeOut();
                                parent.before('<div class="timeline-alert-flash alert alert-danger" role="alert">Error! Please check and try again!</div>');
                                $('.timeline-alert-flash').delay(3000).fadeOut(500, function () {
                                    $(this).remove();
                                });
                            }
                        });
                    }
                } else {
                    parent.slideUp(300, function () {
                        $(this).remove();
                    });
                    create_form_number('-');
                }
            });

        }(jQuery));
        /**
         * Create Form Element
         *
         * @return HTML
         */
        function create_form() {
            var id = create_form_number('+'),
                    timeline = $('<div class="timeline-form form-group clearfix"></div>'),
                    form_string = '<input type="hidden" name="timeline_id[' + id + ']" value="0" class="timeline_id">';
            form_string += '<div class="row"><div class="col-md-3 col-lg-3 year"><label>Year</label>';
            form_string += '<input type="number" name="timeline_year[' + id + ']" placeholder="" class="form-control">';
            form_string += '</div><div class="col-md-6 col-lg-6 text"><label>Title</label>';
            form_string += '<input type="text" name="timeline_title[' + id + ']" placeholder="" class="form-control">';
            form_string += '</div><div class="col-md-3 col-lg-3 task"><div class="btn-group"><button class="btn btn-primary timeline-btn-desc" type="button"><i class="fa fa-plus"></i> Add Description</button><button type="button" class="timeline-btn-delete btn btn-danger"><i class="fa fa-trash"></i></button></div></div></div>';
            timeline.attr('id', 'timeline-form-' + id);
            timeline.append(form_string).append(create_form_description(id));
            return timeline;
        }
        /**
         * Create Form Description
         */
        function create_form_description(id) {
            var form_string = '<div class="row info" style="display:none"><div class="col-md-offset-3 col-lg-offset-3 col-md-6 col-lg-6 description">';
            form_string += '<textarea cols="50" name="timeline_desc[' + id + ']" rows="3" placeholder="" class="form-control"></textarea>';
            form_string += '</div><div class="col-md-3 col-lg-3 image"><p><strong>Write text or Upload a picture</strong></p>';
            form_string += '<img id="preview_' + id + '" class="pull-left" width="100" height="100" src="" title="Image" alt="Image">';
            form_string += '<input type="file" name="avatar" onchange="$(\'#preview_' + id + '\')[0].src = window.URL.createObjectURL(this.files[0]); console.log($(this));">';
            form_string += '</div></div>';
            return form_string;
        }
        /**
         * Count
         */
        function create_form_number(type) {
            var id = $('[name="timeline_form_count"]').val();
            if (type == '-')
                $('[name="timeline_form_count"]').val(parseInt(id) - 1);
            else
                $('[name="timeline_form_count"]').val(parseInt(id) + 1);
            return id;
        }
    </script>
@stop
@section('styles')
    <link rel="stylesheet"
          href="{{asset('public/backend/default/bower_components/bootstrap-datepicker/css/bootstrap-datepicker3.standalone.css')}}">
    <link rel="stylesheet"
          href="{{asset('public/backend/default/bower_components/bootstrap-switch/css/bootstrap-switch.min.css')}}">
@stop