```blade
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add User - Canteen Ordering System</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 30px;
            font-family: Arial, sans-serif;
            background: #f5f5f5;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.10);
        }

        h1 {
            margin-top: 0;
            margin-bottom: 5px;
        }

        .subtitle {
            color: #666;
            margin-bottom: 25px;
        }

        .back-button {
            display: inline-block;
            margin-bottom: 20px;
            padding: 9px 14px;
            background: #6b7280;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }

        .back-button:hover {
            background: #4b5563;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
        }

        input,
        select {
            width: 100%;
            padding: 11px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
        }

        input:focus,
        select:focus {
            outline: none;
            border-color: #2563eb;
        }

        .error-box {
            margin-bottom: 20px;
            padding: 12px;
            background: #fee2e2;
            color: #991b1b;
            border-radius: 6px;
        }

        .error-box ul {
            margin: 5px 0 0 20px;
        }

        .add-button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 6px;
            background: #2563eb;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        .add-button:hover {
            background: #1d4ed8;
        }
    </style>
</head>

<body>

<div class="container">

    <!-- BACK TO MANAGE USERS -->
    <a href="/admin/users" class="back-button">
        ← Back to Users
    </a>

    <h1>Add User</h1>

    <div class="subtitle">
        Canteen Ordering System
    </div>

    <!-- VALIDATION ERRORS -->
    @if ($errors->any())
        <div class="error-box">

            <strong>Please fix the following errors:</strong>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>
    @endif

    <!-- ADD USER FORM -->
    <form action="/admin/users" method="POST">

        @csrf

        <!-- NAME -->
        <div class="form-group">

            <label for="name">
                Full Name
            </label>

            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name') }}"
                placeholder="Enter full name"
                required
            >

        </div>

        <!-- USERNAME -->
        <div class="form-group">

            <label for="username">
                Username
            </label>

            <input
                type="text"
                id="username"
                name="username"
                value="{{ old('username') }}"
                placeholder="Enter username"
                required
            >

        </div>

        <!-- EMAIL -->
        <div class="form-group">

            <label for="email">
                Email
            </label>

            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="Enter email"
                required
            >

        </div>

        <!-- PASSWORD -->
        <div class="form-group">

            <label for="password">
                Password
            </label>

            <input
                type="password"
                id="password"
                name="password"
                placeholder="Enter password"
                required
            >

        </div>

        <!-- CONFIRM PASSWORD -->
        <div class="form-group">

            <label for="password_confirmation">
                Confirm Password
            </label>

            <input
                type="password"
                id="password_confirmation"
                name="password_confirmation"
                placeholder="Confirm password"
                required
            >

        </div>

        <!-- ROLE -->
        <div class="form-group">

            <label for="role">
                Role
            </label>

            <select
                id="role"
                name="role"
                required
            >

                <option value="">
                    -- Select Role --
                </option>

                <option value="admin"
                    {{ old('role') == 'admin' ? 'selected' : '' }}>
                    Admin
                </option>

                <option value="manager"
                    {{ old('role') == 'manager' ? 'selected' : '' }}>
                    Manager
                </option>

                <option value="staff"
                    {{ old('role') == 'staff' ? 'selected' : '' }}>
                    Staff
                </option>

                <option value="client"
                    {{ old('role') == 'client' ? 'selected' : '' }}>
                    Client
                </option>

                <option value="customer"
                    {{ old('role') == 'customer' ? 'selected' : '' }}>
                    Customer
                </option>

            </select>

        </div>

        <!-- SUBMIT -->
        <button
            type="submit"
            class="add-button"
        >
            Add User
        </button>

    </form>

</div>

</body>
</html>
```
