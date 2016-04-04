    <div class="col-md-12 Footer padding-remove">
        <div class="Footer__List">
            <div class="col-md-4">
                <div class="Footer__Title Footer__Title-border">
                    Swann Technical Support
                </div>
                <p class="Footer__Description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit accusamus enim, doloremque molestias quas totam fuga ipsam adipisci fugiat laudantium excepturi suscipit minus possimus accusantium, unde facere maiores. Expedita, dolor.</p>
            </div>
            <div class="col-md-4">
                <div class="Footer__Title Footer__Title-border">
                    Feeds
                </div>
                <p class="Footer__Description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit accusamus enim dolor.</p>
            </div>
            <div class="col-md-4">
                <div class="Footer__Title Footer__Title-border">
                    <span>Other</span>
                </div>
                <p class="Footer__Description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit accusamus enim, doloremque molestias quas totam fuga ipsam adipisci fugiat laudantium excepturi suscipit minus possimus accusantium, unde facere maiores. Expedita, dolor.</p>
            </div>
        </div>

        <div class="col-md-12 Footer__Copyright">
            <span class="text-underline text-bold">Swann Portal</span> | Powered by: <a href="http://fullpotentialbpo.com/" class="text-underline text-bold Footer__FPBPO" target="_blank">Fullpotential BPO Inc</a> copyright &#9400; <?php echo date('Y') != 2016 ? '2016 - ' .  date('Y') : 2016; ?> . All Rights Reserved.
        </div>
    </div>

    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
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
        });
    </script>
</body>
</html>