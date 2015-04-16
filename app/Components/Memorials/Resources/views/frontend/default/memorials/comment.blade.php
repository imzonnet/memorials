<div class="comment-item">
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
            <li class="reply"><a href="{{route('ajax.comment.like', ['photo', $comment->id])}}" class="btn-comment-reply"><i class="fa fa-mail-reply"></i></a></li>
            <li class="like"><a href="{{route('ajax.comment.like', ['photo', $comment->id])}}" class="btn-comment-like"><i class="fa fa-heart-o"></i></a></li>
            <li class="comments-count"><a href="#"><i class="fa fa-comment-o"></i> {{$comment->likes}}</a></li>
        </ul>
        <div id="comments-children-{{$comment->id}}" class="comments-children">

            <!-- comment form -->
            <div id="comment-form-child-{{$comment->id}}" class="comment-form">
                <img class="avatar" src="{{current_user()->avatar}}" alt=""/>
                {!! Form::open(['route' => ['ajax.comment', 'photo', $comment->photoItem->id], 'method' => 'post', 'class' => 'form-comment-form']) !!}
                <div class="input-group">
                    {!! Form::hidden("parent_id", $comment->id) !!}
                    {!! Form::hidden("photo_id", $comment->photoItem->id) !!}
                    <input type="text" name="text" placeholder="Type your reply..." class="form-control" value="">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-comment-submit btn-default">Post Comments</button>
                    </span>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>