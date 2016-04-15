@extends('layouts.descriptive-content')

@section('Page__Title', 'Timezone')

@section('header')
<style>
    #clock {
        position: relative;
        width: 600px;
        height: 600px;
        margin: 20px auto 0 auto;
        background: url(/img/clockface.jpg);
        list-style: none;
        }

    #sec, #min, #hour {
        position: absolute;
        width: 30px;
        height: 600px;
        top: 0px;
        left: 285px;
        }

    #sec {
        background: url(/img/sechand.png);
        z-index: 3;
        }
       
    #min {
        background: url(/img/minhand.png);
        z-index: 2;
        }
       
    #hour {
        background: url(/img/hourhand.png);
        z-index: 1;
        }
        
    p {
        text-align: center; 
        padding: 10px 0 0 0;
        }
</style>

@stop
@section('content')
<div class="row">
    <div class="col-md-12">
        <ul id="clock"> 
            <li id="sec"></li>
            <li id="hour"></li>
            <li id="min"></li>
        </ul>
    </div>
</div>
@stop

@section('footer')
    <script>
        $(document).ready(function() {
              setInterval( function() {
              var seconds = new Date().getSeconds();
              var sdegree = seconds * 6;
              var srotate = "rotate(" + sdegree + "deg)";
              
              $("#sec").css({"-moz-transform" : srotate, "-webkit-transform" : srotate});
                  
              }, 1000 );
         
              setInterval( function() {
              var hours = new Date().getHours();
              var mins = new Date().getMinutes();
              var hdegree = hours * 30 + (mins / 2);
              var hrotate = "rotate(" + hdegree + "deg)";
              
              $("#hour").css({"-moz-transform" : hrotate, "-webkit-transform" : hrotate});
                  
              }, 1000 );
        
              setInterval( function() {
              var mins = new Date().getMinutes();
              var mdegree = mins * 6;
              var mrotate = "rotate(" + mdegree + "deg)";
              
              $("#min").css({"-moz-transform" : mrotate, "-webkit-transform" : mrotate});
                  
              }, 1000 );
        }); 
    </script>
@stop