<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


  <title>Create Post</title>
</head>

<body>


  <!------ Include the above in your HEAD tag ---------->
  <div class="container">
    <div class="row">

      <div class="col-md-8 col-md-offset-2">

        <h1>Create post</h1>
        <a href="/posts" class="btn btn-danger" style="float: right; margin-bottom:10px">User Posts</a>

        <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="form-group">
            <label for="title">Title <span class="require">*</span></label>
            <input type="text" class="form-control" name="title" required />
            @error('title')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="form-group">
            <label for="description">Description</label>
            <textarea rows="5" class="form-control" name="description" required></textarea>
            @error('description')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="description">Post Icon</label>
            <input type="file" name="post_icon" id="post_icon">
          </div>



          <div class="form-group">
            <input type="submit" class="btn btn-primary">
            <a href="/" class="btn btn-danger">Cancle</a>
          </div>

        </form>
      </div>

    </div>
  </div>
</body>

</html>
