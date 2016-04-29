<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('Title', 'Internal KBaze')</title>
    <link rel="stylesheet" href="/css/non-admin.css">
    <link href="/video/mediaelementplayer.min.css" rel="stylesheet">
    <link rel="icon" 
          type="image/png" 
          href="/favicon.png">
    <style>
    .mejs-poster {
        display: none !important;
    }
    </style>
    <meta id="_token" data-content="{{csrf_token()}}">
    @yield('header')
</head>
<body>
