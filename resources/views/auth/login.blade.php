<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Canteen Ordering System</title>
</head>

<body>

    <h1>Login</h1>

    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <label for="username">Username</label>

            <input
                type="text"
                id="username"
                name="username"
                value="{{ old('username') }}"
                required
                autofocus
            >
        </div>

        <br>

        <div>
            <label for="password">Password</label>

            <input
                type="password"
                id="password"
                name="password"
                required
            >
        </div>

        <br>

        <button type="submit">Login</button>
    </form>

    <br>

    <a href="{{ url('/') }}">Back to Home</a>

</body>
</html>