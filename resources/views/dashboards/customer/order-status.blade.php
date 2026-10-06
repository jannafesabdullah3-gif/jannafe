<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Order Status</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
        }

        .container {
            width: 90%;
            max-width: 800px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }

        .back {
            color: #007bff;
            text-decoration: none;
        }

        h1 {
            margin-top: 25px;
        }

        .status {
            margin-top: 25px;
            padding: 25px;
            background: #f1f3f5;
            border-radius: 8px;
        }

        .status h2 {
            margin-top: 0;
        }

        .empty {
            color: #777;
        }
    </style>
</head>

<body>

<div class="container">

    <a href="{{ route('customer.dashboard') }}" class="back">
        ← Back to Customer Dashboard
    </a>

    <h1>Order Status</h1>

    <p>
        Check the current status of your food orders.
    </p>

    <div class="status">

        <h2>📦 No Active Orders</h2>

        <p class="empty">
            You currently have no active orders.
        </p>

    </div>

</div>

</body>
</html>