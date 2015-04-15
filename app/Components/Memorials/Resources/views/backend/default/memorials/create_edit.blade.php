@extends('Dashboard::backend.default.master')

@section('title')
    @if(isset($memorial))
        Edit {{$memorial->name}}
    @else
        Add New
    @endif
@stop

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading"></div>
        <div class="panel-body">
            @if( isset($memorial) )
                {!! Form::open(['route' => ['backend.memorial.update', $memorial->id], 'method' => 'PUT', 'files' => true])!!}
                {!! Form::hidden('id', $memorial->id) !!}
            @else
                {!! Form::open(['route' => 'backend.memorial.store', 'method' => 'post', 'files' => true]) !!}
            @endif

            <div class="form-group">
                <label>Name</label>
                {!!Form::text('name', isset($memorial) ? $memorial->name : old('name'), ['class' => 'form-control', 'placeholder' => 'Name...'] ) !!}
                {!! $errors->first('name', '<span class="help-block error">:message</span>') !!}
            </div>

            <div class="form-group">
                <label>Avatar</label>
                <div class="clearfix">
                    <img id="preview" alt="Avatar" width="100" height="100" class="pull-left" title="Avatar" src="{{isset($memorial) ? asset($memorial->avatar) : old('avatar')}}"/>
                    {!! Form::file('avatar', ['onchange' => "$('#preview')[0].src = window.URL.createObjectURL(this.files[0]); console.log($(this));" ]) !!}
                </div>
                {!! $errors->first('avatar', '<span class="help-block error">:message</span>') !!}
            </div>

            <div class="form-group">
                <label>Birthday</label>

                <div class="input-group date date-picker" data-date-format="yyyy-mm-dd">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
                    {!!Form::date('birthday', isset($memorial) ? $memorial->birthday : old('birthday') , [ 'class' => 'form-control', 'placeholder' => '1987-10-10'] ) !!}
                </div>
                {!! $errors->first('birthday', '<span class="help-block error">:message</span>') !!}
            </div>

            <div class="form-group">
                <label>Death</label>

                <div class="input-group date date-picker" data-date-format="yyyy-mm-dd">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
                    {!!Form::date('death', isset($memorial) ? $memorial->death : old('death') , [ 'class' => 'form-control', 'placeholder' => '1987-10-10'] ) !!}
                </div>
                {!! $errors->first('death', '<span class="help-block error">:message</span>') !!}
            </div>

            <div class="form-group">
                <label>Biography</label>
                {!!Form::textarea('biography', isset($memorial) ? $memorial->biography : old('biography') , ['class' => 'form-control editor-ckeditor', 'placeholder' => 'Biography'] ) !!}
                {!! $errors->first('biography', '<span class="help-block error">:message</span>') !!}
            </div>

            <div class="form-group">
                <label>Obituary</label>
                {!!Form::textarea('obituary', isset($memorial) ? $memorial->obituary : old('obituary') , ['class' => 'form-control editor-ckeditor', 'placeholder' => 'Obituary'] ) !!}
                {!! $errors->first('obituary', '<span class="help-block error">:message</span>') !!}
            </div>


            <div class="form-group">
                <label>Buried</label>
                {!!Form::text('buried', isset($memorial) ? $memorial->buried : old('buried'), ['class' => 'form-control', 'placeholder' => ''] ) !!}
                {!! $errors->first('buried', '<span class="help-block error">:message</span>') !!}
            </div>

            <div class="form-group">
                <label>Lat</label>
                {!!Form::text('lat', isset($memorial) ? $memorial->lat : old('lat'), ['class' => 'form-control','placeholder' => ''] ) !!}
                {!! $errors->first('lat', '<span class="help-block error">:message</span>') !!}
            </div>

            <div class="form-group">
                <label>Lng</label>
                {!!Form::text('lng', isset($memorial) ? $memorial->lng : old('lng'), ['class' => 'form-control','placeholder' => ''] ) !!}
                {!! $errors->first('lng', '<span class="help-block error">:message</span>') !!}
            </div>

            <div class="form-group">
                <label>Timeline</label>
                {!! Form::checkbox('timeline', '1', isset($memorial) ? $memorial->timeline : old('timeline'), ['class' => 'timeline-option']) !!} <br />
                {!! $errors->first('timeline', '<span class="help-block error">:message</span>') !!}
            </div>
            <div id="timeline-group" class="timeline-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Memorial Timeline</h3>
                    </div>
                    <div id="timeline-group-body" class="panel-body">
                        @if(isset($memorial))
                            <?php $count = !empty(old('timeline_form_count')) ? old('timeline_form_count') : 0;
                                $mem_count = isset($memorial) ? $memorial->timelines->count() : 1;
                            ?>
                            {!! Form::hidden('timeline_form_count', $mem_count) !!}
                            @for($i = 0; $i <  $mem_count ; $i++)
                            <div id="timeline-form-{{$i}}" class="timeline-form form-group clearfix">
                                {!! Form::hidden("timeline_id[$i]", isset($memorial) ? $memorial->timelines->toArray()[$i]['id'] : 0, ['class' => 'timeline_id']) !!}
                                <div class="row">
                                    <div class="col-md-3 col-lg-3 year">
                                        <label>Year</label>
                                        {!!Form::number("timeline_year[$i]", isset($memorial) ? $memorial->timelines->toArray()[$i]['year'] : null, ['class' => 'form-control','placeholder' => ''] ) !!}
                                        {!! $errors->first('timeline_year.'.$i, '<span class="help-block error">:message</span>') !!}
                                    </div>
                                    <div class="col-md-6 col-lg-6 title">
                                        <label>Title</label>
                                        {!!Form::text("timeline_title[$i]", isset($memorial) ? $memorial->timelines->toArray()[$i]['title'] : null, ['class' => 'form-control','placeholder' => ''] ) !!}
                                        {!! $errors->first('timeline_title.'.$i, '<span class="help-block error">:message</span>') !!}
                                    </div>
                                    <div class="col-md-3 col-lg-3 task">
                                        <div class="btn-group">
                                            <button class="btn btn-primary timeline-btn-desc" type="button"><i class="fa fa-plus"></i> Add Description</button>
                                            <button type="button" class="timeline-btn-delete btn btn-danger"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row info" style="display:none">
                                    <div class="col-md-offset-3 col-lg-offset-3 col-md-6 col-lg-6 description">
                                        {!!Form::textarea("timeline_desc[$i]", isset($memorial) ? $memorial->timelines->toArray()[$i]['description'] : null, ['class' => 'form-control','placeholder' => '', 'rows' => 3] ) !!}
                                    </div>
                                    <div class="col-md-3 col-lg-3 image">
                                        <p><strong>Write text or Upload a picture</strong></p>
                                        <img id="preview_{{$i}}" alt="Image" width="100" height="100" class="pull-left" title="Image" src="{{isset($memorial) ? asset($memorial->timelines->toArray()[$i]['image']) : ""}}"/>
                                        {!! Form::file("timeline_image[$i]", ['onchange' => "$('#preview_".$i."')[0].src = window.URL.createObjectURL(this.files[0]); console.log($(this));" ]) !!}
                                    </div>
                                </div>
                            </div>
                            @endfor

                            @for($i = $mem_count; $i <  $count ; $i++)
                                <div id="timeline-form-{{$i}}" class="timeline-form form-group clearfix">
                                    {!! Form::hidden("timeline_id[$i]", 0, ['class' => 'timeline_id']) !!}
                                    <div class="row">
                                        <div class="col-md-3 col-lg-3 year">
                                            <label>Year</label>
                                            {!!Form::number("timeline_year[$i]", null, ['class' => 'form-control','placeholder' => ''] ) !!}
                                            {!! $errors->first('timeline_year.'.$i, '<span class="help-block error">:message</span>') !!}
                                        </div>
                                        <div class="col-md-6 col-lg-6 title">
                                            <label>Title</label>
                                            {!!Form::text("timeline_title[$i]", null, ['class' => 'form-control','placeholder' => ''] ) !!}
                                            {!! $errors->first('timeline_title.'.$i, '<span class="help-block error">:message</span>') !!}
                                        </div>
                                        <div class="col-md-3 col-lg-3 task">
                                            <div class="btn-group">
                                                <button class="btn btn-primary timeline-btn-desc" type="button"><i class="fa fa-plus"></i> Add Description</button>
                                                <button type="button" class="timeline-btn-delete btn btn-danger"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row info" style="display:none">
                                        <div class="col-md-offset-3 col-lg-offset-3 col-md-6 col-lg-6 description">
                                            {!!Form::textarea("timeline_desc[$i]", null, ['class' => 'form-control','placeholder' => '', 'rows' => 3] ) !!}
                                        </div>
                                        <div class="col-md-3 col-lg-3 image">
                                            <p><strong>Write text or Upload a picture</strong></p>
                                            <img id="preview_{{$i}}" alt="Image" width="100" height="100" class="pull-left" title="Image" src=""/>
                                            {!! Form::file("timeline_image[$i]", ['onchange' => "$('#preview_".$i."')[0].src = window.URL.createObjectURL(this.files[0]); console.log($(this));" ]) !!}
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        @else
                            <?php $count = !empty(old('timeline_form_count')) ? old('timeline_form_count') : 1;
                            ?>
                            {!! Form::hidden('timeline_form_count', $count) !!}
                            @for($i = 0; $i < $count ; $i++)
                                <div id="timeline-form-{{$i}}" class="timeline-form form-group clearfix">
                                    {!! Form::hidden("timeline_id[$i]", 0, ['class' => 'timeline_id']) !!}
                                    <div class="row">
                                        <div class="col-md-3 col-lg-3 year">
                                            <label>Year</label>
                                            {!!Form::number("timeline_year[$i]", null, ['class' => 'form-control','placeholder' => ''] ) !!}
                                            {!! $errors->first('timeline_year.'.$i, '<span class="help-block error">:message</span>') !!}
                                        </div>
                                        <div class="col-md-6 col-lg-6 title">
                                            <label>Title</label>
                                            {!!Form::text("timeline_title[$i]", null, ['class' => 'form-control','placeholder' => ''] ) !!}
                                            {!! $errors->first('timeline_title.'.$i, '<span class="help-block error">:message</span>') !!}
                                        </div>
                                        <div class="col-md-3 col-lg-3 task">
                                            <div class="btn-group">
                                                <button class="btn btn-primary timeline-btn-desc" type="button"><i class="fa fa-plus"></i> Add Description</button>
                                                <button type="button" class="timeline-btn-delete btn btn-danger"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row info" style="display:none">
                                        <div class="col-md-offset-3 col-lg-offset-3 col-md-6 col-lg-6 description">
                                            {!!Form::textarea("timeline_desc[$i]", null, ['class' => 'form-control','placeholder' => '', 'rows' => 3] ) !!}
                                        </div>
                                        <div class="col-md-3 col-lg-3 image">
                                            <p><strong>Write text or Upload a picture</strong></p>
                                            <img id="preview_{{$i}}" alt="Image" width="100" height="100" class="pull-left" title="Image" src=""/>
                                            {!! Form::file("timeline_image[$i]", ['onchange' => "$('#preview_".$i."')[0].src = window.URL.createObjectURL(this.files[0]); console.log($(this));" ]) !!}
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        @endif
                    </div>
                    <div class="panel-footer">
                        <p class="text-center"><button type="button" class="btn btn-info timeline-btn-addnew">Add New Timeline</button></p>
                    </div>
                </div>
            </div>

            <div class="form-group">
                {!! Form::button('Cancel', ['class' => 'btn btn-warning', 'onclick' => 'window.history.back()']) !!}
                @if(isset($memorial))
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
    <script src="{{asset('templates/backend/default/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('templates/backend/default/bower_components/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
    <script>
        $(function () {
            $('.date-picker').datepicker({})
            $(".timeline-option").bootstrapSwitch().on('switchChange.bootstrapSwitch', function(event, state) {
                if(state || $(this).is(":checked") ) {
                    $('.timeline-group').slideDown();
                } else {
                    $('.timeline-group').slideUp();
                }
            }).trigger('switchChange.bootstrapSwitch');

            $(document).on('click','.timeline-btn-desc', function(){
                var parent = $(this).closest('.timeline-form');
                if($('.info', parent).css('display') == 'none') {
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
            $('.timeline-btn-addnew').click(function(){
                var timeline_form = create_form();
                $('#timeline-group-body').append(timeline_form);

            });
            /**
             * Delete the form
             */
            $(document).on('click','.timeline-btn-delete', function(){
                var thisEl = $(this), parent = thisEl.closest('.timeline-form'),
                    tid = $('.timeline_id', parent).val();
                if( tid > 0 ) {
                    if(confirm("Are you sure you want to delete the selected record ?")) {
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
                    parent.slideUp(300, function(){ $(this).remove();});
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
                    form_string = '<input type="hidden" name="timeline_id['+id+']" value="0" class="timeline_id">';
            form_string += '<div class="row"><div class="col-md-3 col-lg-3 year"><label>Year</label>';
            form_string += '<input type="number" name="timeline_year['+id+']" placeholder="" class="form-control">';
            form_string += '</div><div class="col-md-6 col-lg-6 text"><label>Title</label>';
            form_string += '<input type="text" name="timeline_title['+id+']" placeholder="" class="form-control">';
            form_string += '</div><div class="col-md-3 col-lg-3 task"><div class="btn-group"><button class="btn btn-primary timeline-btn-desc" type="button"><i class="fa fa-plus"></i> Add Description</button><button type="button" class="timeline-btn-delete btn btn-danger"><i class="fa fa-trash"></i></button></div></div></div>';
            timeline.attr('id', 'timeline-form-'+ id);
            timeline.append(form_string).append(create_form_description(id));
            return timeline;
        }
        /**
         * Create Form Description
         */
        function create_form_description(id) {
            var form_string = '<div class="row info" style="display:none"><div class="col-md-offset-3 col-lg-offset-3 col-md-6 col-lg-6 description">';
            form_string += '<textarea cols="50" name="timeline_desc['+id+']" rows="3" placeholder="" class="form-control"></textarea>';
            form_string += '</div><div class="col-md-3 col-lg-3 image"><p><strong>Write text or Upload a picture</strong></p>';
            form_string += '<img id="preview_'+id+'" class="pull-left" width="100" height="100" src="" title="Image" alt="Image">';
            form_string += '<input type="file" name="avatar" onchange="$(\'#preview_'+id+'\')[0].src = window.URL.createObjectURL(this.files[0]); console.log($(this));">';
            form_string += '</div></div>';
            return form_string;
        }
        /**
         * Count
         */
        function create_form_number(type) {
            var id = $('[name="timeline_form_count"]').val();
            if(type == '-')
                $('[name="timeline_form_count"]').val(parseInt(id) - 1);
            else
                $('[name="timeline_form_count"]').val(parseInt(id) + 1);
            return id;
        }
    </script>
@stop
@section('styles')
    <link rel="stylesheet" href="{{asset('templates/backend/default/bower_components/bootstrap-datepicker/css/bootstrap-datepicker3.standalone.css')}}">
    <link rel="stylesheet" href="{{asset('templates/backend/default/bower_components/bootstrap-switch/css/bootstrap-switch.min.css')}}">
@stop