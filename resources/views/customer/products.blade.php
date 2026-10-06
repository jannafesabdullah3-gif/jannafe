<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Food Menu - Canteen Ordering System</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f9;
        }

        .header {
            background: #ea580c;
            color: white;
            padding: 25px 40px;
        }

        .header h1 {
            margin: 0;
        }

        .header p {
            margin: 8px 0 0;
        }

        .container {
            padding: 35px;
        }

        .top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
        }

        .back {
            text-decoration: none;
            color: #2563eb;
            font-weight: bold;
        }

        .menu {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-top: 30px;
        }

        .food-card {
            background: white;
            padding: 25px;
            border-radius: 14px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }

        .food-icon {
            font-size: 50px;
        }

        .food-card h3 {
            margin-bottom: 8px;
        }

        .category {
            color: #666;
            margin-bottom: 15px;
        }

        .price {
            font-size: 24px;
            font-weight: bold;
            color: #ea580c;
        }

        .stock {
            margin-top: 10px;
            color: #16a34a;
            font-weight: bold;
        }

        .order-btn {
            display: block;
            margin-top: 20px;
            padding: 13px;
            background: #ea580c;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
        }

        .order-btn:hover {
            opacity: 0.85;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 12px;
            border-radius: 8px;
            margin-top: 20px;
        }

        .empty {
            background: white;
            padding: 30px;
            border-radius: 10px;
            margin-top: 25px;
        }

        .bottom {
            margin-top: 35px;
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .bottom a,
        .logout button {
            padding: 12px 18px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
        }

        .orders {
            background: #2563eb;
            color: white;
        }

        .logout button {
            background: #dc2626;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 15px;
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>🍽️ Canteen Ordering System</h1>
        <p>Food Menu</p>
    </div>

    <div class="container">

        <div class="top">
            <h2>Available Food 🍔</h2>

            <a href="{{ route('customer.dashboard') }}" class="back">
                ← Back to Dashboard
            </a>
        </div>

        @if (session('success'))
            <div class="success">
                <strong>{{ session('success') }}</strong>
            </div>
        @endif

        @if ($products->count() > 0)

            <div class="menu">

                @foreach ($products as $product)

                    <div class="food-card">

                        <div class="food-icon">
                            🍛
                        </div>

                        <h3>{{ $product->name }}</h3>

                        <div class="category">
                            Category: {{ $product->brand }}
                        </div>

                        <div class="price">
                            ₱{{ number_format($product->price, 2) }}
                        </div>

                        <div class="stock">
                            Available: {{ $product->stock }}
                        </div>

                        <a
                            href="{{ route('customer.orders.create', $product) }}"
                            class="order-btn"
                        >
                            🛒 Order Now
                        </a>

                    </div>

                @endforeach

            </div>

        @else

            <div class="empty">
                <h3>No food items available.</h3>
                <p>Please check again later.</p>
            </div>

        @endif

        <div class="bottom">

            <a
                href="{{ route('customer.orders') }}"
                class="orders"
            >
                📦 My Orders
            </a>

            <form method="POST" action="{{ route('logout') }}" class="logout">
                @csrf

                <button type="submit">
                    🚪 Logout
                </button>
            </form>

        </div>

    </div>

</body>
</html>