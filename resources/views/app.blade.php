<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Los michis @yield('title')</title>
    
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<body class="bg-light">
    <!-- App Navigato- lg and xl screens -->
    <header class="shadow-sm col-12 p-0 m-0 d-none d-sm-none d-md-none d-lg-block">
        <div class="navbar navbar-light navbar-expand-lg bg-mainColor">
            <div class="col-3 d-flex navbar-brand align-items-center">
                <a href="/user" class="align-item-center p-0 m-0"><img src="{{ URL::to('assets/Logo_large.png') }}" alt="Home" class="img-fluid HomeLink"></a>
                <h5 class="align-item-center p-2 m-0 text-light">Los michis</h5>
            </div>
            <div class="col-9">
                <ul class="navbar-nav justify-content-end align-items-center">
                    <li class="nav-item">
                        <a href="/user" class="nav-link text-light">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a href="/appointment" class="nav-link text-light">Appointments</a>
                    </li>
                    <li class="nav-item">
                        <a href="/product" class="nav-link text-light">Inventory</a>
                    </li>
                    <li class="nav-item">
                        <a href="/record" class="nav-link text-light">Record</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <!-- App Navigator sm to md screens -->
    <header class="shadow-sm col-12 p-0 m-0 d-block d-lg-none d-xl-none">
        <div class="pos-f-t">
            <div class="collapse" id="navbarToggleExternalContent">
                <div class="bg-mainColor p-4">
                    <div class="navbar navbar-light navbar-expand-lg bg-mainColor">
                        <div class=>
                            <ul class="navbar-nav justify-content-end">
                                <li class="nav-item">
                                    <a href="/user" class="nav-link text-light">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a href="/appointment" class="nav-link text-light">Appointments</a>
                                </li>
                                <li class="nav-item">
                                    <a href="/product" class="nav-link text-light">Inventory</a>
                                </li>
                                <li class="nav-item">
                                    <a href="/record" class="nav-link text-light">Record</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-dark bg-mainColor">
                <h3 class="align-item-center p-2 m-0 text-light">Vet-Zoo</h3>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            </nav>
        </div>
    </header>

    <!-- Body -->
    <body>
        @yield('Content')
    </body>

    <!-- Footer -->
    <div class="footer col-12 px-5 py-2 bg-mainColor text-light d-none d-sm-none d-md-none d-lg-flex" id="footer">
        <div class="col-6 text-center d-inline-block">
            <a href="" class="text-white">
                <i class="fab fa-facebook-square"></i>
            </a>
            <a href="" class="text-white">
                <i class="fab fa-instagram-square"></i>
            </a>
            <a href="" class="text-white">
                <i class="fab fa-twitter-square"></i>
            </a>
        </div>
        <div class="col-6 text-center d-inline-block">
            Contactanos: (456)-123-45-65
        </div>
    </div>

    <div class="footer col-12 px-5 py-2 bg-mainColor text-light d-block d-lg-none d-xl-none" id="footer">
        <div class="col-12 text-center">
            <a href="" class="text-white">
                <i class="fab fa-facebook-square"></i>
            </a>
            <a href="" class="text-white">
                <i class="fab fa-instagram-square"></i>
            </a>
            <a href="" class="text-white">
                <i class="fab fa-twitter-square"></i>
            </a>
        </div>
        <div class="col-12 text-center">
            Contactanos: (456)-123-45-65
        </div>
    </div>

    <!-- Modal -->
    @yield('Modal')

    <script src="{{asset('js/app.js')}}"></script>
</body>

</html>