<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{{ asset('storage/favicon/favicon.ico') }}}">

    <title>Blog @yield('title', '')</title>

    <link href="/css/bootstrap.min.css" rel="stylesheet">    
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/vendor/slick/slick.css" rel="stylesheet" type="text/css">
    <link href="/vendor/slick/slick-theme.css" rel="stylesheet" type="text/css">

    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/lodash/4.13.1/lodash.js"></script>
  </head>

  <body>