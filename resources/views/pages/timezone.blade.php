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
                    data-time="{{\Carbon\Carbon::now()->timestamp * 1000}}"
                ></span>
            </div>
        </div>
        <div class="row">
          @foreach($timezones as $key => $value)
            <div class="col-md-3 text-center Question">
                <span class="Timezone__Title">
                  {{string_slug_to_word('_', $key)}}
                </span>
                @php
                  $carbon = \Carbon\Carbon::now($value);
                  $new = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $carbon->toDateTimeString());
                @endphp
                <span 
                    class="Timezone" 
                    data-value="{{$value}}"
                    data-key="{{$key}}"
                    data-time="{{$new->timestamp * 1000}}"
                    data-timezone="{{$carbon->timezoneName}}"
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
              var data = {
                value : $(this).data('value'),
                key : $(this).data('key'),
                time : $(this).data('time'),
                timezone : $(this).data('timezone')
              };
              var time = $(this).data('time');
              console.log(data);
              $(this).clock({"timestamp": time});
            });
        });
    </script>
@stop