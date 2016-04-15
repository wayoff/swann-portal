@extends('layouts.descriptive-content')

@section('Page__Title', 'LMI Sessions')

@section('content')
<div id="app" class="hide">
  <div class="row">
      <div class="col-md-6 col-md-offset-3">
          <div class="list-group">
            <button 
              class="list-group-item"
              v-for="session in sessions"
              :class="{'active': session.user_id == user.id}"
              v-on:click="post(session)"
            >
              <span class="badge">@{{ session.updated_at }}</span>
              <span style="font-size: 1.2em;">@{{session.name}} - <strong>@{{session.user.name}}</strong></span>
            </button>
          </div>
      </div>
  </div>
</div>
@stop

@section('footer')
  <script src="/js/vue.js"></script>
  <script>
    new Vue({
      el : '#app',
      data : {
        sessions : [],
        url : "{{url('api/lmi-sessions')}}",
        user : {},
        ajax : null,
        active : null,
        interval : {
          func : null,
          seconds : 5000
        }
      },
      ready : function() {
        $('#app').removeClass('hide');
        this.user = $('#user').data('content');
        this.repeater(this.fetch);
      },
      methods : {
        fetch : function() {
            $.get(this.url, function(response) {
                this.sessions = response;
            }.bind(this));
        },
        repeater : function(callback) {
          this.interval.func = setInterval( this.fetch, this.interval.seconds);
          callback();
        },
        post : function(session) {
          if (this.active == session.id && this.ajax != null) {
              this.ajax.abort();
              this.ajax = null;
              return alert('Please wait atleast 2 seconds before activating new session');
          }
          this.active = session.id;
          clearInterval(this.interval.func);
          var userId = session.user_id == this.user.id 
                      ? null
                      : this.user.id;

          if (userId != null) {
            session.user_id = this.user.id;
            session.user = this.user;
          } else {
            session.user_id = null;
            session.user = {};
          }
          this.ajax = $.ajax({
            type: 'POST',
            url: this.url,
            headers: {
                "X-CSRF-TOKEN": $('#_token').data('content')
            },
            data : { id : session.id, 'user_id' : userId}
          }).done(function(response) {
            this.ajax = null;
            this.repeater(this.fetch);
          }.bind(this));

        }
      }
    });
  </script>
@stop