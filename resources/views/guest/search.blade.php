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
                margin: 40px 10px;
                padding: 0;
                font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
                font-size: 14px;

                }
           .well{
              background: transparent;
              color: #fff;
           }
           .glyphicon-search{
            margin-right: 10px;
           }

        </style>
        
    </head>
    <body>
      <div class="container">
          <div class="row">
             <div class="col-md-12 well">
              <form action="{{route('search')}}" method="POST">
                <div class="form-group col-md-2">
                  <label>Last Name</label>
                  <input type="text" name="lastname" class="form-control">
                </div>
                <div class="form-group col-md-2">
                  <label>First Name</label>
                  <input type="text" name="firstname" class="form-control">
                </div>
                <div class="form-group col-md-2">
                  <label>Course</label>
                  <select class="form-control" name="course">
                    <option value="BSIT">BSInfoTech</option>
                    <option value="BSCS">BSCS</option>
                    <option value="BSCrim">BSCrim</option>
                    <option value="CIT">CIT</option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <label>Semester</label>
                  <select class="form-control" name="semester">
                    <option value="1">1</option>
                    <option value="2">2</option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <label>Year: Ex: 2016-2017</label>
                  <input type="text" name="year" class="form-control">
                </div>
                <div class="form-group col-md-2">
                  <label>Action</label>
                  <button type="submit" class="btn btn-success form-control"><i class="glyphicon glyphicon-search"></i>Search</button>
                  {{csrf_field()}}
                </div>
              </form>
            </div>    
          </div>
       
          <div class="panel panel-default row">
            <div class="panel-heading">
              <h2>Search Result:</h2>
            </div>
            <div class="panel-body">
              <table class="table table-bordered">
                <thead>
                  <tr class="info">
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Course</th>
                    <th>Midterm</th>
                    <th>Final</th>
                    <th colspan="2">Semestral Grade</th>
                    <th>Remarks</th>
                    <th>Subject Code</th>
                    <th>Teacher</th>
                  </tr>
                </thead>
                <tbody>
                  @if($grades->count())
                    @foreach($grades as $grade)
                      <tr>
                        <td>{{$grade->lastname}}</td>
                        <td>{{$grade->firstname}}</td>
                        <td>{{$grade->course}}</td>
                        <td>{{$grade->midterm}}</td>
                        <td>{{$grade->final}}</td>
                        <td>{{$grade->semestral_equivalent}}</td>
                        <td>{{$grade->semestral_grade}}</td>

                        <td
                          <?php 
                             $remarks = strtolower($grade->remarks);
                             if($remarks == 'passed'){
                              echo 'class="success"';
                             }else if($remarks == 'inc'){
                             echo 'class="warning"';
                             }else if($remarks == 'failed'){
                              echo 'class="danger"';
                             }
                             
                          ?>
                        >{{$grade->remarks}}
                        </td> 
                        <td>{{$grade->subject_code}}</td>  
                        <td>{{$grade->user->lastname}},{{$grade->user->firstname}}</td>              
                      </tr>
                  @endforeach
                  @else:
                    <tr>
                      <td colspan="5">NO DATA</td>
                    </tr>
                  @endif
                </tbody>
              </table>
            </div>
          </div>
 


      </div>

        
    </body>
    <script type="text/javascript" src="{{URL::to('js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{URL::to('js/bootstrap.min.js')}}"></script>
</html>
