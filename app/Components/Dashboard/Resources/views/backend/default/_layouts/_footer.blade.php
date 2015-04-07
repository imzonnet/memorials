    <!-- jQuery -->
    <script src="{{asset('public/assets/jquery/dist/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('public/assets/bootstrap/dist/js/bootstrap.min.js')}}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{asset('public/backend/default/bower_components/metisMenu/dist/metisMenu.min.js')}}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{asset('public/backend/default/dist/js/admin.js')}}"></script>
    <script src="{{asset('public/assets/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('public/assets/ckeditor/adapters/jquery.js')}}"></script>
    <script src="{{asset('public/backend/default/bower_components/DataTables/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('public/backend/default/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript">
        $(function(){
            $('.form-delete').submit(function(){
                return confirm("Are you sure you want to delete the selected record ?");
            });
            //$( 'textarea.editor-ckeditor' ).ckeditor();
            $('.dataTables').DataTable({
                responsive: true
            });
        }(jQuery));
    </script>
    @section('scripts')

    @show
</body>
</html