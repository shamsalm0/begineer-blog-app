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
  
        @if($post)
        <div class="d-flex justify-content-center">
            <h1 class="text-center"> {{$post->title}} </h1>
            <a class="btn btn-info d-flex align-items-center" href="{{route('posts.edit',$post->id)}}">Edit</a>
        </div>

        <p class="text-center">{{$post->tag->name}}</p>
        <div class='bg-secondary-subtle mt-4 fs-4 rounded text-center p-5'>
            <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" height="500" width="500"  class="img-fluid">
            <p>{{$post->post}}</p>
        </div>

        <!-- Displaying Comments -->
        @if($post->comments->count() > 0)
            <h3>Comments:</h3>
            @foreach($post->comments as $comment)
                <div class="mb-3">
                    <strong>{{ $comment->user->name }}</strong>: 
                    {{ $comment->comment }}
                </div>
            @endforeach
        @else
            <p>No comments yet.</p>
        @endif

        <!-- Comment Submission Form -->
        @auth
        <div class="form-floating mt-5 bg-blue-300 pb-5">
            <form action="{{route('comments.store')}}" method="post">
                @csrf
                <!-- User ID and Post ID are passed hidden -->
                <input type="hidden" name="user_id" value="{{ auth()->id() }}"> 
                <input type="hidden" name="post_id" value="{{$post->id}}">

                <textarea name="comment" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                    style="height: 100px; width:400px"></textarea>
                
                <button class="mt-3 btn btn-info" type="submit">Comment</button>
            </form>
        @endauth
        </div>
        
        @endif
    </div>
</body>
</html>
