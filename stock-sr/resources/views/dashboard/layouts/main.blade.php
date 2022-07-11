<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Dashboard | SR Semarang</title>

        <link rel="shortcut icon" type="image/png" href="/img/favicon.jpg">

        <!-- Bootstrap CSS -->
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> -->
        <link rel="stylesheet" href="/css/bootstrap.css">

        
        <!-- Bootsrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

        <!-- Custom styles for this template -->
        <link href="/css/dashboard.css" rel="stylesheet" />

        <!-- Trix Editor -->
        <link rel="stylesheet" type="text/css" href="/css/trix.css">
        <script type="text/javascript" src="/js/trix.js"></script>

        <!-- FONT -->
        <style>
            @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap");
            trix-toolbar [data-trix-button-group="file-tools" ]{
                display:none;
            }
        </style>

    </head>
    <body>

        @include('dashboard.layouts.header')

        <div class="container-fluid">
            <div class="row">

                @include('dashboard.layouts.sidebar')
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    @yield('container')
                </main>
            </div>
        </div>

        <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script> -->
        <script src="/js/bootstrap.bundle.js"></script>
        <script src="/js/bootstrap.bundle.js.map"></script>

        <script src="/js/dashboard.js"></script>

    </body>
</html>

