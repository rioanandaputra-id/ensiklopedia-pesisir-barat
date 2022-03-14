<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link href="{{ asset('assets/Frontend/css/core.style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/Frontend/css/colorbox.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/Frontend/css/style.css') }}" rel="stylesheet" type="text/css">
    <link type="text/css" rel="stylesheet" media="all" href="{{ asset('assets/Frontend/css/skin.css') }}">
    <style>
        .bg-white {
            background-color: #fff;
            padding: 20px;
        }

        .bg-grey {
            background-color: #e5e5e5;
            padding: 1px;
        }

        .activered {
            background-color: red;
            color: white;
        }
    </style>
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

    <script type="text/javascript" src="{{ asset('assets/Frontend/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/Frontend/js/form.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/Frontend/js/gui.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/Frontend/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/Frontend/js/jquery.colorbox-min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/Frontend/js/jquery.jcarousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/Frontend/js/supersized.3.2.7.min.js') }}"></script>
    {{-- <script type="text/javascript">
        jQuery(function ($) {
            $.supersized({
                slides: [{
                    image: "{{ asset('assets/Frontend/img/1.jpg') }}"
                },
                {
                    image: "{{ asset('assets/Frontend/img/2.jpg') }}"
                },
                {
                    image: "{{ asset('assets/Frontend/img/3.jpg') }}"
                },
                {
                    image: "{{ asset('assets/Frontend/img/4.jpg') }}"
                },
                ]
            });
        });
    </script> --}}
    @yield('js')

</body>

</html>
