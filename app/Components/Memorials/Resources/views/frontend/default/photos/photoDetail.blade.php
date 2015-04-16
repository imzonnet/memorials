<div id="photo-modal" class="photo-modal modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close btn-photo-close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <img src="{{$photo->image}}" alt="{{$photo->title}}" title="{{$photo->title}}"/>
            </div>
            <div class="modal-body">
                <h2 class="title">{{$photo->title}}</h2>
                <div class="modal-comments">
                    <div class="header">
                        <div class="user-wrap">
                            <div class="user">
                                <img class="avatar" src="{{$memorial->avatar}}" alt=""/>
                                <div class="info">
                                    <h3>{{$memorial->name}}</h3>
                                    <div class="date death"><i class="fa fa-calendar"></i> {{$memorial->death}}</div>
                                </div>
                            </div>
                            <ul class="social-share">
                                <li>Share:</li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                        @if(current_user())
                        <div class="comment-form">
                            <img class="avatar" src="{{current_user()->avatar}}" alt=""/>
                            {!! Form::open(['route' => ['ajax.comment', 'photo', $photo->id], 'method' => 'post', 'class' => 'form-comment-form']) !!}
                                <div class="input-group">
                                    {!! Form::hidden("parent_id", 0) !!}
                                    {!! Form::hidden("photo_id", $photo->id) !!}
                                    <input type="text" name="text" placeholder="Type your comment..." class="form-control" value="">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-comment-submit btn-default">Post Comments</button>
                                    </span>
                                </div>
                            {!! Form::close() !!}
                        </div>
                        @endif
                    </div>

                    <div class="content">
                        <div id="comments-list" class="comments-list">
                            @foreach($comments as $comment)
                                @if($comment->parent_id == 0)
                                <div id="comment-item-{{$comment->id}}" class="comment-item">
                                    <img class="avatar" src="{{asset($comment->user->avatar)}}" alt=""/>
                                    <div class="comment-detail">
                                        <div class="comment-user">
                                            <h3>{{$comment->user->name}}</h3>
                                            <div class="date death"><i class="fa fa-calendar"></i> {{$comment->present()->getTime}}</div>
                                        </div>
                                        <span class="comment-time"><i class="fa fa-clock-o"></i> {{$comment->present()->getTimeAgo}}</span>
                                        <div class="comment-content">
                                            <p>{{$comment->text}}</p>
                                        </div>
                                        <ul class="comment-task">
                                            <li class="reply"><a href="#" class="btn-comment-reply"><i class="fa fa-mail-reply"></i></a></li>
                                            <li class="like"><a href="{{route('ajax.comment.like', ['photo', $comment->id])}}" class="btn-comment-like"><i class="fa fa-heart-o"></i></a></li>
                                            <li class="comments-count"><a href="#" class="btn-comment-reply"><i class="fa fa-comment-o"></i> {{$comment->commentsChild()}}</a></li>
                                        </ul>
                                        <div id="comments-children-{{$comment->id}}" class="comments-children hide">
                                            @foreach($comments as $comment2)
                                                @if($comment2->parent_id == $comment->id)
                                                <div class="comment-item">
                                                    <img class="avatar" src="{{asset($comment2->user->avatar)}}" alt=""/>
                                                    <div class="comment-detail">
                                                        <div class="comment-user">
                                                            <h3>{{$comment2->user->name}}</h3>
                                                            <div class="date death"><i class="fa fa-calendar"></i> {{$comment2->present()->getTime}}</div>
                                                        </div>
                                                        <span class="comment-time"><i class="fa fa-clock-o"></i> {{$comment2->present()->getTimeAgo}}</span>
                                                        <div class="comment-content">
                                                            <p>{{$comment2->text}}</p>
                                                        </div>
                                                        <ul class="comment-task">
                                                            <li class="like"><a href="{{route('ajax.comment.like', ['photo', $comment2->id])}}" class="btn-comment-like"><i class="fa fa-heart-o"></i> {{$comment2->likes}}</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                @endif
                                            @endforeach
                                            @if(current_user())
                                            <!-- comment form -->
                                                <div id="comment-form-{{$comment->id}}" class="comment-form">
                                                    <img class="avatar" src="{{current_user()->avatar}}" alt=""/>
                                                    {!! Form::open(['route' => ['ajax.comment', 'photo', $photo->id], 'method' => 'post', 'class' => 'form-comment-form']) !!}
                                                    <div class="input-group">
                                                        {!! Form::hidden("parent_id", $comment->id) !!}
                                                        {!! Form::hidden("photo_id", $photo->id) !!}
                                                        <input type="text" name="text" placeholder="Type your reply..." class="form-control" value="">
                                                        <span class="input-group-btn">
                                                            <button type="button" class="btn btn-comment-submit btn-default">Post Comments</button>
                                                        </span>
                                                    </div>
                                                    {!! Form::close() !!}
                                                </div>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-slg btn-photo-close" data-dismiss="modal">Close Window</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    <script>
        $(document).ready(function(){

        });
    </script>
</div><!-- /.modal -->