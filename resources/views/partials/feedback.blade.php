<div class="Feedback">
    <div class="panel panel-primary">
        <div class="panel-heading" data-target="#Feedback__Body" data-toggle="collapse">
            <h3 class="panel-title">Feedback</h3>
        </div>
        <div class="panel-body collapse" id="Feedback__Body">
            <form role="form" id="Feedback__Form">
                {!! csrf_field() !!}
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter Name" name="name" required>
                </div>
                <div class="form-group">
                    <textarea name="content" cols="20" rows="5" class="form-control" placeholder="Enter Feedback" required></textarea>
                </div>
            
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </form>
        </div>
    </div>
</div>

<script>
    $( function() {
        $('#Feedback__Form').on('submit', function(e) {
            var data = $(this).serialize();
            $.ajax({
                url : '/api/feedbacks',
                method : 'post',
                data : data
            }).success( function() {
                alert('Thank you for your feedback');
                $('#Feedback__Form .form-control').val('');
            }).error( function(e) {
                console.log(e);
                alert('Something went wrong, Please Try again');  
            });
            e.preventDefault();
        });
    });
</script>