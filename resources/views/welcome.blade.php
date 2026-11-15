
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canteen Ordering System</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #f7faf8;
            color: #123b30;
        }

        header {
            background: #063d2e;
            color: white;
            padding: 18px 6%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .logo {
            font-size: 23px;
            font-weight: 800;
            line-height: 1.2;
        }

        .logo span {
            color: #62d879;
        }

        nav {
            display: flex;
            align-items: center;
            gap: 28px;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
        }

        nav a:hover {
            color: #62d879;
        }

        .nav-buttons {
            display: flex;
            gap: 12px;
        }

        .btn {
            display: inline-block;
            padding: 11px 24px;
            border-radius: 9px;
            text-decoration: none;
            font-weight: 600;
            transition: .3s;
        }

        .btn-login {
            color: white;
            border: 1px solid white;
        }

        .btn-register, .btn-primary {
            color: white;
            background: #35bd58;
        }

        .btn:hover {
            transform: translateY(-2px);
            opacity: .9;
        }

        .hero {
            min-height: 430px;
            padding: 75px 6%;
            display: flex;
            align-items: center;
            background:
                linear-gradient(90deg, rgba(0,48,34,.98) 0%,
                rgba(0,48,34,.90) 42%,
                rgba(0,48,34,.12) 100%),
                url('https://images.unsplash.com/photo-1547592180-85f173990554?auto=format&fit=crop&w=1800&q=85');
            background-size: cover;
            background-position: center;
            color: white;
        }

        .hero-content {
            max-width: 650px;
        }

        .tagline {
            display: inline-block;
            background: #087d43;
            padding: 8px 17px;
            border-radius: 30px;
            font-size: 13px;
            margin-bottom: 20px;
        }

        .hero h1 {
            font-size: clamp(34px, 5vw, 55px);
            line-height: 1.15;
            margin-bottom: 20px;
        }

        .hero h1 span {
            color: #65dc7a;
        }

        .hero p {
            font-size: 16px;
            line-height: 1.8;
            color: #e5f3eb;
            margin-bottom: 28px;
        }

        .hero-buttons {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .features {
            padding: 55px 6%;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 25px;
            background: white;
            text-align: center;
        }

        .feature {
            padding: 20px 10px;
            border-right: 1px solid #e5eee8;
        }

        .feature:last-child {
            border-right: none;
        }

        .feature-icon {
            width: 65px;
            height: 65px;
            border-radius: 50%;
            background: #e0f6e7;
            color: #087b40;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            margin: 0 auto 15px;
        }

        .feature h3 {
            margin-bottom: 8px;
            font-size: 18px;
        }

        .feature p {
            font-size: 14px;
            color: #647b70;
            line-height: 1.7;
        }

        .menu-section {
            padding: 55px 6%;
            display: grid;
            grid-template-columns: 1fr 3fr;
            gap: 35px;
            align-items: center;
        }

        .section-label {
            color: #07833e;
            font-weight: 700;
            font-size: 13px;
            letter-spacing: 1px;
        }

        .menu-intro h2 {
            font-size: 29px;
            margin: 12px 0;
        }

        .menu-intro p {
            color: #647b70;
            line-height: 1.7;
            margin-bottom: 22px;
        }

        .menu-cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
        }

        .menu-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,.06);
            transition: .3s;
        }

        .menu-card:hover {
            transform: translateY(-5px);
        }

        .menu-card img {
            width: 100%;
            height: 125px;
            object-fit: cover;
        }

        .menu-card h3 {
            font-size: 15px;
            padding: 12px 12px 4px;
        }

        .menu-card p {
            font-size: 12px;
            color: #718378;
            padding: 0 12px 15px;
        }

        footer {
            background: #063d2e;
            color: white;
            padding: 25px 6%;
            text-align: center;
            font-size: 13px;
        }

        footer p {
            margin: 6px 0;
            color: #d1e5d9;
        }

        @media(max-width: 900px) {
            nav {
                order: 3;
                width: 100%;
                justify-content: center;
            }

            .features {
                grid-template-columns: repeat(2, 1fr);
            }

            .menu-section {
                grid-template-columns: 1fr;
            }

            .menu-cards {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media(max-width: 550px) {
            header {
                justify-content: center;
            }

            nav {
                gap: 15px;
            }

            .hero {
                padding: 55px 6%;
            }

            .features {
                grid-template-columns: 1fr;
            }

            .feature {
                border-right: none;
                border-bottom: 1px solid #e5eee8;
            }

            .menu-cards {
                grid-template-columns: 1fr 1fr;
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
        <a href="/">Home</a>
        <a href="#menu">Menu</a>
        <a href="#about">About</a>
        <a href="#contact">Contact</a>
    </nav>

    <div class="nav-buttons">
        <a href="{{ route('login') }}" class="btn btn-login">Login</a>
        <a href="{{ route('register') }}" class="btn btn-register">Register</a>
    </div>
</header>

<section class="hero">
    <div class="hero-content">
        <div class="tagline">🍴 Fresh Food • Good Mood • Every Day</div>

        <h1>
            Welcome to the<br>
            <span>Canteen Ordering System!</span>
        </h1>

        <p>
            Enjoy delicious and affordable meals from our canteen.
            Browse the menu, place your order, and get your food
            quickly and conveniently.
        </p>

        <div class="hero-buttons">
            <a href="{{ route('login') }}" class="btn btn-primary">→ Login</a>
            <a href="{{ route('register') }}" class="btn btn-login">＋ Register</a>
        </div>
    </div>
</section>

<section class="features" id="about">
    <div class="feature">
        <div class="feature-icon">🍴</div>
        <h3>Browse Menu</h3>
        <p>View our latest food options and daily specials.</p>
    </div>

    <div class="feature">
        <div class="feature-icon">🛒</div>
        <h3>Place Your Order</h3>
        <p>Select your favorite meals and add them to your cart.</p>
    </div>

    <div class="feature">
        <div class="feature-icon">⚡</div>
        <h3>Fast & Easy</h3>
        <p>Quick and hassle-free ordering process.</p>
    </div>

    <div class="feature">
        <div class="feature-icon">🛡️</div>
        <h3>Safe & Secure</h3>
        <p>Your information is protected and secure.</p>
    </div>
</section>

<section class="menu-section" id="menu">
    <div class="menu-intro">
        <span class="section-label">OUR MENU</span>
        <h2>Tasty Meals, Made Fresh</h2>
        <p>
            From classic favorites to delicious snacks,
            we have something for everyone.
        </p>
        <a href="{{ route('login') }}" class="btn btn-primary">
            View Full Menu →
        </a>
    </div>

    <div class="menu-cards">
        <div class="menu-card">
            <img src="https://images.unsplash.com/photo-1547592180-85f173990554?auto=format&fit=crop&w=500&q=80" alt="Main dishes">
            <h3>🍛 Main Dishes</h3>
            <p>Chicken, Pork, Beef & More</p>
        </div>

        <div class="menu-card">
            <img src="https://images.unsplash.com/photo-1551183053-bf91a1d81141?auto=format&fit=crop&w=500&q=80" alt="Rice meals">
            <h3>🍚 Rice Meals</h3>
            <p>Affordable & Delicious</p>
        </div>

        <div class="menu-card">
            <img src="https://images.unsplash.com/photo-1541592106381-b31e9677c0e5?auto=format&fit=crop&w=500&q=80" alt="Snacks">
            <h3>🥟 Snacks</h3>
            <p>Perfect for Small Hunger</p>
        </div>

        <div class="menu-card">
            <img src="https://images.unsplash.com/photo-1513558161293-cdaf765edfd4?auto=format&fit=crop&w=500&q=80" alt="Beverages">
            <h3>🥤 Beverages</h3>
            <p>Cool & Refreshing</p>
        </div>
    </div>
</section>

<footer id="contact">
    <h3>🍽️ Canteen Ordering System</h3>
    <p>Good Food • Better Days</p>
    <p>© {{ date('Y') }} Canteen Ordering System. All rights reserved.</p>
</footer>

</body>
</html>
