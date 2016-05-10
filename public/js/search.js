$(document).ready( function() {
    $('input.typeahead').typeahead({
      source: function (query, process) {
        $.ajax({
          url: '/keywords',
          type: 'GET',
          dataType: 'JSON',
          data: 'q=' + query,
          success: function(data) {
            process(data);
          }
        });
      }, 
      afterSelect: function (item) {
        $('#search__form').submit();
      }
  });
    
    $('#search__field').focus().val($('#search__field').val());
});
