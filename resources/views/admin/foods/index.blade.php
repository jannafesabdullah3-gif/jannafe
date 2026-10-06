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
            color: #333;
        }

        .container {
            width: 95%;
            max-width: 1200px;
            margin: 0 auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 14px;
            box-shadow: 0 4px 18px rgba(0, 0, 0, 0.08);
        }

        /* BACK BUTTON */
        .back {
            display: inline-block;
            margin-bottom: 25px;
            color: #198754;
            text-decoration: none;
            font-size: 15px;
            font-weight: bold;
        }

        .back:hover {
            color: #146c43;
        }

        /* HEADER */
        .title-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 25px;
        }

        h1 {
            margin: 0;
            font-size: 30px;
            color: #198754;
        }

        .subtitle {
            margin-top: 7px;
            color: #777;
            font-size: 15px;
        }

        /* ADD FOOD BUTTON */
        .add-food-button {
            display: inline-block;
            background: #198754;
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 15px;
            font-weight: bold;
            transition: 0.2s;
        }

        .add-food-button:hover {
            background: #146c43;
            transform: translateY(-1px);
        }

        /* ALERTS */
        .success {
            background: #d1e7dd;
            color: #0f5132;
            border-left: 5px solid #198754;
            padding: 13px 15px;
            border-radius: 7px;
            margin-bottom: 20px;
        }

        .error {
            background: #f8d7da;
            color: #842029;
            border-left: 5px solid #dc3545;
            padding: 13px 15px;
            border-radius: 7px;
            margin-bottom: 20px;
        }

        .error ul {
            margin: 8px 0 0 20px;
        }

        /* TABLE */
        .table-wrapper {
            overflow-x: auto;
            border-radius: 10px;
            border: 1px solid #e5e5e5;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 700px;
        }

        th {
            background: #198754;
            color: white;
            padding: 15px;
            text-align: left;
            font-size: 14px;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #eeeeee;
            font-size: 14px;
        }

        tbody tr {
            transition: 0.2s;
        }

        tbody tr:hover {
            background: #f3faf5;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        /* FOOD NAME */
        .food-name {
            font-weight: bold;
            color: #333;
        }

        /* PRICE */
        .price {
            font-weight: bold;
            color: #198754;
        }

        /* STATUS */
        .available,
        .unavailable {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .available {
            background: #d1e7dd;
            color: #0f5132;
        }

        .unavailable {
            background: #f8d7da;
            color: #842029;
        }

        /* ACTION BUTTONS */
        .actions {
            white-space: nowrap;
        }

        .edit-button {
            display: inline-block;
            background: #0d6efd;
            color: white;
            padding: 7px 13px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 13px;
            font-weight: bold;
            margin-right: 5px;
            transition: 0.2s;
        }

        .edit-button:hover {
            background: #0b5ed7;
        }

        .delete-button {
            background: #dc3545;
            color: white;
            padding: 7px 13px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 13px;
            font-weight: bold;
            transition: 0.2s;
        }

        .delete-button:hover {
            background: #bb2d3b;
        }

        /* EMPTY */
        .empty {
            text-align: center;
            color: #777;
            padding: 35px;
        }

        /* MOBILE */
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
            }

            .add-food-button {
                width: 100%;
                text-align: center;
            }

            h1 {
                font-size: 25px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <!-- BACK TO DASHBOARD -->
    <a href="{{ route('admin.dashboard') }}" class="back">
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

        <a href="{{ route('admin.foods.create') }}" class="add-food-button">
            + Add Food
        </a>

    </div>

    <!-- SUCCESS MESSAGE -->
    @if(session('success'))
        <div class="success">
            ✓ {{ session('success') }}
        </div>
    @endif

    <!-- ERROR MESSAGE -->
    @if($errors->any())
        <div class="error">
            <strong>Please fix the following:</strong>

            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- FOOD TABLE -->
    <div class="table-wrapper">

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

                @forelse($foods as $food)

                    <tr>

                        <td>
                            {{ $food->id }}
                        </td>

                        <td>
                            <span class="food-name">
                                {{ $food->name }}
                            </span>
                        </td>

                        <td>
                            <span class="price">
                                ₱{{ number_format($food->price, 2) }}
                            </span>
                        </td>

                        <td>

                            @if($food->availability === 'available')

                                <span class="available">
                                    ✓ Available
                                </span>

                            @else

                                <span class="unavailable">
                                    ✕ Unavailable
                                </span>

                            @endif

                        </td>

                        <td class="actions">

                            <!-- EDIT -->
                            <a
                                href="{{ route('admin.foods.edit', $food->id) }}"
                                class="edit-button">
                                Edit
                            </a>

                            <!-- DELETE -->
                            <form
                                action="{{ route('admin.foods.destroy', $food->id) }}"
                                method="POST"
                                style="display:inline;">

                                @csrf

                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="delete-button"
                                    onclick="return confirm('Are you sure you want to delete this food?');">
                                    Delete
                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="5" class="empty">
                            No foods available yet.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

</body>
</html>