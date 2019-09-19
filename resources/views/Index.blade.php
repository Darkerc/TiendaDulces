<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/app.css">
        <link href="/images/png/017-sensible.png" rel="shortcut icon" type="image/x-icon" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Tienda Dulceria</title>
    </head>
    <body>
        <div id="app">
            <app></app>
        </div>
        <script src="/js/app.js"></script>
    </body>
</html>
