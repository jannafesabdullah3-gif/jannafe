<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Order Status</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f8;
        }

        .container {
            width: 90%;
            max-width: 900px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }

        .back {
            display: inline-block;
            margin-bottom: 25px;
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        h1 {
            margin-top: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
        }

        th,
        td {
            padding: 15px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #007bff;
            color: white;
        }

        .pending {
            color: #856404;
            font-weight: bold;
        }
    </style>
</head>

<body>

<div class="container">

    <a href="{{ route('customer.dashboard') }}" class="back">
        ← Back to Customer Dashboard
    </a>

    <h1>📦 Order Status</h1>

    <p>Check the status of your order.</p>

    <table>

        <thead>
            <tr>
                <th>Food</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>

            <tr>
                <td>Chicken Meal</td>
                <td>1</td>
                <td>₱50</td>
                <td class="pending">Pending</td>
            </tr>

        </tbody>

    </table>

</div>

</body>

</html>