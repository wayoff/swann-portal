    <style>
        .Footer__Description--list-li {
            font-size: 0.9em;
        }
        .Footer__Description--list-li > a {
            text-decoration: none;
            color: #B2DBFB;
            margin-bottom: 5px;
        }
        .Footer__Description--list-li > a:hover {
            color: #0A6EBD;
        }
        .Footer__Description--list {
            list-style: none;
        }
        .Footer__Description--list {
            list-style: none;
        }
    </style>
    <div class="col-md-12 Footer padding-remove">
        <div class="container-fluid">
            <div class="Footer__List">
                <div class="col-md-4">
                    {{-- <div class="Footer__Title Footer__Title-border">
                        Swann Technical Support
                    </div>
                    <span class="Footer__Title--smaller">North America Support</span>
                    <ul class="Footer__Description Footer__Description--list">
                        <li class="Footer__Description--list-li">USA & Canada Telephone: <span class="text-underline">1800 627 2799</span> (Toll Free)</li>
                    </ul>
                    <span class="Footer__Title--smaller">Australia & New Zealand Support</span>
                    <ul class="Footer__Description Footer__Description--list">
                        <li class="Footer__Description--list-li">Australia Telephone: <span class="text-underline">1800 788 210</span> <br /> (Toll-free for fixed lines. call rates may apply for mobile and payphones)  </li>
                        <li class="Footer__Description--list-li">New Zealand Telephone: <span class="text-underline">0800 479 266</span> (Toll Free)  </li>
                        <li class="Footer__Description--list-li">International Telephone: <span class="text-underline">+61 3 8412 4610</span></li>
                    </ul>
                    <span class="Footer__Title--smaller">UK & Europe</span>
                    <ul class="Footer__Description Footer__Description--list">
                        <li class="Footer__Description--list-li">UK Telephone Support: <span class="text-underline"> +44 808 168 9031</span> (Toll Free)</li>
                    </ul> --}}
                    {!! $footers->where('position', 1)->first()->content !!}
                </div>
                <div class="col-md-4">
                    <div class="Footer__Title Footer__Title-border">
                        Products
                    </div>
                    <ul class="Footer__Description Footer__Description--list">
                        @foreach($categories->sortBy('order') as $category)
                            @if($category->children->count() === 0)
                                <li class="Footer__Description--list-li">
                                    <a href="{{ route('categories.{id}.products.index', $category->id) }}">
                                        - </span> {{ $category->name }}
                                    </a>
                                </li>
                            @else
                                <li class="Footer__Description--list-li">
                                    <a href="{{ route('categories.{id}.products.index', $category->id) }}"> - </span> {{ $category->name }} </a>
                                    <ul class="Footer__Description Footer__Description--list">
                                        @foreach($category->children->sortBy('order') as $children)
                                            @if($children->children->count() === 0)
                                                <li class="Footer__Description--list-li">
                                                    <a href="{{ route('categories.{id}.products.index', $children->id) }}">
                                                        - </span> {{ $children->name }}
                                                    </a>
                                                </li>
                                            @else
                                                <li class="Footer__Description--list-li">
                                                    - </span> <a href="{{ route('categories.{id}.products.index', $children->id) }}"> {{ $children->name }} </a>
                                                    <ul class="Footer__Description Footer__Description--list">
                                                        @foreach($children->children->sortBy('order') as $grand)
                                                            <li class="Footer__Description--list-li">
                                                                - </span> <a href="{{ route('categories.{id}.products.index', $grand->id) }}">
                                                                    {{$grand->name}}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                    </li>
                </div>
                <div class="col-md-3">
                    <div class="Footer__Title Footer__Title-border">
                        <span>Links</span>
                    </div>

                    <ul class="Footer__Description Footer__Description--list">
                        <li class="Footer__Description--list-li"> - <a target="_blank" href="http://www.swann.com/us/apps"> Software and Apps </a></li>
                        <li class="Footer__Description--list-li">
                            - <a target="_blank" href="https://www.the-qrcode-generator.com/">UID Generator</a>
                        </li>
                        <li class="Footer__Description--list-li"> - <a target="_blank" href="http://50.16.231.7/iotc/pl/uid.html"> UID checker </a></li>
                        <li class="Footer__Description--list-li"> - <a target="_blank" href="https://docs.google.com/spreadsheets/d/1yeSUlf8FD_oo46KBbP4Vp1YiK53XOxn5tBUmk9sA7Gc/edit#gid=147956106"> Compatibility Chart </a></li>
                        <li class="Footer__Description--list-li"> - <a target="_blank" href="https://docs.google.com/spreadsheets/d/1Fc9Qr03vBYsFbcRgdOuBW9QFmkH9vj-1ZR4mnWxJU9M/edit#gid=937416735">Call Reason Guide </a></li>
                        <li class="Footer__Description--list-li">
                            - <a target="_blank" href="https://docs.google.com/spreadsheets/d/1Fc9Qr03vBYsFbcRgdOuBW9QFmkH9vj-1ZR4mnWxJU9M/edit#gid=1176855535">Costco Codes</a>
                        </li>
                        <li class="Footer__Description--list-li">
                            - <a target="_blank" href="https://docs.google.com/spreadsheets/d/1rcP_eL37txhevWfHR13BhFQhtwsistm0yalApfaio04/edit?pref=2&pli=1#gid=0">
                                Firmware Update Table
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
    </div>

        <div class="col-md-12 Footer__Copyright">
            <span class="text-underline text-bold">Internal KBaze</span> | Powered by: <a href="http://fullpotentialbpo.com/" class="text-underline text-bold Footer__FPBPO" target="_blank">Fullpotential BPO Inc</a> copyright &#9400; {{ date('Y') != 2016 ? '2016 - ' .  date('Y') : 2016}} . All Rights Reserved.
        </div>
    </div>
    <div class="modal fade" id="schedule_modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Schedule</h4>
                </div>
                <div class="modal-body">
                    @if(!empty($schedule))
                        <div class="embed-responsive embed-responsive-16by9">
                          <iframe class="embed-responsive-item" data-src="{{$schedule->document->getDocument()}}" id="schedule_frame"></iframe>
                        </div>
                    @else
                        <div class="alert alert-info">
                            No Schedule yet
                        </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Ok</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="supervisor_password_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Password Confirmation</h4>
                </div>
                <div class="modal-body">
                        <div class="form-group">
                            <label class="sr-only" for="">Enter Password</label>
                            <input type="password" class="form-control" id="_supervisor_password_text" placeholder="Enter Password Here">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="supervisor_password_modal_btn">Submit</button>
                </div>
            </div>
        </div>
    </div>


    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/bootstrap-typeahead.min.js"></script>
    <script src="/js/search.js"></script>
    <script src="/js/terms-agreement.js"></script>
    <script src="/js/commendation.js"></script>
    <script src="/video/mediaelement-and-player.min.js"></script>
    <script src="/video/mediaelementplayer.min.js"></script>
    <script src="/js/jquery.magnific-popup.min.js"></script>
    
    @include('partials.feedback')
    <script>
        $( function() {
            $('.Sidebar__Toggle').hover(function() {
                $(this).addClass('active');
                $('.Sidebar').addClass('active');
            });
            $('.Home__Container').hover(function() {
                $('.Sidebar__Toggle').removeClass('active');
                $('.Sidebar').removeClass('active');
            });

            var defaultPlaceholder = 'Search ....';

            $('.Navbar__Form--input')
                .attr('placeholder', defaultPlaceholder)
                .on('focus', function() {
                    $(this).attr('placeholder', 'Press Enter to search');
                }).on('focusout', function() {
                    $(this).attr('placeholder', defaultPlaceholder);
                });

        });
        $(window).load( function() {
            $('video').mediaelementplayer({
            features: ["playpause","progress","current","duration","volume","fullscreen"],
            success:  function (mediaElement, domObject) { 
                    mediaElement.addEventListener("ended", function(e){ 
                        var $thisMediaElement = (mediaElement.id) ? $("#"+mediaElement.id) : $(mediaElement);
                        $thisMediaElement.parents(".mejs-inner").find(".mejs-poster").hide();
                    });
                }
            });
            $('[data-toggle="tooltip"]').tooltip();
        });

        $(document).ready( function() {
            // $('.image-link').magnificPopup({
            //     type:'image'
            // });
            
            $('.gallery').each(function() { // the containers for all your galleries
                $(this).magnificPopup({
                    delegate: 'a', // the selector for gallery item
                    type: 'image',
                    gallery: {
                      enabled:true
                    }
                });
            });
            // var carouselImages = function() {
            //     var items = [];

            //     $('.Carousel__Item--img').each( function() {
            //         items.push({src: $(this).attr('src') });
            //     });


            //     return items.reverse();
            // };

            // $('.Carousel__Item').magnificPopup({
            //     items: carouselImages(),
            //     gallery: {
            //       enabled: true
            //     },
            //     type: 'image' // this is default type
            // });


            $('.Carousel__Item--img').magnificPopup({
              type: 'image'
              // other options
            });
                
            $('#_schedule').on('click', function() {
                var frame = $('#schedule_frame');
                    frame.attr('src', frame.data('src'));
            });

            var announcement = {
                data : $('#announcement').data('content'),
                interval : (60 * 1000) * 5,
                active : 0,
                last : $('#announcement').data('content').length - 1,
                target : $('#Annimate__Text'),
                handle : function() {
                    if (this.data.length == 0) {
                        return;
                    }

                    this.target.html(this.data[0].content);

                    if (this.last == this.active) {
                        return;
                    }

                    this.active++;

                    setInterval( function() {
                        this.target.html(this.data[this.active].content);

                        this.active == this.last
                            ? this.active = 0
                            : this.active ++;

                    }.bind(this), this.interval);
                }
            }

            announcement.handle();
        });
    </script>
    @yield('footer')
</body>
</html>