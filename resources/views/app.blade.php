<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Los michis @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>

<body class="bg-secondary" style="min-width:800px">
    <!-- App Navigator -->
    <header class="shadow-sm w-100 p-0 m-0 fixed-top">
        <div class="navbar navbar-expand-sm bg-light">
            <div class="col-3 d-flex navbar-brand align-items-center m-0">
                <h5 class="align-item-center p-2 m-0 text-dark">Los michis</h5>
            </div>
            <div class="col-9">
                <ul class="navbar-nav justify-content-end align-items-center">
                    <li class="nav-item px-5">
                        <a href="/" class="nav-link text-dark">Inicio</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <!-- Body -->
    <body>
        @yield('Content')
    </body>

    <!-- Footer -->
    <div class="footer col-12 px-5 py-2 bg-light text-dark d-none d-sm-none d-md-none d-lg-flex fixed-bottom" id="footer">
        <div class="w-100 text-center d-inline-block">
            Contactanos: (456)-123-45-65
        </div>
    </div>

    <div class="footer col-12 px-5 py-2 bg-light text-dark d-block d-lg-none d-xl-none fixed-bottom" id="footer">
        <div class="col-12 text-center">
            Contactanos: (456)-123-45-65
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

    <!-- Modal -->
    @yield('Modal')

    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/Usuario.js')}}"></script>
    <script src="{{asset('js/Mascota.js')}}"></script>
    <script src="{{asset('js/MasSolicitado.js')}}"></script>
</body>

</html>