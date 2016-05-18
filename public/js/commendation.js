( function() {
    $('.paragraph').fadeOut();
    var last = $('.paragraph').length - 1;

    function rerender()
    {
        var count = 1;
        $('.paragraph').each( function(index, element) {
            setTimeout( function() {
                $('.paragraph').hide();
                $(element).fadeIn();
                console.log(index, last);
                if (index == last) {
                    console.log('i should render right?');
                    setTimeout( function() {
                        rerender();
                    }, 10000);
                }
            }.bind(element, index), count );
            count += 10000;
        });
    }

    rerender();
}());