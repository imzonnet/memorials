@extends('Dashboard::backend.default.master')

@section('title')
    @if(isset($flower))
        Edit {{$flower->name}}
    @else
        Add New flower
    @endif
@stop

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading"></div>
        <div class="panel-body">
            @if( isset($flower) )
                {!! Form::open(['route' => ['backend.flower.update', $flower->id], 'method' => 'PUT', 'files' => true])!!}
                {!! Form::hidden('id', $flower->id) !!}
            @else
                {!! Form::open(['route' => 'backend.flower.store', 'method' => 'post', 'files' => true]) !!}
            @endif

            <div class="form-group">
                <label>Name</label>
                {!!Form::text('title', isset($flower) ? $flower->title : old('title'), ['class' => 'form-control', 'placeholder' => 'flower name'] ) !!}
                {!! $errors->first('title', '<span class="help-block error">:message</span>') !!}
            </div>

            <div class="form-group">
                <label>Description</label>
                {!!Form::textarea('description', isset($flower) ? $flower->description : old('description'), ['class' => 'form-control', 'placeholder' => ''] ) !!}
                {!! $errors->first('description', '<span class="help-block error">:message</span>') !!}
            </div>

            <div class="form-group">
                <label>Price</label>
                <div class="input-group">
                    <span class="input-group-addon">$</span>
                    {!!Form::text('price', isset($flower) ? $flower->price : old('price'), ['class' => 'form-control', 'placeholder' => '10'] ) !!}
                </div>
                {!! $errors->first('price', '<span class="help-block error">:message</span>') !!}
            </di
            <div class="form-group">
                <label>Stock</label>
                {!!Form::text('stock', isset($flower) ? $flower->stock : old('stock'), ['class' => 'form-control', 'placeholder' => '100'] ) !!}
                {!! $errors->first('stock', '<span class="help-block error">:message</span>') !!}
            </div>

            <div class="form-group">
                <label>Publish {!!Form::checkbox('state', 1, isset($flower) ? $flower->state : old('state')) !!}</label>
                {!! $errors->first('description', '<span class="help-block error">:message</span>') !!}
            </div>
            <div class="flower-items">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Flower Items</h3>
                    </div>
                    <div class="panel-body timeline-group-body" id="flower-group-body">
                        @if(isset($flower))
                            <?php
                            $count = !empty(old('flower_form_count')) ? old('flower_form_count') : 0;
                            $flo_count = isset($flower) ? $flower->items->count() : 1;
                            ?>
                            {!! Form::hidden('flower_form_count', $flo_count) !!}
                            @for($i = 0; $i < $flo_count ; $i++)
                                <div id="flower-form-{{$i}}" class="flower-form form-group clearfix">
                                    {!! Form::hidden("flower_id[$i]", $flower->items->toArray()[$i]['id'], ['class' => 'flower_id']) !!}
                                    <div class="info">
                                        <div class="form-group col-md-3 image">
                                            <img id="preview_{{$i}}" alt="Image" width="100" height="100" class="pull-left" title="Image" src="{{isset($flower) ? asset($flower->items->toArray()[$i]['image']) : NULL}}"/>
                                            {!! Form::file("flower_image[$i]", ['onchange' => "$('#preview_".$i."')[0].src = window.URL.createObjectURL(this.files[0]); console.log($(this));" ]) !!}
                                            {!! $errors->first('flower_image.'.$i, '<span class="help-block error">:message</span>') !!}

                                        </div>
                                        <div class="form-group col-md-8 text">
                                            <label>Title</label>
                                            {!!Form::text("flower_title[$i]", isset($flower) ? $flower->items->toArray()[$i]['title'] : NULL, ['class' => 'form-control','placeholder' => '', 'rows' => 3] ) !!}
                                            {!! $errors->first('flower_title.'.$i, '<span class="help-block error">:message</span>') !!}
                                        </div>
                                        <div class="form-group col-md-1 task">
                                            <div class="btn-group"><button type="button" class="flower-btn-delete btn btn-danger"><i class="fa fa-trash"></i></button></div>
                                        </div>
                                    </div>
                                </div>
                            @endfor

                            @for($i = $flo_count; $i <  $count ; $i++)
                                <div id="flower-form-{{$i}}" class="flower-form form-group clearfix">
                                    {!! Form::hidden("flower_id[$i]", 0, ['class' => 'flower_id']) !!}
                                    <div class="info">
                                        <div class="form-group col-md-3 image">
                                            <img id="preview_{{$i}}" alt="Image" width="100" height="100" class="pull-left" title="Image" src=""/>
                                            {!! Form::file("flower_image[$i]", ['onchange' => "$('#preview_".$i."')[0].src = window.URL.createObjectURL(this.files[0]); console.log($(this));" ]) !!}
                                            {!! $errors->first('flower_image.'.$i, '<span class="help-block error">:message</span>') !!}

                                        </div>
                                        <div class="form-group col-md-8 text">
                                            <label>Title</label>
                                            {!!Form::text("flower_title[$i]", null, ['class' => 'form-control','placeholder' => '', 'rows' => 3] ) !!}
                                            {!! $errors->first('flower_title.'.$i, '<span class="help-block error">:message</span>') !!}
                                        </div>
                                        <div class="form-group col-md-1 task">
                                            <div class="btn-group"><button type="button" class="flower-btn-delete btn btn-danger"><i class="fa fa-trash"></i></button></div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        @else
                            <input type="hidden" value="1" name="flower_form_count">
                            <?php $count = !empty(old('flower_form_count')) ? old('flower_form_count') : 1; ?>
                            {!! Form::hidden('flower_form_count', $count) !!}
                            @for($i = 0; $i < $count ; $i++)
                                <div id="flower-form-{{$i}}" class="flower-form form-group clearfix">
                                    {!! Form::hidden("flower_id[$i]", 0, ['class' => 'flower_id']) !!}
                                    <div class="info">
                                        <div class="form-group col-md-3 image">
                                            <img id="preview_{{$i}}" alt="Image" width="100" height="100" class="pull-left" title="Image" src=""/>
                                            {!! Form::file("flower_image[$i]", ['onchange' => "$('#preview_".$i."')[0].src = window.URL.createObjectURL(this.files[0]); console.log($(this));" ]) !!}
                                            {!! $errors->first('flower_image.'.$i, '<span class="help-block error">:message</span>') !!}

                                        </div>
                                        <div class="form-group col-md-8 text">
                                            <label>Title</label>
                                            {!!Form::text("flower_title[$i]", null, ['class' => 'form-control','placeholder' => '', 'rows' => 3] ) !!}
                                            {!! $errors->first('flower_title.'.$i, '<span class="help-block error">:message</span>') !!}
                                        </div>
                                        <div class="form-group col-md-1 task">
                                            <div class="btn-group"><button type="button" class="flower-btn-delete btn btn-danger"><i class="fa fa-trash"></i></button></div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        @endif

                    </div>
                    <div class="panel-footer">
                        <p class="text-center"><button class="btn btn-info flower-btn-addnew" type="button">Add New flower</button></p>
                    </div>
                </div>
            </div>
            <div class="form-group">
                {!! Form::button('Cancel', ['class' => 'btn btn-warning', 'onclick' => 'window.history.back()']) !!}
                @if(isset($flower))
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
    <script>
        $(function () {
            $('.date-picker').datepicker({})

            $(document).on('click','.flower-btn-desc', function(){
                var parent = $(this).closest('.flower-form');
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
            $('.flower-btn-addnew').click(function(){
                var flower_form = create_form();
                $('#flower-group-body').append(flower_form);

            });
            /**
             * Delete the form
             */
            $(document).on('click','.flower-btn-delete', function(){
                var thisEl = $(this), parent = thisEl.closest('.flower-form'),
                    tid = $('.flower_id', parent).val();
                if( tid > 0 ) {
                    if(confirm("Are you sure you want to delete the selected record ?")) {
                        $('body').append('<div class="loading-animate"></div>');
                        var path = '{{url("backend/floweritem")}}/' + tid;
                        $.ajax({
                            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                            url: path,
                            type: "DELETE",
                            success: function (data) {
                                $('.loading-animate').fadeOut();
                                if (data.status) {
                                    parent.before('<div class="flower-alert-flash alert alert-success" role="alert">Delete Success</div>');
                                    parent.slideUp(400, function () {
                                        $(this).remove();
                                        $('.flower-alert-flash').delay(500).fadeOut(500, function () {
                                            $(this).remove();
                                        });
                                    });
                                    create_form_number('-');
                                }
                            },
                            error: function () {
                                $('.loading-animate').fadeOut();
                                parent.before('<div class="flower-alert-flash alert alert-danger" role="alert">Error! Please check and try again!</div>');
                                $('.flower-alert-flash').delay(3000).fadeOut(500, function () {
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
                    flower = $('<div class="flower-form form-group clearfix"></div>'),
                    form_string = '<input type="hidden" name="flower_id['+id+']" value="0" class="flower_id">';
            form_string += '<div class="row"><div class="col-md-3 col-lg-3 image">';
            form_string += '<img id="preview_'+id+'" class="pull-left" width="100" height="100" src="" title="Image" alt="Image">';
            form_string += '<input type="file" name="flower_image['+id+']" onchange="$(\'#preview_'+id+'\')[0].src = window.URL.createObjectURL(this.files[0]); console.log($(this));">';
            form_string += '</div><div class="col-md-8 col-lg-8 text"><label>Title</label>';
            form_string += '<input type="text" name="flower_title['+id+']" placeholder="" class="form-control">';
            form_string += '</div><div class="col-md-1 col-lg-1 task"><div class="btn-group"><button type="button" class="flower-btn-delete btn btn-danger"><i class="fa fa-trash"></i></button></div></div></div>';
            flower.attr('id', 'flower-form-'+ id);
            flower.append(form_string);
            return flower;
        }

        /**
         * Count
         */
        function create_form_number(type) {
            var id = $('[name="flower_form_count"]').val();
            if(type == '-')
                $('[name="flower_form_count"]').val(parseInt(id) - 1);
            else
                $('[name="flower_form_count"]').val(parseInt(id) + 1);
            return id;
        }
    </script>
@stop
