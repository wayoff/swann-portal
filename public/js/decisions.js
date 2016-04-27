new Vue({
    el: '#app',
    data : {
        url: '/api/decisions',
        newTree: '',
        tree: {
            data : [],
            show : false
        },
        procedureId: $('#procedure_id').data('content'),
        decisions: []
    },
    ready : function() {
        this.fetch();
    },
    methods: {
        fetch: function() {
            $.get(this.url,{procedureId : this.procedureId})
             .success( function(response) {
                this.decisions = response;
             }.bind(this));
        },

        addTree: function() {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN' : $('#token').data('content')
                },
                url: this.url,
                method: 'POST',
                data: {
                    'title': this.newTree,
                    'procedureId': this.procedureId,
                }
            })
            .success( function(response) {
                this.fetch();
            }.bind(this))
            .error( function(error) {
                alert('Oops!! Something went wrong. Will Refresh the page');
                window.location.reload();
            });
        },

        viewTree: function(decision) {
            this.tree.show = true;
            $.get(this.url + '/' + decision.id)
             .success( function(response) {
                this.tree = {
                    data : response,
                    show : true
                };
             }.bind(this));
        }
    }
});