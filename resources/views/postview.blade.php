<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 
  <title>Post View</title>
</head>

<body>

  <table border="1" class="table table-hover table-striped table-borderless" style="width: 100%; text-align:center">
    <tr>
      <td>Id</td>
      <td>User Id</td>
      <td>Title</td>
      <td>Description</td>
      <td>Post Icon</td>
      <td>Action</td>
    </tr>
    @foreach($data as $posts)
    <tr>
      <td>{{$posts->id}}</td>
      <td>{{$posts->user_id}}</td>
      <td>{{$posts->title}}</td>
      <td>{{$posts->description}}</td>
      <td><img src="{{asset('/storage/posts/'.$posts->post_icon)}}" style="height: 100px; width: 150px;"></td>
      <!-- <td><img src="{{ url('app/public/posts/'.$posts->post_icon) }}" style="height: 100px; width: 150px;"></td> -->
      <td>
        <a href="{{route('posts.edit',$posts->id)}}" class="btn btn-primary btn-sm">Edit/Update</a>&nbsp;&nbsp;&nbsp;
        <a href="javascript:void(0)" class="btn btn-danger btn-sm" onclick="document.getElementById('deleteform.{{$posts->id}}').submit()"><i class='far fa-trash-alt' >Delete</i></a>
        <form method="POST" action="{{route('posts.destroy',$posts->id)}}" id="deleteform.{{$posts->id}}">
          @method('DELETE')
          @csrf

        </form>
      </td>
    </tr>
    @endforeach
    <tr>
      <td><a class="btn btn-primary" href="/posts/create">Create New Post</a></td>
      
    </tr>
  </table>

</body>

</html>