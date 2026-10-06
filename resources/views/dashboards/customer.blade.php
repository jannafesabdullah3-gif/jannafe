<!DOCTYPE html>

<html>
<head>
    <title>Customer Dashboard</title>
</head>
<body>

<h1>Welcome, Customer!</h1>

<h2>Canteen Ordering System</h2>

<h3>Customer Dashboard</h3>

<hr>

<h3>Menu</h3>

<p>
    <a href="#">View Foods</a>
</p>

<p>
    <a href="#">Order Food</a>
</p>

<p>
    <a href="#">My Orders</a>
</p>

<p>
    <a href="#">Order Status</a>
</p>

<hr>

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>

</body>
</html>
