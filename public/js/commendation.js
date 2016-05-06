( function() {
    $('.paragraph').fadeOut();
    var count = 1;
    $('.paragraph').each( function(index, element) {
        setTimeout( function() {
            $('.paragraph').hide();
            $(element).fadeIn();
        }.bind(element), count );
        count += 5000;
    });
}());