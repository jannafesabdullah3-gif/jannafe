<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add User</title>

    <style>
        body {
            margin: 0;
            padding: 30px;
            font-family: Arial, sans-serif;
            background: #f4f4f4;
        }

        .container {
            width: 95%;
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .back {
            display: inline-block;
            margin-bottom: 25px;
            text-decoration: none;
            color: #333;
        }

        h1 {
            margin-bottom: 5px;
        }

        .subtitle {
            color: #666;
            margin-bottom: 25px;
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
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 15px;
        }

        .error {
            color: #dc3545;
            font-size: 14px;
            margin-top: 5px;
        }

        .buttons {
            margin-top: 25px;
        }

        .save-button {
            background: #28a745;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
        }

        .cancel-button {
            display: inline-block;
            margin-left: 10px;
            background: #6c757d;
            color: white;
            padding: 12px 20px;
            border-radius: 6px;
            text-decoration: none;
        }
    </style>
</head>

<body>

<div class="container">

    <a href="/admin/users" class="back">
        ← Back to Manage Users
    </a>

    <h1>Add User</h1>

    <div class="subtitle">
        Canteen Ordering System
    </div>

    @if($errors->any())
        <div style="background:#f8d7da; color:#721c24; padding:15px; border-radius:6px; margin-bottom:20px;">
            <strong>Please fix the following:</strong>

            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/admin/users" method="POST">

        @csrf

        <div class="form-group">
            <label for="name">Name</label>

            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name') }}"
                placeholder="Enter full name"
                required
            >

            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="username">Username</label>

            <input
                type="text"
                id="username"
                name="username"
                value="{{ old('username') }}"
                placeholder="Enter username"
                required
            >

            @error('username')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>

            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="Enter email"
                required
            >

            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Password</label>

            <input
                type="password"
                id="password"
                name="password"
                placeholder="Enter password"
                required
            >

            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>

            <input
                type="password"
                id="password_confirmation"
                name="password_confirmation"
                placeholder="Confirm password"
                required
            >
        </div>

        <div class="form-group">
            <label for="role">Role</label>

            <select id="role" name="role" required>

                <option value="">-- Select Role --</option>

                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>
                    Admin
                </option>

                <option value="manager" {{ old('role') == 'manager' ? 'selected' : '' }}>
                    Manager
                </option>

                <option value="staff" {{ old('role') == 'staff' ? 'selected' : '' }}>
                    Staff
                </option>

                <option value="client" {{ old('role') == 'client' ? 'selected' : '' }}>
                    Client
                </option>

                <option value="customer" {{ old('role') == 'customer' ? 'selected' : '' }}>
                    Customer
                </option>

            </select>

            @error('role')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="buttons">

            <button type="submit" class="save-button">
                Add User
            </button>

            <a href="/admin/users" class="cancel-button">
                Cancel
            </a>

        </div>

    </form>

</div>

</body>
</html>