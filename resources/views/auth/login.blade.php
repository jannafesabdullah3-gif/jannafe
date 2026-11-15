
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Canteen Ordering System</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
            background:
                linear-gradient(rgba(238,247,241,.78), rgba(238,247,241,.78)),
                url('https://images.unsplash.com/photo-1559339352-11d035aa65de?auto=format&fit=crop&w=1800&q=85');
            background-size: cover;
            background-position: center;
            color: #123c30;
        }

        header {
            background: #063d2e;
            padding: 15px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            color: white;
        }

        .logo {
            font-size: 22px;
            font-weight: 800;
            line-height: 1.2;
        }

        .logo span {
            color: #61d879;
        }

        nav {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-size: 14px;
        }

        nav a:hover {
            color: #61d879;
        }

        .header-buttons {
            display: flex;
            gap: 12px;
        }

        .header-buttons a {
            padding: 9px 20px;
            border-radius: 8px;
            color: white;
            text-decoration: none;
            font-size: 14px;
            border: 1px solid white;
        }

        .header-buttons .register {
            background: #35bd58;
            border-color: #35bd58;
        }

        .main {
            min-height: 750px;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 55px 20px;
        }

        .login-card {
            width: 100%;
            max-width: 900px;
            min-height: 600px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            background: white;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 15px 45px rgba(0,0,0,.15);
        }

        .left-panel {
            background:
                linear-gradient(rgba(0,55,38,.87), rgba(0,55,38,.82)),
                url('https://images.unsplash.com/photo-1547592180-85f173990554?auto=format&fit=crop&w=900&q=85');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 45px 30px 30px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            text-align: center;
        }

        .brand-icon {
            font-size: 65px;
        }

        .left-panel h1 {
            font-size: 35px;
            line-height: 1.25;
            margin: 10px 0;
        }

        .left-panel h1 span {
            color: #63dc7c;
        }

        .left-panel .tagline {
            font-size: 17px;
            font-style: italic;
            margin-top: 15px;
        }

        .food-image {
            width: 100%;
            height: 190px;
            object-fit: cover;
            border-radius: 12px;
            margin: 20px 0;
        }

        .benefits {
            display: flex;
            justify-content: space-around;
            gap: 10px;
            font-size: 13px;
        }

        .benefits div {
            line-height: 1.8;
        }

        .benefits strong {
            display: block;
            font-size: 23px;
            color: #68e184;
        }

        .right-panel {
            padding: 55px 42px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .right-panel h2 {
            text-align: center;
            font-size: 32px;
            color: #064a37;
            margin-bottom: 10px;
        }

        .subtitle {
            text-align: center;
            color: #78847e;
            font-size: 14px;
            margin-bottom: 35px;
        }

        .error-box {
            background: #fff0f0;
            color: #b42318;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .error-box p {
            margin: 4px 0;
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 9px;
        }

        .form-group input {
            width: 100%;
            padding: 15px;
            border: 1px solid #ccd9d2;
            border-radius: 9px;
            outline: none;
            font-size: 14px;
            transition: .3s;
        }

        .form-group input:focus {
            border-color: #16874c;
            box-shadow: 0 0 0 3px rgba(22,135,76,.10);
        }

        .login-btn {
            width: 100%;
            padding: 15px;
            background: #078448;
            border: none;
            border-radius: 9px;
            color: white;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: .3s;
        }

        .login-btn:hover {
            background: #056b3a;
        }

        .divider {
            display: flex;
            align-items: center;
            gap: 15px;
            margin: 25px 0;
            color: #89958e;
            font-size: 13px;
        }

        .divider::before,
        .divider::after {
            content: "";
            flex: 1;
            height: 1px;
            background: #dce5df;
        }

        .google-btn {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 12px;
            width: 100%;
            padding: 14px;
            border: 1px solid #176b4b;
            border-radius: 9px;
            text-decoration: none;
            color: #174d39;
            font-weight: 600;
            font-size: 14px;
            transition: .3s;
        }

        .google-btn:hover {
            background: #eef8f1;
        }

        .google-icon {
            font-size: 21px;
            font-weight: 800;
            color: #4285f4;
        }

        .back-home {
            display: block;
            text-align: center;
            padding: 14px;
            margin-top: 18px;
            border-radius: 9px;
            background: #edf7f0;
            color: #14583d;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
        }

        .back-home:hover {
            background: #dcefe2;
        }

        footer {
            background: #063d2e;
            color: white;
            padding: 22px;
            text-align: center;
            font-size: 13px;
        }

        footer p {
            color: #d0e5d8;
            margin-top: 5px;
        }

        @media(max-width: 750px) {
            nav {
                order: 3;
                width: 100%;
                justify-content: center;
                gap: 15px;
            }

            .login-card {
                grid-template-columns: 1fr;
                max-width: 480px;
            }

            .left-panel {
                min-height: 400px;
            }

            .food-image {
                height: 150px;
            }

            .right-panel {
                padding: 40px 25px;
            }
        }

        @media(max-width: 450px) {
            header {
                justify-content: center;
            }

            .right-panel h2 {
                font-size: 27px;
            }
        }
    </style>
</head>

<body>

<header>
    <div class="logo">
        🍽️ Canteen<br>
        <span>Ordering System</span>
    </div>

    <nav>
        <a href="{{ url('/') }}">⌂ Home</a>
        <a href="{{ url('/#menu') }}">Menu</a>
        <a href="{{ url('/#about') }}">About</a>
        <a href="{{ url('/#contact') }}">Contact</a>
    </nav>

    <div class="header-buttons">
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}" class="register">Register</a>
    </div>
</header>

<main class="main">

    <div class="login-card">

        <!-- LEFT BRANDING PANEL -->
        <div class="left-panel">

            <div>
                <div class="brand-icon">🍽️</div>

                <h1>
                    Canteen<br>
                    <span>Ordering System</span>
                </h1>

                <div class="tagline">
                    Good Food, Better Days
                </div>
            </div>

            <img
                class="food-image"
                src="https://images.unsplash.com/photo-1547592180-85f173990554?auto=format&fit=crop&w=900&q=85"
                alt="Delicious food"
            >

            <div class="benefits">
                <div>
                    <strong>🍴</strong>
                    Fresh Food
                </div>

                <div>
                    <strong>🛡️</strong>
                    Safe & Secure
                </div>

                <div>
                    <strong>⚡</strong>
                    Fast & Convenient
                </div>
            </div>

        </div>

        <!-- RIGHT LOGIN PANEL -->
        <div class="right-panel">

            <h2>Welcome Back!</h2>

            <p class="subtitle">
                Login to your account to continue<br>
                ordering your favorite meals.
            </p>

            @if ($errors->any())
                <div class="error-box">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="username">Username</label>

                    <input
                        type="text"
                        id="username"
                        name="username"
                        value="{{ old('username') }}"
                        placeholder="Enter your username"
                        required
                        autofocus
                    >
                </div>

                <div class="form-group">
                    <label for="password">Password</label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Enter your password"
                        required
                    >
                </div>

                <button type="submit" class="login-btn">
                    Login &nbsp; →
                </button>
            </form>

            <div class="divider">or</div>

            <a href="{{ route('auth.google') }}" class="google-btn">
                <span class="google-icon">G</span>
                Login with Google
            </a>

            <a href="{{ url('/') }}" class="back-home">
                ← &nbsp; Back to Home
            </a>

        </div>

    </div>

</main>

<footer>
    <h3>🍽️ Canteen Ordering System</h3>
    <p>Good Food • Better Days</p>
    <p>© {{ date('Y') }} Canteen Ordering System. All rights reserved.</p>
</footer>

</body>
</html>
