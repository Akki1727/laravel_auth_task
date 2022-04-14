<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Pin varification </title>
  <style>
    table,
    td,
    div,
    h1,
    p {
      font-weight: 500;
      font-family: Arial, sans-serif;
    }

    .btn {
      margin: 10px 0px;
      border-radius: 4px;
      text-decoration: none;
      color: #fff !important;
      height: 46px;
      padding: 10px 20px;
      font-size: 16px;
      font-weight: 600;
      background-image: linear-gradient(to right top, #021d68, #052579, #072d8b, #09369d, #093fb0) !important;
    }

    .btn:hover {
      text-decoration: none;
      opacity: .8;
    }
  </style>
</head>

<body>

  <form action="" method="post">
    @csrf

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header"><label for="">Enter Your 6 digit Pin:</label></div>
            <div class="card-body">
              <input type="text" name="remember_token" id="remember_token">

              <input type="submit" value="submit" name="submit">
            </div>
          </div>
        </div>
      </div>
    </div>

  </form>

</body>

</html>