<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Profile</title>
</head>

<body>
  <form action="{{route('userprofile.update',$useredit->id)}}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <table border="1">
      <tr>
        <td>
          <label for="name">Name:</label>
        </td>
        <td>
          <strong>{{$useredit->name}}</strong>

        </td>

      </tr>
      <tr>
        <td>
          <Label>Email:</Label>
        </td>
        <td>
          <strong>{{$useredit->email}}</strong>
        </td>
      </tr>
      <tr>
        <td>
          <label for="name">Gender:</label>
        </td>
        <td>
          <input type="radio" name="gender" id="male" value="male">Male
          <input type="radio" name="gender" id="female" value="female">Female
        </td>
      </tr>
      <tr>
        <td>
          <label for="address">Address:</label>
        </td>
        <td>
          <textarea name="address" id="address" cols="20" rows="2"></textarea>
        </td>
      </tr>
      <tr>
        <td>
          <label for="userprofile">User Profile:</label>
        </td>
        <td>
          <input type="file" name="profile_photo" id="profile_photo">
        </td>
        @error('image')
        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
        @enderror
      </tr>
      <tr>
        <td>
          <label for="birth_date">Birth Date:</label>
        </td>
        <td>
          <input type="date" name="birth_date" id="birth_date">
        </td>

      </tr>
    </table><br>

    <input type="submit" name="submit" value="Update">



  </form>
</body>

</html>