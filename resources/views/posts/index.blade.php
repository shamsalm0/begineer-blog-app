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
    <div class="container">
        <h1 class="text-center">Articles</h1>
        <div class=" d-flex gap-3 flex-wrap">



@php

    $groupedPosts = $posts->groupBy('category.id');

@endphp
     @foreach ($groupedPosts as $categoryId => $categoryPosts)

   <div  class="">
     <h4>{{ $categoryPosts->first()->category->name }}</h4>

 <div class="d-flex gap-4">
       @foreach ($categoryPosts as $post)
        <div class="card mb-3 ">
            <div class="card-body ">
                <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="img-fluid card-img">
                <h5 class="card-title">{{ Str::limit($post->title, 15) }}</h5>
                <p class="card-text">{{ Str::limit($post->post, 50) }}</p>
                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Show</a>
            </div>
        </div>
    @endforeach
 </div>
   </div>
@endforeach
        </div>
    </div>
</body>

</html>
