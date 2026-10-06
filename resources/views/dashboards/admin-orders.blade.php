```html
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>View Orders</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            min-height: 100vh;
        }

        .header {
            background: #e67e22;
            color: white;
            padding: 25px 40px;
        }

        .header h1 {
            margin-bottom: 5px;
        }

        .container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 20px;
        }

        .back {
            display: inline-block;
            background: #333;
            color: white;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 25px;
        }

        .back:hover {
            background: #111;
        }

        .box {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        h2 {
            color: #333;
            margin-bottom: 10px;
        }

        .description {
            color: #666;
            margin-bottom: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #e67e22;
            color: white;
            padding: 15px;
            text-align: left;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }

        .empty {
            text-align: center;
            color: #777;
            padding: 30px;
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>📦 View Orders</h1>
        <p>Canteen Ordering System</p>
    </div>

    <div class="container">

        <a href="/admin/dashboard" class="back">
            ← Back to Dashboard
        </a>

        <div class="box">

            <h2>Customer Orders</h2>

            <p class="description">
                View and monitor all customer orders.
            </p>

            <table>

                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Food</th>
                        <th>Quantity</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td colspan="5" class="empty">
                            No orders available yet.
                        </td>
                    </tr>
                </tbody>

            </table>

        </div>

    </div>

</body>

</html>
```
