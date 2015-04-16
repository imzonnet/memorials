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
            <li class="like"><a href="{{route('ajax.comment.like', ['photo', $comment->id])}}" class="btn-comment-like"><i class="fa fa-heart-o"></i> {{$comment->likes}}</a></li>
        </ul>
    </div>
</div>