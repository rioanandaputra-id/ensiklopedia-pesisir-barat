<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link href="{{ asset('assets/css/core.style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/colorbox.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">
    <link type="text/css" rel="stylesheet" media="all" href="{{ asset('assets/css/skin.css') }}">
    @yield('css')
</head>

<body>

    @section('topbar')
    @include('Layouts.Frontend.topbar')
    @show

    @section('navbar')
    @include('Layouts.Frontend.navbar')
    @show

    <div class="content">
        <div class="container">
            @yield('content')


        </div>
    </div>


    @section('footer')
    @include('Layouts.Frontend.footer')
    @show

    <script type="text/javascript" src="{{ asset('assets/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/form.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/gui.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.colorbox-min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.jcarousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/supersized.3.2.7.min.js') }}"></script>
    <script type="text/javascript">
        jQuery(function ($) {
            $.supersized({
                slides: [{
                    image: "{{ asset('assets/img/1.jpg') }}"
                },
                {
                    image: "{{ asset('assets/img/2.jpg') }}"
                },
                {
                    image: "{{ asset('assets/img/3.jpg') }}"
                },
                {
                    image: "{{ asset('assets/img/4.jpg') }}"
                },
                ]
            });
        });
    </script>
    @yield('js')

</body>

</html>
