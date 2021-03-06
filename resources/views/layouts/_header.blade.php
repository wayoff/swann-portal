<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('Title', 'Internal KBaze')</title>
    <link rel="stylesheet" href="/css/non-admin.css">
    <link href="/video/mediaelementplayer.min.css" rel="stylesheet">
    <!-- Magnific Popup core CSS file -->
    <link rel="stylesheet" href="/css/magnific-popup.css">

    <link rel="icon" 
          type="image/png" 
          href="/favicon.png">
    <style>
    .mejs-poster {
        display: none !important;
    }
    .list-hover > li {
        padding: 5px 5px;
        transition: background-color 0.6s;
    }
    .list-hover > li:hover {
        background-color: #F2F2F2;
    }
    </style>
    <meta id="_token" data-content="{{csrf_token()}}">
    @yield('header')
</head>
<body>
