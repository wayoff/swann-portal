    <div class="col-md-12 Footer padding-remove">
        <div class="Footer__List">
            <div class="col-md-4">
                <div class="Footer__Title Footer__Title-border">
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
                </ul>
            </div>
            <div class="col-md-4">
                <div class="Footer__Title Footer__Title-border">
                    Feeds
                </div>
                <p class="Footer__Description">-</p>
            </div>
            <div class="col-md-4">
                <div class="Footer__Title Footer__Title-border">
                    <span>Links</span>
                </div>
                <p class="Footer__Description">"Click here to see the links for softwares and apps that we have
                    <a href="http://www.swann.com/us/apps">http://www.swann.com/us/apps</a> "
                </p>
            </div>
        </div>

        <div class="col-md-12 Footer__Copyright">
            <span class="text-underline text-bold">Swann Portal</span> | Powered by: <a href="http://fullpotentialbpo.com/" class="text-underline text-bold Footer__FPBPO" target="_blank">Fullpotential BPO Inc</a> copyright &#9400; {{ date('Y') != 2016 ? '2016 - ' .  date('Y') : 2016}} . All Rights Reserved.
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
                    <button type="button" class="btn btn-primary" id="supervisor_password_modal_btn">Save changes</button>
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
    </script>
    @yield('footer')
</body>
</html>