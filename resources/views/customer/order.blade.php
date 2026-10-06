<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Place Order</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 40px;
        }

        .box {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
        }

        h1 {
            margin-top: 0;
        }

        .food {
            border: 1px solid #ddd;
            padding: 15px;
            margin: 10px 0;
            border-radius: 6px;
        }

        .food input {
            margin-right: 10px;
        }

        .quantity {
            margin-top: 20px;
        }

        button {
            margin-top: 20px;
            padding: 12px 25px;
            background: #28a745;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .back {
            display: block;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

<div class="box">

    <a class="back" href="/customer/dashboard">
        ← Back to Customer Dashboard
    </a>

    <h1>🛒 Place an Order</h1>

    <p>Select the food you want to order.</p>

    <form action="/customer/orders" method="GET">

        <div class="food">
            <input type="radio" name="food" value="Chicken Meal" checked>
            Chicken Meal — ₱50
        </div>

        <div class="food">
            <input type="radio" name="food" value="Siomai">
            Siomai — ₱30
        </div>

        <div class="food">
            <input type="radio" name="food" value="Soft Drink">
            Soft Drink — ₱25
        </div>

        <div class="quantity">

            <label for="quantity">
                <strong>Quantity:</strong>
            </label>

            <br><br>

            <input
                type="number"
                id="quantity"
                name="quantity"
                value="1"
                min="1"
            >

        </div>

        <br>

        <button type="submit">
            🛒 Place Order
        </button>

    </form>

</div>

</body>

</html>