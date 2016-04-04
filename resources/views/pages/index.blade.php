@extends('layouts.home-content')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-xs-12 col-sm-12 padding-remove background-white">
                <div class="col-md-12 padding-10">
                    @include('partials.carousel')
                </div>
                <div class="col-md-12">
                    <div class="row padding-10 box-shadow">
                        <div class="col-md-6">
                            <div class="media Media__Horizontal--Tile">
                                <a class="pull-left" href="./video.php">
                                    <img class="media-object" src="http://placehold.it/100x90" alt="Image">
                                </a>
                                <div class="media-body">
                                    <h5 class="media-heading">Videos</h5>
                                    <p>Browse our selections of videos</p>
                                    <a href="./video.php">read more</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="media Media__Horizontal--Tile">
                                <a class="pull-left" href="./faq.php">
                                    <img class="media-object" src="http://placehold.it/100x90" alt="Image">
                                </a>
                                <div class="media-body">
                                    <h5 class="media-heading">FAQ</h5>
                                    <p>Select from a list if common questions.</p>
                                    <a href="./faq.php">read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row padding-10 text-center Media__Horizontal">
                        @include('partials.random-products')
                    </div>
                </div>
            </div>
            <div class="col-md-4 padding-remove hidden-xs hidden-sm">
                <div class="col-md-12">
                    @include('partials.top-products')
                </div>
                <div class="col-md-12">
                    @include('partials.latest-updates')
                </div>
            </div>
        </div>
    </div>
@stop