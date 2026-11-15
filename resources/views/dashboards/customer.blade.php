
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f0fdf4;
            color: #1f2937;
        }

        header {
            background: #166534;
            color: white;
            padding: 24px;
            text-align: center;
        }

        .container {
            max-width: 1100px;
            margin: 35px auto;
            padding: 20px;
        }

        .menu {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 18px;
        }

        .card {
            display: block;
            padding: 25px;
            background: white;
            border-radius: 12px;
            text-decoration: none;
            color: #166534;
            box-shadow: 0 3px 12px #00000012;
            border: 1px solid #dcfce7;
        }

        .card:hover {
            background: #dcfce7;
        }

        .card h3 {
            margin-top: 0;
        }

        .logout {
            margin-top: 30px;
            text-align: center;
        }

        button {
            background: #b91c1c;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <header>
        <h1>CANTEEN ORDERING SYSTEM</h1>
        <p>Welcome, {{ auth()->user()->name }}!</p>
        <h2>Customer Dashboard</h2>
    </header>

    <div class="container">
        <h2>Customer Services</h2>

        <div class="menu">
            <a class="card" href="{{ route('customer.foods') }}">
                <h3>🍽️ View Foods</h3>
                <p>Browse available food items.</p>
            </a>

            <a class="card" href="{{ route('customer.order') }}">
                <h3>🛒 Order Food</h3>
                <p>Select food items to order.</p>
            </a>

            <a class="card" href="{{ route('customer.orders') }}">
                <h3>📋 My Orders</h3>
                <p>View your orders.</p>
            </a>

            <a class="card" href="{{ route('customer.order-status') }}">
                <h3>📦 Order Status</h3>
                <p>Track your order status.</p>
            </a>
        </div>

        <div class="logout">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
    </div>
</body>
</html>
```