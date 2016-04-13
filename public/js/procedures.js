$(function() {
    $(".select2").select2({
    ajax: {
        url: "/api/products",
        dataType: 'json',
        delay: 250,
        // headers : {
        //     'X-CSRF-TOKEN' : $('#token').data('content')
        // },
        data: function (params) {
            return {
                q: params.term, // search term
                page: params.page
            };
        },
    processResults: function (data, params) {
        var results = [];

        for (var i = data.length - 1; i >= 0; i--) {
            var result = {
                id : data[i].id,
                text : data[i].name,
            };

            results.push(result);
        }

        return {results: results}
    },
        cache: true
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
        minimumInputLength: 3
    });

    $('.select2-default').select2();
});