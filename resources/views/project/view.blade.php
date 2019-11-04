<!DOCTYPE html>
<html lang="en">
<head>
  <title>Laravel crud with multiple image</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
      .container h2{


          margin-bottom: 2%;
          text-align: center;
           
      }
      .container h3{

          text-align:center;
          
      }
  </style>
</head>
<body>

<div class="container">
  <h2>Laravel crud with multiple image</h2>     

  <div class="row">

      <div class="col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
          <div class="row">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                                <h3>View student</h3> 
                        </div>
                        <div class="panel-body">
                            <form action="/action_page.php">

                                <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" value="{{ $student->name}}" name="name" readonly>
                                </div>
                                <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" value="{{ $student->email}}" name="email" readonly>
                                </div>
                                <div class="form-group">
                                <label for="phone">Phone:</label>
                                <input type="text" class="form-control" id="phone" value="{{ $student->phone}}" name="phone" readonly>
                                </div>
                                <div class="form-group">
       
                                @foreach($studentimages as $image)

                                    <img src="{{ asset('uploads/photo/'.$image->filename) }}" alt="" height="130px" width="200px" style="border-radius: 5px;">

                                @endforeach

                                </div>

                               <a class="btn btn-primary" href="{{ route('project.index') }}">Go back</a>
                             </form>
                        </div>

                        <div class="panel-footer">
                            <p class="text-center">www.facebook.com</p>
                        </div>

                    </div>
           
          
          </div>
      </div>

  </div>
 
</div>

</body>
</html>
