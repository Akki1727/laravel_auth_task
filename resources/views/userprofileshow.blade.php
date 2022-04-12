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
      <td>{{$result->id}}</td>
      <td>{{$userprofile->user_id}}</td>
      <td>{{$userprofile->gender}}</td>
      <td>{{$userprofile->address}}</td>
      <td><img src="{{ url('app/public/images/'.$result->profile_photo) }}" style="height: 100px; width: 150px;">
      </td>
      <td>{{$userprofile->birth_date}}</td>
      <td><a href="{{route('userprofile.edit',$result->id)}}">Edit/Update</a></td>
    </tr>
  </table>


</body>

</html>