<!DOCTYPE html>
<html>

<head>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">

    {{-- Global Theme Styles (used by all pages) --}}
    @foreach(config('master.resources.css') as $style)
       <link href="{{ asset($style) }}" rel="stylesheet" type="text/css" />
    @endforeach

    <script src="https://code.highcharts.com/highcharts.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=0.9">
</head>

<body>
    <!-- Sidenav -->
    <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-dark bg-gradient-default" id="sidenav-main">
        <div class="scrollbar-inner">
            <!-- Brand -->
            <div class="sidenav-header d-flex align-items-center">
                <a class="navbar-brand" href="javascript:void(0)">
                    <span class="sidebar-brand-text mx-2 text-white">
                       <b>
                            Fahni
                        </b>
                    </span>
                </a>
                <div class="ml-auto">
                    <!-- Sidenav toggler -->
                    <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin"
                        data-target="#sidenav-main">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line bg-light"></i>
                            <i class="sidenav-toggler-line bg-light"></i>
                            <i class="sidenav-toggler-line bg-light"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Nav items -->
                    <ul class="navbar-nav">
                        @include('Template.Menu._view')
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        <nav class="navbar navbar-top navbar-expand navbar-dark bg-default">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Navbar links -->
                    <ul class="navbar-nav align-items-center ml-md-auto">
                        <li class="nav-item d-xl-none">
                            <!-- Sidenav toggler -->
                            <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin"
                                data-target="#sidenav-main">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line bg-light"></i>
                                    <i class="sidenav-toggler-line bg-light"></i>
                                    <i class="sidenav-toggler-line bg-light"></i>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header -->
        <div class="header bg-default pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="align-items-center py-4 d-flex justify-content-between">
                        <div id="content-button">
                            @yield('content-button')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card py-4 px-4">
                        @yield('content-body')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Argon Scripts -->
    {{-- Global Theme JS Bundle (used by all pages)  --}}
    @foreach(config('master.resources.js') as $script)
        <script src="{{ asset($script) }}" type="text/javascript"></script>
    @endforeach

    @yield('content-modal')

    @yield('content-js')
</body>

</html>
