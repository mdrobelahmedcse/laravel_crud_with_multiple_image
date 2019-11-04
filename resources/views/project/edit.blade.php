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
                                <h3>Update student</h3> 
                        </div>
                        <div class="panel-body">
                        @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        <form action="{{ route('project.update',$student->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                                <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" value="{{ $student->name }}" name="name">
                                </div>
                                <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" value="{{ $student->email }}" name="email">
                                </div>
                                <div class="form-group">
                                <label for="phone">Phone:</label>
                                <input type="text" class="form-control" id="phone" value="{{ $student->phone }}" name="phone">
                                </div>
                                <div class="form-group">
                                <label for="pwd">Image:</label>
                                <input type="file" class="form-control" id="file" name="photos[]" multiple>
                                </div>

                                <button type="submit" class="btn btn-default">Update</button>
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
