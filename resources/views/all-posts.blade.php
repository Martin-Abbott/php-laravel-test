<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Welcome!</h1>

    @auth 
    <section>
        <p>Logged In!</p>
        <form action="/logout" method="POST">
            @csrf
            <button>Log Out</button>
        </form>
    </section>
    <section>
        <h2>Add a message</h2>
        <form action="/submit-post" method="POST">
            @csrf
            <input type="text" name="title" placeholder="Title"></input>
            <textarea name="body" placeholder="Your message"></textarea>
            <button>Submit</button>
        </form>
    </section>
    <section>
        <h2>All Posts</h2>
        @foreach($posts as $post)
        <article>
            <h3>{{$post["title"]}}</h3>
            <p>by {{$post->user->name}}<p>
            <p>{{$post["body"]}}</p>
            <!-- <a href="/edit-post/{{$post->id}}">
                <button>Edit</button>
            </a>
            <form action="/delete-post/{{$post->id}}" method="POST">
                @csrf
                @method("DELETE")
                <button>Delete</button>
            </form> -->
        </article>
        @endforeach
    </section>
    <a href="/">
        <button>View Your Posts</button>
    </a>

    @else
    <section>
        <h2>Account Registration</h2>
        <form action="/registration" method="POST">
            @csrf
            <input type="text" placeholder="username" name="name"></input>
            <input type="text" placeholder="email" name="email"></input>
            <input type="password" placeholder="password" name="password"></input>
            <button>Register</button>
        </form>

        <h2>Log In</h2>
        <form action="/login" method="POST">
            @csrf
            <input type="text" placeholder="username" name="existingName"></input>
            <input type="password" placeholder="password" name="existingPassword"></input>
            <button>Log In</button>
        </form>
    </section>

    @endauth
    

</body>
</html>