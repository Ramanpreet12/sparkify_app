@extends('../layout/base')

@section('body')
    <body class="py-5">
        @yield('content')
        @include('../layout/components/dark-mode-switcher')
        @include('../layout/components/main-color-switcher')

        <!-- BEGIN: JS Assets-->
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBG7gNHAhDzgYmq4-EHvM4bqW1DNj2UCuk&libraries=places"></script>
        <script src="{{ mix('dist/js/app.js') }}"></script>
        <script src="{{ asset('dist/js/jquery.min.js') }}"></script>
        <!-- END: JS Assets-->

        <!-- BEGIN: Datatables -->
        <script src="{{asset('dist/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('dist/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{{ URL::asset('js/jquery.dataTables.bootstrap.min.js')}}}"></script>
        <!-- END: Datatables-->

        <!-- BEGIN: Sweet alert -->
        <script src="{{asset('dist/js/sweetalert.min.js')}}"></script>

        <!-- BEGIN: Custom js -->
        <script src="{{asset('dist/js/custom.js')}}"></script>

        {{-- @yield('script') --}}
        @stack('script')
    </body>
@endsection
