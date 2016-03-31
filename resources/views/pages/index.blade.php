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
                        <div class="col-md-4">
                            <img src="http://placehold.it/174x126" alt="image">
                            <h5>Title</h5>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            </p>
                        </div>
                        <div class="col-md-4">
                            <img src="http://placehold.it/174x126" alt="image">
                            <h5>Title</h5>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            </p>
                        </div>
                        <div class="col-md-4">
                            <img src="http://placehold.it/174x126" alt="image">
                            <h5>Title</h5>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 padding-remove hidden-xs hidden-sm">
                <div class="col-md-12">
                    <div class="list-group">
                        <a href="#" class="list-group-item">
                            <h5 class="list-group-item-heading">Top Product Name</h5>
                            <p class="list-group-item-text">Lorem ipsum dolor sit amet</p>
                        </a>
                        <a href="#" class="list-group-item">
                            <h5 class="list-group-item-heading">Top Product Name</h5>
                            <p class="list-group-item-text">Lorem ipsum dolor sit amet</p>
                        </a>
                        <a href="#" class="list-group-item">
                            <h5 class="list-group-item-heading">Top Product Name</h5>
                            <p class="list-group-item-text">Lorem ipsum dolor sit amet</p>
                        </a>
                        <a href="#" class="list-group-item">
                            <h5 class="list-group-item-heading">Top Product Name</h5>
                            <p class="list-group-item-text">Lorem ipsum dolor sit amet</p>
                        </a>
                        <a href="#" class="list-group-item">
                            <h5 class="list-group-item-heading">Top Product Name</h5>
                            <p class="list-group-item-text">Lorem ipsum dolor sit amet</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="panel panel-primary">
                      <div class="panel-heading">
                        <h3 class="panel-title"> Latest Updates</h3>
                      </div>
                      <div class="panel-body">
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/100x90" alt="Image">
                            </a>
                            <div class="media-body">
                                <h5 class="media-heading">Media heading</h5>
                                <p>Text goes here...</p>
                            </div>
                        </div>
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/100x90" alt="Image">
                            </a>
                            <div class="media-body">
                                <h5 class="media-heading">Media heading</h5>
                                <p>Text goes here...</p>
                            </div>
                        </div>
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/100x90" alt="Image">
                            </a>
                            <div class="media-body">
                                <h5 class="media-heading">Media heading</h5>
                                <p>Text goes here...</p>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop