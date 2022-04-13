<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <title>User Profile Show</title>
</head>

<body>

  <table border="1" style="width: 100%; text-align:center">
    <tr>
      <th>Id</th>
      <th>User_Id</th>

      <th>Gender</th>
      <th>Address</th>
      <th>User Profile</th>
      <th>BirthDate</th>
      <th>Action</th>
    </tr>
    <tr>
      <td>{{$useredit->id}}</td>
      <td>{{$userid->user_id}}</td>
      <td>{{$userid->gender}}</td>
      <td>{{$userid->address}}</td>
      <td><img src="{{asset('/storage/posts/'.$useredit->profile_photo)}}" style="height: 100px; width: 150px;"></td>
      
      <td>{{$userid->birth_date}}</td>
      <td><a href="{{route('userprofile.edit',$useredit->id)}}">Edit/Update</a></td>
    </tr>
    <tr>
      <td>
        <a href="{{route('posts.create')}}">Create Post</a>
      </td>
    </tr>
  </table>

</body>


