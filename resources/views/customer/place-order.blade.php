<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Place Order - Canteen Ordering System</title>

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
            max-width: 650px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }

        .food-icon {
            font-size: 60px;
            text-align: center;
        }

        h2 {
            text-align: center;
        }

        .detail {
            padding: 12px;
            border-bottom: 1px solid #eee;
        }

        .price {
            color: #ea580c;
            font-size: 24px;
            font-weight: bold;
        }

        .stock {
            color: #16a34a;
            font-weight: bold;
        }

        label {
            display: block;
            margin-top: 20px;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="number"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .buttons {
            margin-top: 25px;
        }

        .order-btn {
            width: 100%;
            padding: 14px;
            background: #ea580c;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        .order-btn:hover {
            opacity: 0.85;
        }

        .back {
            display: block;
            margin-top: 15px;
            padding: 12px;
            background: #475569;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
        }

        .logout {
            text-align: center;
            margin-top: 25px;
        }

        .logout button {
            padding: 10px 18px;
            background: #dc2626;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>🍽️ Canteen Ordering System</h1>
        <p>Place Your Order</p>
    </div>

    <div class="container">

        <div class="card">

            <div class="food-icon">
                🍛
            </div>

            <h2>{{ $product->name }}</h2>

            <div class="detail">
                <strong>Category:</strong>
                {{ $product->brand }}
            </div>

            <div class="detail price">
                ₱{{ number_format($product->price, 2) }}
            </div>

            <div class="detail stock">
                Available Stock: {{ $product->stock }}
            </div>

            @if ($errors->any())

                <div class="error">

                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach

                </div>

            @endif

            <form
                method="POST"
                action="{{ route('customer.orders.store', $product) }}"
            >

                @csrf

                <label for="quantity">
                    Quantity
                </label>

                <input
                    type="number"
                    id="quantity"
                    name="quantity"
                    min="1"
                    max="{{ $product->stock }}"
                    value="{{ old('quantity', 1) }}"
                    required
                >

                <div class="buttons">

                    <button
                        type="submit"
                        class="order-btn"
                    >
                        🛒 Place Order
                    </button>

                </div>

            </form>

            <a
                href="{{ route('customer.products') }}"
                class="back"
            >
                ← Back to Food Menu
            </a>

        </div>

        <div class="logout">

            <form method="POST" action="{{ route('logout') }}">

                @csrf

                <button type="submit">
                    🚪 Logout
                </button>

            </form>

        </div>

    </div>

</body>
</html>