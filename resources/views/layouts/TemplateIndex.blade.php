<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Tienda Online</title>
    <link href="/images/png/017-sensible.png" rel="shortcut icon" type="image/x-icon" />
    <link type="text/css" rel="stylesheet" href="/css/index.css" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  </head>
  <body>

    <div id="app">

        @if (Session::has('TIENDA'))

        @include('layouts.Navbar')

        @endif

        <div class="contenedorPrincipal">

            @yield('container')

        </div>

        @include('layouts.Footer')

    </div>

    <div>

        <script type="text/javascript" src="/js/vue.js"></script>
        <script type="text/javascript" src="/js/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="/js/JSGeneral.js"></script>
        @yield("scripts")

    </div>
  </body>
</html>


