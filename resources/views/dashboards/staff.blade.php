<!DOCTYPE html>
<html>
<head>
    <title>Staff Dashboard</title>
</head>
<body>

<h1>Welcome, Staff!</h1>

<h2>Canteen Ordering System</h2>

<h3>Staff Dashboard</h3>

<br>

<a href="{{ route('staff.orders') }}">
    View Orders
</a>

<br><br>

<a href="{{ route('staff.orders.manage') }}">
    Manage Orders
</a>

<br><br>

<a href="{{ route('staff.orders.status') }}">
    Update Order Status
</a>

<br><br>

<form method="POST" action="{{ route('logout') }}">
    @csrf

    <button type="submit">
        Logout
    </button>
</form>

</body>
</html>