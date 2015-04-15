@include('Dashboard::frontend.default._layouts._header')

<div id="wrapper">

<!-- Navigation -->
@include('Dashboard::frontend.default._layouts.NavigationPartial')

    @yield('content')

</div>
<!-- /#wrapper -->


@include('Dashboard::frontend.default._layouts._footer')