<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <title>User Profile</title>
</head>

<body>
  <form action="{{route('userprofile.store',$useredit->id)}}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="container-sm">


      <label class="form-label" for="name">Name:</label>


      <strong>{{$useredit->name}}</strong>



    </div>
    <div class="container-sm">


      <Label class="form-label">Email:</Label>


      <strong>{{$useredit->email}}</strong>


    </div>
    <div class="container-sm">


      <label class="form-label" for="name">Gender:</label>


      <input class="form-check-input" type="radio" name="gender" id="male" value="male">Male
      <input class="form-check-input" type="radio" name="gender" id="female" value="female">Female


    </div>
    <div class="container-sm">

      <div class="input-group">
        <span class="input-group-text">Address</span>
        <textarea class="form-control"  name="address" id="address" aria-label="With textarea"></textarea>
      </div>

     


    </div>
    <div class="container-sm">


      <label class="form-label" for="userprofile">User Profile:</label>


      <input class="form-control" type="file" name="profile_photo" id="profile_photo">

      @error('image')
      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
      @enderror

    </div>
    <div class="container-sm">


      <label class="form-label" for="birth_date">Birth Date:</label>


      <input class="form-control" type="date" name="birth_date" id="birth_date">

      <br>

      <input class="btn btn-primary" type="submit" name="submit" value="Submit">
    </div>




  </form>
</body>

</html>