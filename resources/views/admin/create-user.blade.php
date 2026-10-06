<!DOCTYPE html>
<html>
<head>
    <title>Add User</title>
</head>
<body>

    <h1>Canteen Ordering System</h1>

    <h2>Add New User</h2>

    <a href="{{ route('admin.users') }}">
        Back to Manage Users
    </a>

    <br><br>

    @if ($errors->any())

        <div>

            <strong>Please fix the following errors:</strong>

            @foreach ($errors->all() as $error)

                <p>{{ $error }}</p>

            @endforeach

        </div>

    @endif

    <form method="POST" action="{{ route('admin.users.store') }}">

        @csrf

        <div>

            <label for="name">
                Name
            </label>

            <br>

            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name') }}"
                required
            >

        </div>

        <br>

        <div>

            <label for="username">
                Username
            </label>

            <br>

            <input
                type="text"
                id="username"
                name="username"
                value="{{ old('username') }}"
                required
            >

        </div>

        <br>

        <div>

            <label for="email">
                Email
            </label>

            <br>

            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
                required
            >

        </div>

        <br>

        <div>

            <label for="password">
                Password
            </label>

            <br>

            <input
                type="password"
                id="password"
                name="password"
                required
            >

        </div>

        <br>

        <div>

            <label for="role">
                Role
            </label>

            <br>

            <select id="role" name="role" required>

                <option value="">
                    Select Role
                </option>

                <option value="admin"
                    {{ old('role') === 'admin' ? 'selected' : '' }}>
                    Admin
                </option>

                <option value="staff"
                    {{ old('role') === 'staff' ? 'selected' : '' }}>
                    Staff
                </option>

                <option value="customer"
                    {{ old('role') === 'customer' ? 'selected' : '' }}>
                    Customer
                </option>

            </select>

        </div>

        <br>

        <button type="submit">
            Add User
        </button>

    </form>

</body>
</html>