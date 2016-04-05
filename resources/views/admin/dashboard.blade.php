@extends('admin.layouts.content')

@section('Page__Description')
    Dashboard
@stop

@section('Breadcrumb')
    <ol class="breadcrumb">
        <li class="active">
            <i class="fa fa-dashboard"></i>  <a href="#">Dashboard</a>
        </li>
    </ol>
@stop

@section('Content')
    <div id="content">
        <div class="text-center">
            <i class="fa fa-spinner fa-spin fa-3x"></i>
        </div>
    </div>
@stop

@section('footer')
    <script>
        $.getJSON("http://quotesondesign.com/wp-json/posts?filter[orderby]=rand&filter[posts_per_page]=1&callback=", function(a) {
            $("#content").html(a[0].content + "<p>&mdash; " + a[0].title + "</p>")
        });
    </script>
@stop