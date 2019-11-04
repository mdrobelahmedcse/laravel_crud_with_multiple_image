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
       <div class="panel panel-default">
           <div class="panel panel-heading">
           <h3>Student list</h3>  
           <a class="btn btn-primary pull-right" href="{{ route('project.create') }}">Add new student</a>  <br/><br/>
           </div>
           @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
           <div class="panel panel-body">
           
  
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th width="10%">ID</th>
                      <th width="15%">Name</th>
                      <th width="20%">E-mail</th>
                      <th width="15%">Phone</th>
                      <th width="20%">Image</th>
                      <th width="20%">Action</th>
                    </tr>
                  </thead>
                  <tbody>


                  @foreach($allstudents as $student) 

                    <tr>
                      <td>{{ $student->id }}</td>
                      <td>{{ $student->name }}</td>
                      <td>{{ $student->email }}</td>
                      <td>{{ $student->phone }}</td>
                      <td>
                      @foreach($student->images as $image)   
                         <img src="{{ asset('uploads/photo/'.$image->filename) }}" alt="" height="30px" width="30px"
                      @endforeach

                      </td>
                      <td>
                          <a href="{{ route('project.edit',$student->id) }}" class="btn btn-info">Edit</a>
                          <a href="{{ route('project.view',$student->id) }}" class="btn btn-success">view</a>
                          <button class="btn btn-danger" type="button" onclick="deletephoto({{ $student->id }})">
                          delete
                          </button>
                            <form id="delete-form-{{ $student->id }}" action="{{ route('project.destroy',$student->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>

                      </td>
                    </tr>

                  @endforeach
              

                  
                  </tbody>
                </table>
           </div>

           <div class="panel-footer">
                <p class="text-center">www.facebook.com</p>
            </div>
       
       </div>
   </div>

</div>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function deletephoto(id)
        {
            swal({
                title:"Red Stapler",
                text: "Are You Sure? you want to delete this?",
                buttons: {
                    cancel: true,
                    confirm: "delete"
                }
            }).then( val => {
                if(val)  {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                }
                else {
                    swal("Your data is safe!");
                }
            });
        }
    </script>


</body>
</html>
