<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Home</title>
</head>
<body>
    @auth
        <div class="container w-25 mt-3">
            <h4>{{auth()->user()->name}}, YOUR'RE LOGGED IN</h4>
            <form action="/logout" method="post">
                @csrf 
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
        <div class="container w-25 mt-3">
            <h3>CREATE POST</h3>
            <form action="/create-post" method="post">
                @csrf 
                <div class="mb-3">
                    <label for="exampleInputName1" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" id="exampleInputName1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <div><label for="exampleInputEmail1" class="form-label">Body</label></div>
                    <textarea name="body" cols="59" rows="10"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
        <hr>
        <div class="container w-25 mt-3">
            <h3>MY POSTS</h3>
            @foreach ($posts as $post)
                <div class="card mt-3" style="width: ;">
                    <div class="card-header d-flex">
                        <h5 class="card-title">{{$post['title']}} BY, {{$post->author->name}}</h5>
                        {{-- edtit --}}
                        <a href="/edit-post/{{$post->id}}" class="ms-3">Edit</a>
                        {{-- delete --}}
                        <span class="ms-2">
                            <form action="/delete-post/{{$post->id}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger p-1">Delete</button>
                            </form>
                        </span>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{$post['body']}}</p>
                        {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="container w-25 mt-3">
            <h3>REGISTER</h3>
            <form action="/register" method="post">
                @csrf 
                <div class="mb-3">
                    <label for="exampleInputName1" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputName1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
        
        <hr>

        <div class="container w-25 mt-3">
            <h3>LOGIN</h3>
            <form action="/login" method="post">
                @csrf 
                <div class="mb-3">
                    <label for="exampleInputLog1" class="form-label">Name</label>
                    <input type="text" name="loginname" class="form-control" id="exampleInputLog1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword2" class="form-label">Password</label>
                    <input type="password" name="loginpassword" class="form-control" id="exampleInputPassword2">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    @endauth

</body>
</html>