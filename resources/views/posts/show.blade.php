@include('header.header')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <div class="container mt-4">
        <h1 class="text-center"> {{$post->title}} </h1>
        <p class="text-center">{{$post->tag->name}}</p>
        <div class='bg-secondary-subtle mt-4 fs-4 rounded text-center p-5'>
         <p>{{$post->post}}</p>
        <a href="{{route("posts.edit",$post->id)}} " class='p-2'><button class="btn  btn-info btn-lg">Edit</button></a>
        </div>
    </div>
</body>
</html>
