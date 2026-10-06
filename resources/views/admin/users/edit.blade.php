
<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>

    <h1>Edit User</h1>

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>Name:</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" required>
        </div>

        <br>

        <div>
            <label>Email:</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" required>
        </div>

        <br>

        <div>
            <label>Role:</label>
            <select name="role" required>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="manager" {{ $user->role == 'manager' ? 'selected' : '' }}>Manager</option>
                <option value="staff" {{ $user->role == 'staff' ? 'selected' : '' }}>Staff</option>
                <option value="client" {{ $user->role == 'client' ? 'selected' : '' }}>Client</option>
            </select>
        </div>

        <br>

        <div>
            <label>New Password:</label>
            <input type="password" name="password">
        </div>

        <br>

        <button type="submit">Update User</button>

        <a href="{{ route('admin.users.index') }}">Cancel</a>
    </form>

</body>
</html>
```
