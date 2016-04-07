
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="/js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/js/bootstrap.min.js"></script>
    <script>
        $(document).ready( function() {
            $('.btn-delete').on('click', function(e) {
                if(confirm('Deleting data cannot be undone. Are you sure about this? ')) {
                    return true;
                }

                e.preventDefault();
            });

            // $('form').on('submit', function() {
            //     $($(this).find(':submit').attr('disabled', 'disabled');
            // });
        });
    </script>
    @yield('footer')
</body>

</html>
