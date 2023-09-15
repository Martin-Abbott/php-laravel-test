<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Welcome!</h1>
    <section>
        <h2>Account Registration</h2>
        <form action="/registration" method="POST">
            @csrf
            <input type="text" placeholder="name"></input>
            <input type="text" placeholder="email"></input>
            <input type="password" placeholder="password"></input>
            <button>Register</button>
        </form>
    </section>
</body>
</html>