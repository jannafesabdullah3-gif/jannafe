<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

```
<title>Admin Dashboard</title>

<style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background: #f4f6f8;
    }

    .header {
        background: #343a40;
        color: white;
        padding: 25px;
        text-align: center;
    }

    .container {
        width: 90%;
        margin: 40px auto;
    }

    .cards {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
    }

    .card {
        background: white;
        padding: 25px;
        text-align: center;
        border-radius: 10px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.12);
    }

    .card h2 {
        margin-bottom: 15px;
    }

    .button {
        display: inline-block;
        padding: 12px 20px;
        background: #007bff;
        color: white;
        text-decoration: none;
        border-radius: 5px;
    }

    .button:hover {
        background: #0056b3;
    }

    .logout {
        background: #dc3545;
        border: none;
        cursor: pointer;
        font-size: 16px;
    }

    .logout:hover {
        background: #b02a37;
    }

    @media (max-width: 800px) {
        .cards {
            grid-template-columns: 1fr 1fr;
        }
    }
</style>
```

</head>

<body>

<div class="header">

```
<h1>Welcome, Admin!</h1>

<p>Canteen Ordering System</p>
```

</div>

<div class="container">

```
<div class="cards">

    <!-- Manage Users -->

    <div class="card">

        <h2>Manage Users</h2>

        <p>Manage system users and their roles.</p>

        <a
            href="{{ route('admin.users') }}"
            class="button">
            Manage Users
        </a>

    </div>


    <!-- Manage Foods -->

    <div class="card">

        <h2>Manage Foods</h2>

        <p>Add, edit and delete food items.</p>

        <a
            href="{{ route('admin.foods') }}"
            class="button">
            Manage Foods
        </a>

    </div>


    <!-- View Orders -->

    <div class="card">

        <h2>View Orders</h2>

        <p>View customer orders.</p>

        <a
            href="#"
            class="button">
            View Orders
        </a>

    </div>


    <!-- Reports -->

    <div class="card">

        <h2>Reports</h2>

        <p>View canteen reports.</p>

        <a
            href="#"
            class="button">
            Reports
        </a>

    </div>

</div>


<!-- Logout -->

<div style="text-align:center; margin-top:40px;">

    <form method="POST" action="{{ route('logout') }}">

        @csrf

        <button
            type="submit"
            class="button logout">
            Logout
        </button>

    </form>

</div>
```

</div>

</body>
</html>
