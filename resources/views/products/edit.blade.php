<!DOCTYPE html>
<html>
<head>
    <title>Edit Food</title>
</head>
<body>

    <h1>Canteen Ordering System</h1>
    <h2>Edit Food</h2>

    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('products.update', $product) }}">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Food Name</label>
            <br>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name', $product->name) }}"
                required
            >
        </div>

        <br>

        <div>
            <label for="brand">Category</label>
            <br>
            <input
                type="text"
                id="brand"
                name="brand"
                value="{{ old('brand', $product->brand) }}"
                required
            >
        </div>

        <br>

        <div>
            <label for="price">Price</label>
            <br>
            <input
                type="number"
                id="price"
                name="price"
                value="{{ old('price', $product->price) }}"
                step="0.01"
                required
            >
        </div>

        <br>

        <div>
            <label for="stock">Stock</label>
            <br>
            <input
                type="number"
                id="stock"
                name="stock"
                value="{{ old('stock', $product->stock) }}"
                min="0"
                required
            >
        </div>

        <br>

        <button type="submit">Update Food</button>

        <a href="{{ route('products.index') }}">Cancel</a>
    </form>

</body>
</html>