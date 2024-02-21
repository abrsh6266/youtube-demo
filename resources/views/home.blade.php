<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 0 20px;
        }

        .card {
            border: 3px solid black;
            margin-bottom: 20px;
            padding: 20px;
        }

        .card h2 {
            margin-top: 0;
        }

        .form-input {
            margin-bottom: 10px;
        }

        .form-input input,
        .form-input textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            margin-top: 5px;
        }

        .form-input button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-input button:hover {
            background-color: #0056b3;
        }

        .post {
            background-color: #f0f0f0;
            padding: 10px;
            margin: 10px 0;
        }

        .post h3 {
            margin-top: 0;
            margin-bottom: 5px;
        }

        .post p {
            margin-top: 0;
        }

        .post a {
            text-decoration: none;
            color: #007bff;
        }

        .post a:hover {
            text-decoration: underline;
        }

        .alert {
            padding: 10px;
            margin-bottom: 20px;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
            color: #721c24;
        }
    </style>
</head>

<body>
    <div class="container">
        @auth
        <p>Congrats you are logged in!!</p>
        <form action="/logout" method="POST">
            @csrf
            <button>Log Out</button>
        </form>
        <div class="card">
            <h2>Create a new Post</h2>
            <form action="/create-post" method="POST" class="form-input">
                @csrf
                <input type="text" name='title' placeholder="title">
                <textarea name="body" placeholder="body content ..."></textarea>
                <button>Save Post</button>
            </form>
        </div>
        <div class="card">
            <h2>All Posts</h2>
            @foreach ($posts as $post)
            <div class="post">
                <h3>{{ $post['title'] }} by {{$post->user->name}}</h3>
                {{ $post['body'] }}
                <p><a href="/edit-post/{{ $post->id }}">Edit</a></p>
                <form action="/delete-post/{{ $post->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            </div>
            @endforeach
        </div>
        @else
        <div class="card">
            <h2>Register</h2>
            <form action="/register" method="POST" class="form-input">
                @csrf
                <input type= "text" placeholder="name" name="name">
                <input type="text" placeholder="email" name="email">
                <input type="password" placeholder="password" name="password">
                <button>Register</button>
            </form>
        </div>
        <div class="card">
            <h2>Login</h2>
            <form action="/login" method="POST" class="form-input">
                @csrf
                <input type="text" placeholder="name" name="loginName">
                <input type="password" placeholder="password" name="loginPassword">
                <button>Login</button>
            </form>
        </div>
        @endauth
    </div>
</body>

</html>
