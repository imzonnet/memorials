
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
    <script src="{{asset('public/assets/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('public/assets/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/assets/jquery.bxslider/jquery.bxslider.min.js')}}"></script>
    <script src="{{asset('public/templates/default/js/main.js')}}"></script>
    @section('scripts')

    @show
</body>
</html>