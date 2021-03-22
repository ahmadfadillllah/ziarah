<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ asset('form/images/satgas.png') }}" type="image/x-icon">

    <!-- Title Page-->
    <title>Form Pendaftaran</title>


    <!-- Icons font CSS-->
    <link href="{{ asset('form/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet"
        media="all">
    <link href="{{ asset('form/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="{{ asset('form/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('form/vendor/datepicker/daterangepicker.css') }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset('form/css/main.css') }}" rel="stylesheet" media="all">

    {{-- SweetAlerts2 --}}
    <script src="{{ asset('sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
    <script src="{{ asset('sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('sweetalert2/dist/sweetalert2.min.css') }}">

    <style>
        .suggestion-box {
            position: absolute;
            background-color: #ffffff;
            box-shadow: 0 0 5px #91919152;
            padding: 8px;
            border-radius: 5px;
            left: 0;
            width: 100%;
            z-index: 100;
            max-height: 300px;
            overflow-y: auto;
        }

        .suggestion-box .sugg-item {
            border: none;
            outline: none;
            padding: 8px 5px;
            position: relative;
            width: 100%;
            color: #666666;
            text-transform: capitalize;
            font-size: 15px;
            cursor: pointer;
            transition: all .5s;
        }

        .suggestion-box .sugg-item:hover {
            background-color: rgba(236, 236, 236, 0.425);
            color: #777777;
        }

        .d-none {
            display: none;
        }

        .select-wrapper {
            position: relative;
            width: 350px;
        }

        .select-wrapper::after {
            color: black;
            content: '▾';
            margin-right: 10px;
            pointer-events: none;
            position: absolute;
            right: 10px;
            top: 7px;
            font-size: 20px;
        }

        .select {
            -moz-appearance: none;
            -webkit-appearance: none;
            background: white;
            border: none;
            border-radius: 0;
            cursor: pointer;
            padding: 12px;
            width: 100%;
            font-size: 18px;
        }

        .select:focus {
            color: black;
        }

        .select::-ms-expand {
            display: none;
        }

        .btn-disabled {
            cursor: wait;
            background: #c5c5c5 !important;
        }
    </style>

    <style>
        div.action-sect {
            position: relative;
            margin-top: 15px;
            display: flex;
            justify-content: space-between;
        }

        .thumb {
            position: relative;
            width: 100px
        }

        .thumb img {
            width: 100%
        }
    </style>

    <script type="module" src="{{ asset('assets/alpinejs/dist/alpine.js') }}"></script>
    <script nomodule src="{{ asset('assets/alpinejs/dist/alpine-ie11.js') }}" defer></script>

    @livewireStyles
    @livewireScripts

</head>

<body>

    @yield('content')

    <!-- Jquery JS-->
    <script src="{{ asset('form/vendor/jquery/jquery.min.js') }}"></script>
    <!-- Vendor JS-->
    <script src="{{ asset('form/vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('form/vendor/datepicker/moment.min.js') }}"></script>
    <script src="{{ asset('form/vendor/datepicker/daterangepicker.js') }}"></script>

    <!-- Main JS-->
    <script src="{{ asset('form/js/global.js') }}"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
