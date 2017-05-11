<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{URL::to('css/bootstrap.min.css')}}">
        
        <title>Laravel</title>

        <style type="text/css">
            body{
                background: #51555b;
                }
           
                .well{
                  min-height: 500px;
                  max-height: auto;
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
          <div class="panel panel-default">
        <div class="panel-heading">
           
            <a href="javascript:void(0);" onclick="$('#importFrm').slideToggle();">Import Student Grade Sheet</a>
        </div>
        <div class="panel-body">
            <center>
                <form action="{{route('staff_import_parse')}}" method="post" enctype="multipart/form-data" id="importFrm">
                    <input type="file" name="file" />
                    <input type="submit" class="btn btn-primary" name="importSubmit" value="Upload">
                    {{csrf_field()}}
             </form>
            </center>
            
            <h1>Instructions:</h1>
            <ol>
              <li>Get Ready your CSV files/ GradeSheet</li>
              <li>Click Choose File</li>
              <li>Browse your gradesheet/csv files</li>
              <li>Click Upload</li>
            </ol>
            <p>CSV/GradeSheet FORMAT</p>
            <a href="#"><img src="{{URL::to('images/inst.jpg')}}" class="img-reponsive" width="600px"></a>
        </div>
    </div>

        </div>
          
         <div class="col-md-3 well">
             <center>
               <img src="{{URL::to('images/female.png')}}">
           </center>

             <ul class="nav nav-pills nav-stacked">
              <li role="presentation" ><a href="{{route('staff_main')}}">Calendar</a></li>
              <li role="presentation" class="active"><a href="{{route('staff_import')}}">Import</a></li>
              <li role="presentation"><a href="{{route('staff_archives')}}">Archives</a></li>
            </ul>
         </div>       

      </div>

        
    </body>
    
    <script type="text/javascript" src="{{URL::to('js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{URL::to('js/bootstrap.min.js')}}"></script>
    
</html>
