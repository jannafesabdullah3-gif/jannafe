<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Manage Foods - Canteen Admin</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 30px;
            font-family: Arial, Helvetica, sans-serif;
            background: #f1f8f3;
        }

        .container {
            width: 95%;
            max-width: 1200px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        }

        .back {
            display: inline-block;
            margin-bottom: 25px;
            color: #198754;
            text-decoration: none;
            font-weight: bold;
            font-size: 15px;
        }

        .back:hover {
            color: #146c43;
        }

        .title-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        h1 {
            margin: 0;
            color: #198754;
            font-size: 30px;
        }

        .subtitle {
            margin-top: 7px;
            color: #777;
            font-size: 15px;
        }

        .add-food {
            background: #198754;
            color: white;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 8px;
            font-weight: bold;
        }

        .add-food:hover {
            background: #146c43;
        }

        .food-card {
            border: 1px solid #e5e5e5;
            border-radius: 10px;
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #198754;
            color: white;
            padding: 15px;
            text-align: left;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #eee;
        }

        tr:hover {
            background: #f3faf5;
        }

        .food-name {
            font-weight: bold;
        }

        .price {
            color: #198754;
            font-weight: bold;
        }

        .available {
            display: inline-block;
            background: #d1e7dd;
            color: #0f5132;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
        }

        .edit {
            background: #0d6efd;
            color: white;
            border: none;
            padding: 7px 13px;
            border-radius: 6px;
            cursor: pointer;
            margin-right: 5px;
        }

        .edit:hover {
            background: #0b5ed7;
        }

        .delete {
            background: #dc3545;
            color: white;
            border: none;
            padding: 7px 13px;
            border-radius: 6px;
            cursor: pointer;
        }

        .delete:hover {
            background: #bb2d3b;
        }

        @media (max-width: 700px) {
            body {
                padding: 15px;
            }

            .container {
                width: 100%;
                padding: 20px;
            }

            .title-row {
                flex-direction: column;
                align-items: flex-start;
                gap: 20px;
            }

            .add-food {
                width: 100%;
                text-align: center;
            }

            table {
                min-width: 700px;
            }

            .food-card {
                overflow-x: auto;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <!-- BACK -->
    <a href="/admin/dashboard" class="back">
        ← Back to Dashboard
    </a>

    <!-- HEADER -->
    <div class="title-row">

        <div>
            <h1>🍔 Manage Foods</h1>

            <div class="subtitle">
                Canteen Ordering System
            </div>
        </div>

        <a href="/admin/foods/create" class="add-food">
            + Add Food
        </a>

    </div>

    <!-- FOOD TABLE -->
    <div class="food-card">

        <table>

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Food Name</th>
                    <th>Price</th>
                    <th>Availability</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                <tr>
                    <td>1</td>

                    <td>
                        <span class="food-name">
                            Chicken Burger
                        </span>
                    </td>

                    <td>
                        <span class="price">
                            ₱80.00
                        </span>
                    </td>

                    <td>
                        <span class="available">
                            ✓ Available
                        </span>
                    </td>

                    <td>
                        <button class="edit">
                            Edit
                        </button>

                        <button class="delete">
                            Delete
                        </button>
                    </td>
                </tr>

                <tr>
                    <td>2</td>

                    <td>
                        <span class="food-name">
                            French Fries
                        </span>
                    </td>

                    <td>
                        <span class="price">
                            ₱50.00
                        </span>
                    </td>

                    <td>
                        <span class="available">
                            ✓ Available
                        </span>
                    </td>

                    <td>
                        <button class="edit">
                            Edit
                        </button>

                        <button class="delete">
                            Delete
                        </button>
                    </td>
                </tr>

                <tr>
                    <td>3</td>

                    <td>
                        <span class="food-name">
                            Siomai Rice
                        </span>
                    </td>

                    <td>
                        <span class="price">
                            ₱60.00
                        </span>
                    </td>

                    <td>
                        <span class="available">
                            ✓ Available
                        </span>
                    </td>

                    <td>
                        <button class="edit">
                            Edit
                        </button>

                        <button class="delete">
                            Delete
                        </button>
                    </td>
                </tr>

            </tbody>

        </table>

    </div>

</div>

</body>
</html>