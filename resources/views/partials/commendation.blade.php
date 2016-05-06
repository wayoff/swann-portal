<style>
    .Commendation__Body {
      max-height: 300px;
      overflow-y: scroll;
    }
    .paragraph__image {
      width: 90px;
      height: 70px;
      padding: 5px;
    }
</style>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Commendations</h3>
    </div>
    <div class="panel-body Commendation__Body">
        @if($commendations->isEmpty())
            <div class="alert alert-info">
                No Commendations Yet
            </div>
        @else
            @foreach($commendations as $commendation)
            <div class="paragraph">
              <p>
                <img class="pull-left paragraph__image" src="{{$commendation->photo->getImage()}}"><strong>{{$commendation->name}}</strong> <br>" {{$commendation->testimonial}} "
              </p>
            </div>
            @endforeach

        @endif
    </div>
</div>