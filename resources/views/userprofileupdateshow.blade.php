<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  
  <title>User Profile Show</title>
</head>

<body>
<a href="{{route('posts.create')}}" class="btn btn-primary" style="margin-top: 10px; margin-bottom:10px;">Create Post</a>
  <table border="1" style="width: 100%; text-align:center">
    <tr>
      <th>#</th>
      <th>Id</th>
      <th>Name</th>

      <th>Gender</th>
      <th>Address</th>
      <th>User Profile</th>
      <th>BirthDate</th>
      <th>Action</th>
    </tr>
    <!-- {{$i = 1}} -->
    <tr>
      <td>{{$i+=0}}</td>
      <td>{{$useredit->id}}</td>
      <td>{{$authusername->name}}</td>
      <td>{{$userid->gender}}</td>
      <td>{{$userid->address}}</td>
      <td><img src="{{asset('/storage/images/'.$userid->profile_photo)}}" style="height: 100px; width: 150px;"></td>
      
      <td>{{$userid->birth_date}}</td>
      <td><a href="{{route('userprofile.edit',$useredit->id)}}" class="btn btn-primary">Edit/Update</a></td>
    </tr>
   
  </table>

</body>


