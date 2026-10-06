<!DOCTYPE html>
<html>
<head>
    <title>Place Order</title>
</head>
<body>

    <h1>Canteen Ordering System</h1>

    <h2>Place Order</h2>

    <a href="{{ route('customer.products') }}">
        Back to Food Menu
    </a>

    <br><br>

    <h3>{{ $product->name }}</h3>

    <p>
        Category: {{ $product->brand }}
    </p>

    <p>
        Price: ₱{{ number_format($product->price, 2) }}
    </p>

    <p>
        Available Stock: {{ $product->stock }}
    </p>

    @if ($errors->any())

        <div>
            <strong>Please fix the following:</strong>

            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>

    @endif

    <form method="POST" action="{{ route('customer.orders.store', $product) }}">

        @csrf

        <label for="quantity">
            Quantity:
        </label>

        <br>

        <input
            type="number"
            id="quantity"
            name="quantity"
            min="1"
            max="{{ $product->stock }}"
            value="1"
            required
        >

        <br><br>

        <button type="submit">
            Place Order
        </button>

    </form>

    <br>

    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <button type="submit">
            Logout
        </button>
    </form>

</body>
</html>