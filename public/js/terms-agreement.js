( function() {
    $('#supervisor_password_modal_btn').on('click', function() {
        var password = $('#_supervisor_password_text').val();

        $.get('/api/agreements/check', { password : password})
         .success( function(response) {
            if (response.status === 1) {
                window.location.href = '/agreements';
                location.location.href = '/agreements';
            } else {
                $('#_supervisor_password_text').val('');
                alert('Invalid Password');
            }
         })
         .error( function(e) {
            console.log(e);
            alert('Oops!! Something went wrong please try again');
         });
    });
})();