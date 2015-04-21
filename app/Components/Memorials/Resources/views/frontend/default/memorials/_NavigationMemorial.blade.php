<section class="memorial-wrap section" style="background-image: url('{{get_template_directory() . '/images/profile-bg.png'}}')">
    <div class="container-fluid">
        <div class="row memorial-header">
            <div class="container">
                <div class="row">
                    <div class="avatar col-md-3 col-lg-3 col-sm-12 col-xs-12">
                        <a href="{{asset($memorial->avatar)}}" class="fancybox"><img src="{{asset($memorial->avatar)}}" alt="{{$memorial->name}}"/></a>
                    </div>
                    <div class="info col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <h2 class="name">{{$memorial->name}}</h2>
                        <ul class="memorial-date date-group list-unstyled list-inline">
                            <li class="birthday">{{$memorial->present()->getBirthday}}</li>

                            <li class="death">{{$memorial->present()->getDeath}}</li>
                        </ul>
                        <div class="maried">Maried to <a href="#">Marie  Johnson</a></div>
                        <div class="buried-address">Buried in {{$memorial->buried}}</div>
                        <button data-toggle="modal" data-target="#memorial-map-modal" class="btn btn-default btn-view-map" data-lat="{{$memorial->lat}}" data-lng="{{$memorial->lng}}">Find on map <i class="fa fa-map-marker"></i></button>
                    </div>
                    <div class="relationship col-md-3 col-lg-3 col-sm-12 col-xs-12">
                        <div class="relationship-list">
                            <h3 class="title">Connected Users <span class="label label-info">102</span></h3>
                            <ul class="users-list">
                                <li><a href="#"><img src="{{get_template_directory() . '/images/user.png'}}" alt="User Name"/></a></li>
                                <li><a href="#"><img src="{{get_template_directory() . '/images/c1.jpg'}}" alt="User Name"/></a></li>
                                <li><a href="#"><img src="{{get_template_directory() . '/images/c1.jpg'}}" alt="User Name"/></a></li>
                                <li><a href="#"><img src="{{get_template_directory() . '/images/c1.jpg'}}" alt="User Name"/></a></li>
                                <li><a href="#"><img src="{{get_template_directory() . '/images/c1.jpg'}}" alt="User Name"/></a></li>
                                <li class="view-more"><a href="#"><span>99+</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row memorial-navigation">
            <div class="container">
                <div class="row">
                    <ul class="menu">
                        {!! HTML::nav_link($memorial->present()->getProfilePath, '<i class="fa fa-user"></i><span>Profile</span>') !!}
                        {!! HTML::nav_link($memorial->present()->getBiographyPath, '<i class="fa fa-file"></i><span>Biography</span>') !!}
                        {!! HTML::nav_link($memorial->present()->getPhotoAlbumsPath, '<i class="fa fa-camera"></i><span>Photos</span>') !!}
                        {!! HTML::nav_link($memorial->present()->getVideosPath, '<i class="fa fa-video-camera"></i><span>Videos</span>') !!}
                        {!! HTML::nav_link($memorial->present()->getGuestbooksPath, '<i class="fa fa-book"></i><span>Guestbook</span>') !!}
                        {!! HTML::nav_link($memorial->present()->getFamilyPath, '<i class="fa fa-group"></i><span>Family</span>') !!}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section><!-- /#memorial -->
<!-- Modal -->
<div class="modal fade" id="memorial-map-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div id="memorial-map" style="height:500px;"></div>
            </div>
        </div>
    </div>
</div>
@include('Dashboard::frontend.default._layouts._message')