<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    @auth
<p>Congrats you are logged in!!</p>
<form action="/logout" method="POST">
    @csrf
    <button>Log Out</button>
</form>
    @else
    <div style="border: 3px solid black;">
        <h2>Register</h2>
        <form action="/register" method="POST">
            @csrf
            <input type= "text" placeholder="name" name="name">
            <input type="text" placeholder="email" name="email">
            <input type="password" placeholder="password" name="password">
            <button>Register</button>
        </form>
    </div> 
    <div style="border: 3px solid black;">
        <h2>Login</h2>
        <form action="/login" method="POST">
            @csrf
            <input type="text" placeholder="email" name="email">
            <input type="password" placeholder="password" name="password">
            <button>Login</button>
        </form>
    </div>
    @endauth



    
</body>

</html>