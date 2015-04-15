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
                                <img class="avatar" src="http://memorials.com/public/templates/default/images/user.png" alt=""/>
                                <div class="info">
                                    <h3>{{$photo->user->name}}</h3>
                                    <div class="date death"><i class="fa fa-calendar"></i> {{$photo->created_at}}</div>
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
                            <form action="#">
                                <div class="input-group">
                                    <input type="text" placeholder="Search for Memorial Page" class="form-control">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-default">Post Comments</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                        @endif
                    </div>

                    <div class="content">
                        <div class="comments-list">
                            @foreach($comments as $comment)
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
                                        <li class="reply"><a href="#"><i class="fa fa-mail-reply"></i></a></li>
                                        <li class="like"><a href="#"><i class="fa fa-heart-o"></i></a></li>
                                        <li class="comments-count"><a href="#"><i class="fa fa-comment-o"></i> {{$comment->likes}}</a></li>
                                    </ul>
                                </div>
                            </div>
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
</div><!-- /.modal -->