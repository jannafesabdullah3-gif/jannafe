<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Orders - Canteen Admin</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f7f4;
        }

        .header {
            background: #198754;
            color: white;
            padding: 20px 30px;
        }

        .header h1 {
            margin: 0;
        }

        .container {
            padding: 30px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #198754;
            color: white;
        }

        .back {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 15px;
            background: #198754;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: #777;
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>📦 View Orders</h1>
        <p>Canteen Ordering System</p>
    </div>

    <div class="container">

        <a href="{{ url('/admin/dashboard') }}" class="back">
            ← Back to Dashboard
        </a>

        <div class="card">

            <h2>Customer Orders</h2>

            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Food</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td colspan="6" class="empty">
                            No orders available yet.
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>

    </div>

</body>
</html>