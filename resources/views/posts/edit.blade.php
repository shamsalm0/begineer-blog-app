@include('header.header')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <form action="{{ route('posts.update',$post->id) }}" method="post">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" value="{{ $post->title }}"
                    class="form-control @error('title') is-invalid @enderror" name="title" id="title">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <select name='category_id' class="form-select" aria-label="Default select example">

                    @foreach ($categories as $category)
                        @if ($category->id == $post->category->id)
                        <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                        @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
                @error('category')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
             <div class="mb-3">
                <select name='tag_id' class="form-select" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    @foreach ($tags as $tag)
                        @if($tag->id == $post->tag->id)
                        <option selected value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @else
                           <option  value="{{ $tag->id }}">{{ $tag->name }}</option>
                           @endif
                    @endforeach
                </select>
                @error('category')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating">
                <textarea name='post' value={{$post->post}}  class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                    style="height: 100px"></textarea>
                <label  for="floatingTextarea2">Write your posts</label>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Update</button>
        </form>
        <form action="{{route('posts.destroy',$post->id)}}" method="post">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger mt-2">Delete</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pOqlN2bJZ6kd9h96O9P0q0gZ9H4j0m3XbF1pm9zpCfhKQEG+6XccjxnLDBYyP6V8" crossorigin="anonymous">
    </script>
</body>

</html>
