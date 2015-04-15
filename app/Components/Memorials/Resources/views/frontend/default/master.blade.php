@include('Memorials::frontend.default._layouts._header')

<div id="wrapper">

<!-- Navigation -->
@include('Memorials::frontend.default._layouts.NavigationPartial')

    @yield('content')

</div>
<!-- /#wrapper -->


@include('Memorials::frontend.default._layouts._footer')