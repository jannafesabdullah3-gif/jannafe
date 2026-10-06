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

        <label>Name:</label><br>
        <input type="text" name="name" value="{{ $user->name }}" required>
        <br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="{{ $user->email }}" required>
        <br><br>

        <label>Role:</label><br>
        <select name="role" required>
            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="manager" {{ $user->role == 'manager' ? 'selected' : '' }}>Manager</option>
            <option value="staff" {{ $user->role == 'staff' ? 'selected' : '' }}>Staff</option>
            <option value="client" {{ $user->role == 'client' ? 'selected' : '' }}>Client</option>
        </select>
        <br><br>

        <label>New Password:</label><br>
        <input type="password" name="password">
        <br><br>

        <button type="submit">Update User</button>
        <a href="{{ route('admin.users.index') }}">Cancel</a>
    </form>

</body>
</html>