<!DOCTYPE html>
<html>
<head>
    <title>Food Items</title>
</head>
<body>

    <h1>Canteen Ordering System</h1>

    <h2>Food Items List</h2>

    <a href="{{ route('products.create') }}">Add Food</a>

    <br><br>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Food Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->brand }}</td>
                    <td>₱{{ number_format($product->price, 2) }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product) }}">
                            Edit
                        </a>

                        <form method="POST"
                              action="{{ route('products.destroy', $product) }}"
                              style="display:inline;">
                            @csrf
                            @method('DELETE')

                            <button type="submit">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">
                        Wala pang nakatalang pagkain sa menu.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>