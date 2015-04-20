
    <footer id="section-footer" class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    ©2015 Memorial - <a href="#">Terms</a> - <a href="#">Privacy</a>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <ul class="list-unstyled list-inline text-right">
                        <li><img src="{{get_template_directory().'/images/qr.png'}}" alt=""/></li>
                        <li><img src="{{get_template_directory().'/images/android.png'}}" alt=""/></li>
                        <li><img src="{{get_template_directory().'/images/ios.png'}}" alt=""/></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer><!-- /#footer -->

    <!-- jQuery -->
    <script src="{{asset('assets/jquery/dist/jquery.min.js?v=2.13')}}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('assets/bootstrap/dist/js/bootstrap.min.js?v=3.0')}}"></script>
    <script src="{{asset('assets/jquery.bxslider/jquery.bxslider.min.js?v=4.1.2')}}"></script>
    <script src="{{asset('assets/fancybox/jquery.fancybox.js?v=2.1.5')}}"></script>
    <script src="{{asset('assets/readmore.min.js?v=2.1.5')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
    <script src="{{asset('templates/frontend/default/js/gmap.js?v=1.0')}}"></script>
    @section('scripts')

    @show
    <script src="{{asset('templates/frontend/default/js/main.js?v=1.0')}}"></script>
</body>
</html>