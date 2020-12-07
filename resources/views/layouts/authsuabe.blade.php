<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="{{ asset('assets/bootstrap.css') }}">

        <title>SUABE - @yield('titulo')</title>
    </head>
    <body class="">
        <div class="page">
            <div class="page-single">
                <div class="container">
                    <div class="row">
                        <div class="col col-8 mx-auto">
                            <div class="text-center mb-6 d-block">
                                <img src="{{ asset('suabe.png') }}" class="h-6" alt = "" >
                            </div>

                            @yield('contenido')

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    </body>
</html>