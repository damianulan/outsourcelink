<!doctype html>
<html lang="{{ config('app.locale')}}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>{{ config('app.name')}} - {{$title}}</title>

        <meta name="description" content="Employee recruitment system">
        <meta name="author" content="Damian Ułan">
        <meta name="robots" content="noindex, nofollow">

        <link rel="shortcut icon" href="{{ asset('media/favicons/favicon-128.png') }}">
        <link rel="icon" type="image/png" sizes="128x128" href="{{ asset('media/favicons/favicon-128.png') }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap">
        @yield('page-stylesheets')
        <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/template.css') }}">
    </head>
    <body>
        <div id="page-loader" class="show"></div>
