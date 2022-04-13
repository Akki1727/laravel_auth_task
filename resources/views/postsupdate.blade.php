<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
  <div class="row">

    <div class="col-md-8 col-md-offset-2">

      <h1>Create post</h1>
      
      <form action="{{route('posts.update',$postedit->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="form-group">
          <label for="title">Title <span class="require">*</span></label>
          <input type="text" class="form-control" name="title" value="{{$postedit->title}}" required/>
          @error('title')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="form-group">
          <label for="description">Description</label>
          <textarea rows="5" class="form-control" name="description" required>{{$postedit->description}}</textarea>
          @error('description')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="description">Old Post Icon</label><br>
          <img src="{{asset('/storage/posts/'.$postedit->post_icon)}}" style="height: 100px; width: 150px;">
        </div>
        <div class="form-group">
          <label for="description">New Post Icon</label>
          <input type="file" name="post_icon" id="post_icon">
        </div>

        <div class="form-group">
          <p><span class="require">*</span> - required fields</p>
        </div>

        <div class="form-group">
          <input type="submit" class="btn btn-primary">

        </div>

      </form>
    </div>

  </div>
</div>

