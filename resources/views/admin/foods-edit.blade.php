
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Food - Canteen Admin</title>
</head>
<body>
    <h1>Edit Food</h1>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p style="color:red">{{ $error }}</p>
        @endforeach
    @endif

    <form method="POST"
          action="{{ route('admin.foods.update', $food->id) }}">
        @csrf
        @method('PUT')

        <p>
            <label>Food Name</label><br>
            <input type="text" name="name"
                   value="{{ old('name', $food->name) }}" required>
        </p>

        <p>
            <label>Price (₱)</label><br>
            <input type="number" name="price" min="0" step="0.01"
                   value="{{ old('price', $food->price) }}" required>
        </p>

        <p>
            <label>Availability</label><br>
            <select name="availability" required>
                <option value="available"
                    {{ old('availability', $food->availability) === 'available' ? 'selected' : '' }}>
                    Available
                </option>
                <option value="unavailable"
                    {{ old('availability', $food->availability) === 'unavailable' ? 'selected' : '' }}>
                    Unavailable
                </option>
            </select>
        </p>

        <button type="submit">Update Food</button>
        <a href="{{ route('admin.foods') }}">Cancel</a>
    </form>
</body>
</html>
