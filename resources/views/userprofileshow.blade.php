<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  
  <title>User Profile Show</title>
</head>

<body>
<a class="btn btn-primary" href="{{route('posts.create')}}" style="margin-top: 10px; margin-bottom:10px; margin-left:10px;">Create Post</a>
<a href="/" class="btn btn-secondary" style="float: right; margin-top: 10px; margin-bottom:10px; margin-right:10px;">Go Home</a>
  <table border="1" class="table table-striped" style="width: 100%; text-align:center">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>

      <th scope="col">Gender</th>
      <th scope="col">Address</th>
      <th scope="col">User Profile</th>
      <th scope="col">BirthDate</th>
      <th scope="col">Action</th>
    </tr>
    <tr>
      <td>{{$result->id}}</td>
      <td>{{$authusername->name}}</td>
      <td>{{$userprofile->gender}}</td>
      <td>{{$userprofile->address}}</td>
      <td><img src="{{asset('/storage/images/'.$result->profile_photo)}}" style="height: 100px; width: 150px;"></td>
      
      <td>{{$userprofile->birth_date}}</td>
      <td><a class="btn btn-primary" href="{{route('userprofile.edit',$result->id)}}">Edit/Update</a></td>
    </tr>
   
  </table>


</body>

</html>