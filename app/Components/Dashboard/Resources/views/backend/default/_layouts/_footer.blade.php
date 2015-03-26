    <!-- jQuery -->
    <script src="{{asset('public/backend/default/bower_components/jquery/dist/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('public/backend/default/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{asset('public/backend/default/bower_components/metisMenu/dist/metisMenu.min.js')}}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{asset('public/backend/default/dist/js/sb-admin-2.js')}}"></script>
    <script>
        $(function(){
            $('.form-delete').submit(function(){
                return confirm("Are you sure you want to delete the selected record ?");
            });
        }(jQuery));
    </script>
    @section('scripts')

    @show
</body>
</html