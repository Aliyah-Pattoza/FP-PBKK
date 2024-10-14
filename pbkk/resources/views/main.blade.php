
<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') - Travelling Indonesia</title>
    <meta name="description" content="Travelling Indonesia">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="{{ asset('style/assets/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/scss/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div class="navbar-header">
               <!-- <a class="navbar-brand" href="">MyTravel</a>
                <a class="navbar-brand hidden" href="">T</a> -->
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{ url('home') }}"> <i class="menu-icon fa fa-home"></i>Home</a>
                    </li>
                    <li>
                        <a href="{{ url('vehicles') }}"> <i class="menu-icon fa fa-car"></i>Vehicle</a>
                    </li>
                    <li>
                        <a href="{{ url('cities') }}"> <i class="menu-icon fa fa-building"></i>City</a>
                    </li>
                    <li>
                        <a href="{{ url('packages') }}"> <i class="menu-icon fa fa-archive"></i>Packages</a>
                    </li>
                    <li>
                        <a href="{{ url('bookings') }}"> <i class="menu-icon fa fa-book"></i>Bookings</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="header-menu">
                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left">
                        <i class="fa fa-tasks"></i>
                    </a>
                    <div class="header-left">
                        <button class="search-trigger">
                            <i class="fa fa-search"></i>
                        </button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit">
                                    <i class="fa fa-close"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
    
                <div class="col-sm-5 d-flex justify-content-end align-items-center">
                    <ul class="navbar-nav">
                        @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Welcome back, {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/"><i class="bi bi-layout-text-sidebar-reverse"></i>My Dashboard</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <form action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="bi bi-box-arrow-right"></i>Logout</a>
                                </button>
                            </form>
                            </ul>
                        </li>
                        @else
                            <li class="nav-item">
                                <a href="/login" class="nav-link"><i class="bi bi-box-arrow-in-right"></i>Login</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </header>
    
        <!-- Header-->
        @yield('breadcrumbs')
        @yield('content')
    </div>

    <script src="{{ asset('style/assets/js/vendor/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('style/assets/js/main.js') }}"></script>
</body>
</html>