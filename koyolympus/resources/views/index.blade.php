<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device=width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>koyolympus</title>

    {{--  <!-- Styles -->--}}
    {{--  <link href="{{ mix('/css/app.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('/css/index.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/reset.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>
<body>
<div id="app">
    <background-image-component></background-image-component>
</div>
<!-- Script -->
<script src="{{ mix('/js/app.js') }}" defer></script>
</body>
</html>
