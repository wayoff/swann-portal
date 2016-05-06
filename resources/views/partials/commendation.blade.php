<style>
    .Commendation__Body {
      max-height: 300px;
      overflow-y: scroll;
    }
</style>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Commendations</h3>
    </div>
    <div class="panel-body Commendation__Body">
        @if($commendations->isEmpty())
            <div class="alert alert-info">
                No Featured Products Yet
            </div>
        @else
            @foreach($commendations as $commendation)
              <div class="media Home__Media">
                <a class="pull-left" href="#">
                  <img class="media-object Home__Media--object" src="{{$commendation->photo->getImage()}}">
                </a>
                <div class="media-body Home__Media--body">
                  <h4 class="media-heading" style="font-size:16px;">{{$commendation->name}}</h4>
                  <p>" {{$commendation->testimonial}} "</p>
                </div>
              </div>
            @endforeach
        @endif
    </div>
</div>