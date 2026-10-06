<!DOCTYPE html>
<html>
<head>
    <title>Manage Users</title>
</head>
<body>

    <h1>Canteen Ordering System</h1>

    <h2>Manage Users</h2>

    <a href="{{ route('admin.dashboard') }}">
        Back to Admin Dashboard
    </a>

    <br><br>

    <a href="{{ route('admin.users.create') }}">
        <button type="button">
            Add New User
        </button>
    </a>

    <br><br>

    @if (session('success'))
        <p>
            <strong>{{ session('success') }}</strong>
        </p>
    @endif

    <form method="GET" action="{{ route('admin.users') }}">

        <label for="search">
            Search User:
        </label>

        <input
            type="text"
            id="search"
            name="search"
            value="{{ $search ?? '' }}"
            placeholder="Name, username, or email"
        >

        <label for="role">
            Role:
        </label>

        <select id="role" name="role">

            <option value="">
                All Users
            </option>

            <option value="admin"
                {{ ($role ?? '') === 'admin' ? 'selected' : '' }}>
                Admin
            </option>

            <option value="staff"
                {{ ($role ?? '') === 'staff' ? 'selected' : '' }}>
                Staff
            </option>

            <option value="customer"
                {{ ($role ?? '') === 'customer' ? 'selected' : '' }}>
                Customer
            </option>

        </select>

        <button type="submit">
            Search
        </button>

        <a href="{{ route('admin.users') }}">
            Clear
        </a>

    </form>

    <br>

    @if ($users->count() > 0)

        <table border="1" cellpadding="10">

            <thead>

                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>

            </thead>

            <tbody>

                @foreach ($users as $user)

                    <tr>

                        <td>{{ $user->id }}</td>

                        <td>{{ $user->name }}</td>

                        <td>{{ $user->username }}</td>

                        <td>{{ $user->email }}</td>

                        <td>{{ $user->role }}</td>

                        <td>

                            @if ($user->id !== auth()->id())

                                <form
                                    method="POST"
                                    action="{{ route('admin.users.destroy', $user) }}"
                                    onsubmit="return confirm('Are you sure you want to delete this user?');"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit">
                                        Delete
                                    </button>

                                </form>

                            @else

                                <strong>Current Admin</strong>

                            @endif

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    @else

        <p>No users found.</p>

    @endif

    <br><br>

    <form method="POST" action="{{ route('logout') }}">

        @csrf

        <button type="submit">
            Logout
        </button>

    </form>

</body>
</html>