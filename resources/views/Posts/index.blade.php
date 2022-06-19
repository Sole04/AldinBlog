
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title></title>
</head>
<body>

  <center><a href="posts/create" class="btn btn-info">Dodaj post</a></center>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Short Description</th>
      <th scope="col">Picture</th>
      <th scope="col">Username</th>
      <th scope="col">Username</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php $i=1;
  
  
  ?>
  @foreach ($posts as $post)
  
  <tr>
      <th scope="row">{{$i++}}</th>
      <td><a href="{{url('posts/'.$post->id)}}">{{$post->title}}</a></td>
      <td>{{$post->short_description}}</td>
      
      <td><img style="width:100px;height:100px;" src="{{asset('storage/slike/'.$post->picture)}}" alt=""></td>
      @for ($b=0;$b < count($users); $b++)
      @if ($users[$b]->id == $post->user_id)
      <td>{{$users[$b]->name}}</td>
      @endif
      
      @endfor
      
      <td>
        <a href="{{url('/posts/'.$post->id.'/edit')}}" class="btn btn-primary">Edit</a>
      </td>
      <td>
      <form action="{{url('/posts/'.$post->id)}}" method="POST">
          @csrf
          @method('DELETE')
        <button type="submit" name="posalji" class="btn btn-danger">Obriši</a>
        </form>
        </td>
    </tr>
  @endforeach





    
  </tbody>
</table>

{{$posts->onEachSide(1)->links()}}
<pre>

</pre>


</body>
</html>