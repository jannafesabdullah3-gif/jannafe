<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Update Order Status</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f8;
        }

        .container {
            width: 90%;
            max-width: 1000px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        .back {
            display: inline-block;
            margin-bottom: 20px;
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        .back:hover {
            text-decoration: underline;
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

        select {
            padding: 9px;
            border: 1px solid #ccc;
            border-radius: 5px;
            min-width: 130px;
        }

        button {
            padding: 9px 15px;
            border: none;
            border-radius: 5px;
            background: #28a745;
            color: white;
            cursor: pointer;
            margin-left: 5px;
        }

        button:hover {
            background: #218838;
        }

        .status {
            font-weight: bold;
        }

        .message {
            margin-top: 20px;
            padding: 12px;
            background: #d4edda;
            color: #155724;
            border-radius: 5px;
        }
    </style>
</head>

<body>

<div class="container">

    <a href="{{ route('staff.dashboard') }}" class="back">
        ← Back to Staff Dashboard
    </a>

    <h1>🔄 Update Order Status</h1>

    <p>
        Staff can update the status of customer orders.
    </p>

    @if(request('status'))
        <div class="message">
            Order status updated to:
            <strong>{{ request('status') }}</strong>
        </div>
    @endif

    <table>

        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer</th>
                <th>Food</th>
                <th>Current Status</th>
                <th>Update Status</th>
            </tr>
        </thead>

        <tbody>

            <tr>

                <td>#001</td>

                <td>Customer</td>

                <td>Chicken Meal</td>

                <td class="status">
                    {{ request('status', 'Pending') }}
                </td>

                <td>

                    <form method="GET"
                          action="{{ route('staff.order-status') }}">

                        <select name="status">

                            <option value="Pending"
                                {{ request('status', 'Pending') == 'Pending' ? 'selected' : '' }}>
                                Pending
                            </option>

                            <option value="Preparing"
                                {{ request('status') == 'Preparing' ? 'selected' : '' }}>
                                Preparing
                            </option>

                            <option value="Ready"
                                {{ request('status') == 'Ready' ? 'selected' : '' }}>
                                Ready
                            </option>

                            <option value="Completed"
                                {{ request('status') == 'Completed' ? 'selected' : '' }}>
                                Completed
                            </option>

                        </select>

                        <button type="submit">
                            Update
                        </button>

                    </form>

                </td>

            </tr>

        </tbody>

    </table>

</div>

</body>

</html>