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
            </div>
            <div class="col-md-4">
                <div class="Footer__Title Footer__Title-border">
                    Feeds
                </div>
                <p class="Footer__Description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit accusamus enim dolor.</p>
            </div>
            <div class="col-md-4">
                <div class="Footer__Title Footer__Title-border">
                    <span>Links</span>
                </div>
                <p class="Footer__Description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit accusamus enim, doloremque molestias quas totam fuga ipsam adipisci fugiat laudantium excepturi suscipit minus possimus accusantium, unde facere maiores. Expedita, dolor.</p>
            </div>
        </div>

        <div class="col-md-12 Footer__Copyright">
            <span class="text-underline text-bold">Swann Portal</span> | Powered by: <a href="http://fullpotentialbpo.com/" class="text-underline text-bold Footer__FPBPO" target="_blank">Fullpotential BPO Inc</a> copyright &#9400; {{ date('Y') != 2016 ? '2016 - ' .  date('Y') : 2016}} . All Rights Reserved.
        </div>
    </div>

    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/bootstrap-typeahead.min.js"></script>
    <script src="/js/search.js"></script>
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
</body>
</html>