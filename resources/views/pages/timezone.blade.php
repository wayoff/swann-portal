@extends('layouts.descriptive-content')

@section('Page__Title', 'Timezone: <u>' . $title . '</u>')

@section('header')
  <link rel="stylesheet" href="/css/jqClock.css">
@stop

@section('content')
  <div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3 col-md-offset-5 text-center Question">
                <span class="Timezone__Title">
                  Philippines
                </span>
                <span 
                    class="Timezone"
                    data-key='Asia/Manila'
                ></span>
            </div>
        </div>
        <div class="row">
          @foreach($timezones as $key => $value)
            <div class="col-md-3 text-center Question">
                <span class="Timezone__Title">
                  {{string_slug_to_word('_', $key)}}
                </span>
                <span 
                    class="Timezone" 
                    data-key="{{$value}}"
                ></span>
            </div>
          @endforeach
        </div>
    </div>
  </div>
@stop

@section('footer')
    <script src="/js/moment/moment.js"></script>
    <script src="/js/moment/moment-locales.js"></script>
    <script src="/js/moment/moment-timezone.js"></script>
    <script src="/js/jqClock.js"></script>
    <script>
        $(function() {
          var CurrentDate = moment.utc().format('YYYY-MM-DD hh:mm');
            $('.Timezone').each(function(index) {
              var key = $(this).data('key');
              console.log(CurrentDate);
              var time = moment.utc().tz(CurrentDate, key).valueOf();
              console.log(time);
              $(this).clock({"timestamp": time});
            });
        });
    </script>
@stop