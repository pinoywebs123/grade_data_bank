<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{URL::to('css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{URL::to('css/fullcalendar.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{URL::to('css/fullcalendar.print.min.css')}}"  media='print'>

        <title>Laravel</title>

        <style type="text/css">
            body{
                background: #51555b;
              

                }
            #calendar {
                max-width: 900px;
                margin: 0 auto;
            }
            nav{
                margin-bottom: 0px !important;
            }
            .navbar-default{
                background-color: #337ab7 !important;
                border: 2px solid #74a2ed;
                
                
            }
            .navbar-default .navbar-nav>li>a{
                color: #fff !important;
            }
            .navbar-default .navbar-brand{
                color: #fff !important;
            }
            .navbar-default .navbar-collapse, .navbar-default .navbar-form{
                background-color: #337ab7 !important;
            }
            .navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:focus, .navbar-default .navbar-nav>.active>a:hover{
                background-color: #337ab7;
            }
           

        </style>
        
    </head>
    <body>
      <div class="container">
 <nav class="navbar navbar-default">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span> 
              </button>
              <a class="navbar-brand" href="#">N.O.R.S.U</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
              <ul class="nav navbar-nav navbar-right">
                  <li><a href="{{route('logout')}}"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                </ul>
              
            </div>
          </div>
        </nav>

        
        <div class="col-md-9 well">
           <div id='calendar'>
               
           </div>

        </div>
          
         <div class="col-md-3 well">
         <center>
             <img src="{{URL::to('images/female.png')}}">
         </center>


             <ul class="nav nav-pills nav-stacked">
              <li role="presentation" class="active"><a href="{{route('staff_main')}}">Calendar</a></li>
              <li role="presentation"><a href="{{route('staff_import')}}">Import</a></li>
              <li role="presentation"><a href="{{route('staff_archives')}}">Archives</a></li>
            </ul>
         </div>       

      </div>

        
    </body>
    <script type="text/javascript" src="{{URL::to('js/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::to('js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{URL::to('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::to('js/fullcalendar.min.js')}}"></script>
    
    <script type="text/javascript">
        $(document).ready(function() {
        
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay,listWeek'
            },
            defaultDate: '2017-05-12',
            navLinks: true, // can click day/week names to navigate views
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: [
                {
                    title: 'All Day Event',
                    start: '2017-05-01'
                },
                {
                    title: 'Long Event',
                    start: '2017-05-07',
                    end: '2017-05-10'
                },
                {
                    id: 999,
                    title: 'Repeating Event',
                    start: '2017-05-09T16:00:00'
                },
                {
                    id: 999,
                    title: 'Repeating Event',
                    start: '2017-05-16T16:00:00'
                },
                {
                    title: 'Conference',
                    start: '2017-05-11',
                    end: '2017-05-13'
                },
                {
                    title: 'Meeting',
                    start: '2017-05-12T10:30:00',
                    end: '2017-05-12T12:30:00'
                },
                {
                    title: 'Lunch',
                    start: '2017-05-12T12:00:00'
                },
                {
                    title: 'Meeting',
                    start: '2017-05-12T14:30:00'
                },
                {
                    title: 'Happy Hour',
                    start: '2017-05-12T17:30:00'
                },
                {
                    title: 'Dinner',
                    start: '2017-05-12T20:00:00'
                },
                {
                    title: 'Birthday Party',
                    start: '2017-05-13T07:00:00'
                },
                {
                    title: 'Click for Google',
                    url: 'http://google.com/',
                    start: '2017-05-28'
                }
            ]
        });
        
    });

    </script>
</html>
