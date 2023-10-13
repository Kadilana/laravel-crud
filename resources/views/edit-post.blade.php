<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Edit Post</title>
</head>
<body>
    <div class="container w-25 mt-3">
        <h3>EDIT POST</h3>
        <form action="/edit-post/{{$post->id}}" method="POST">
            @csrf 
            @method('PUT')
            <div class="mb-3">
                <label for="exampleInputName1" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" value="{{$post->title}}" id="exampleInputName1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <div><label for="exampleInputEmail1" class="form-label">Body</label></div>
                <textarea name="body">{{$post->body}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</body>
</html>