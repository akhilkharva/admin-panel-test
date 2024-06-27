<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | Nazox - Responsive Bootstrap 4 Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link rel="shortcut icon" href="{{ URL::asset('/assets/images/favicon.ico')}}">
    {{--    not needed conflicting with theme css--}}
    {{--<link rel="stylesheet" href="{{ asset('css/app.css') }}">--}}
    @livewireStyles
    {{--<livewire:head />--}}
    @include('layouts.head')
    {{--    not needed conflicting with theme js--}}
    {{--    <script src="{{ mix('js/app.js') }}" defer></script>--}}
</head>
@section('body')
@show
<body data-sidebar="dark">

<div id="layout-wrapper">
    <livewire:topbar/>
    <livewire:sidebar/>
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <main class="container my-5">
                    @include('flash::message')
                    @yield('content')
                </main>

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        <livewire:footer/>
    </div>
    <!-- end main content-->
</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
<livewire:right-sidebar/>

<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->
@stack('modals')

@livewireScripts

@stack('scripts')
<livewire:vendor-scripts/>
</body>
</html>
