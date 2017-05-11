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
                background: black;
            }
            .bgvideo{
                position: fixed;
                right: 0;
                bottom: 0;
                min-height: 100%;
                min-width: 100%;
                width: auto;
                height: auto;
                -webkit-filter:grayscale(60%);
                filter:grayscale(60%);
                z-index: -999999999;

            }
            .well{
                margin-top: 10%;
                border-radius: 20px;
                background: transparent;
                
            }
            .input-group{
                margin-top: 10px;
            }
            .form-group{
                margin-top: 10px;
            }
            .glyphicon-log-in ,.glyphicon-th-list{
                margin-right: 10px;
            }
            #logo{
                margin-top: -60px;
            }
           
        </style>
        
    </head>
    <body>
        <div class="container-fluid">
            <div id="headers">
                <video autoplay  loop muted class="bgvideo" id="bgvideo" height="200px" width="200px">
                     <source src="{{URL::to('assets/bg.mp4')}}" type="video/mp4">
                </video>

                <div class="col-md-4 col-md-offset-4 well">
                    <center>
                        <img src="{{URL::to('images/logo.png')}}" width="120px" class="img-responsive" id="logo">
                    </center>
                    @if(Session::has('info'))
                        <div class="alert alert-danger">
                            <strong class="text-center">{{Session::get('info')}}</strong>
                        </div>
                    @endif
                    <form action="{{route('login_parse')}}" method="POST">
                        <div class="input-group {{$errors->has('email') ? 'has-error' : ''}}">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="email" name="email" class="form-control" aria-describedby="" placeholder="Enter Username">
                        </div>
                        <div class="input-group {{$errors->has('password') ? 'has-error' : ''}}">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input type="password" name="password" class="form-control" aria-describedby="" placeholder="Enter Password">
                        </div>
                        <div class="form-group">
                            <label style="color: #f4a641">Remember</label>
                            <input type="checkbox" name="remember">

                             <button type="submit" class="btn btn-warning btn-block"><i class="glyphicon glyphicon-log-in"></i>LOGIN</button>
                             <a href="{{route('guest_main')}}" class="btn btn-info btn-block"><i class="glyphicon glyphicon-th-list"></i>GUEST</a>
                             {{csrf_field()}}
                        </div>
                       
                    </form>
                </div>
            </div>
        </div>

        
    </body>
    <script>
        var video = document.getElementById("bgvideo");
        video.playbackRate = 0.8;
    </script>
</html>
