<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Manage Users</title>

    <style>
        body {
            margin: 0;
            padding: 30px;
            font-family: Arial, sans-serif;
            background: #f4f4f4;
        }

        .container {
            width: 95%;
            max-width: 1200px;
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
            font-size: 16px;
        }

        .title-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        h1 {
            margin: 0;
            font-size: 30px;
        }

        .subtitle {
            margin-top: 8px;
            color: #666;
        }

        .add-user-button {
            display: inline-block;
            background: #28a745;
            color: white;
            padding: 14px 22px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        .add-user-button:hover {
            background: #218838;
        }

        .success {
            background: #d4edda;
            color: #155724;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th {
            background: #343a40;
            color: white;
            padding: 13px;
            text-align: left;
        }

        td {
            padding: 13px;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background: #f8f9fa;
        }

        .edit-button {
            display: inline-block;
            background: #007bff;
            color: white;
            padding: 7px 12px;
            border-radius: 5px;
            text-decoration: none;
            margin-right: 5px;
        }

        .delete-button {
            background: #dc3545;
            color: white;
            padding: 7px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>

<div class="container">

    <!-- BACK TO DASHBOARD -->
    <a href="/admin/dashboard" class="back">
        ← Back to Dashboard
    </a>

    <!-- TITLE AND ADD USER BUTTON -->
    <div class="title-row">

        <div>
            <h1>Manage Users</h1>

            <div class="subtitle">
                Canteen Ordering System
            </div>
        </div>

        <a href="/admin/users/create" class="add-user-button">
            + Add User
        </a>

    </div>

    <!-- SUCCESS MESSAGE -->
    @if(session('success'))

        <div class="success">
            {{ session('success') }}
        </div>

    @endif

    <!-- USERS TABLE -->
    <table>

        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

            @forelse($users as $user)

                <tr>

                    <td>
                        {{ $user->id }}
                    </td>

                    <td>
                        {{ $user->name }}
                    </td>

                    <td>
                        {{ $user->username }}
                    </td>

                    <td>
                        {{ $user->email }}
                    </td>

                    <td>
                        {{ $user->role }}
                    </td>

                    <td>
                        {{ $user->created_at }}
                    </td>

                    <td>

                        <!-- EDIT -->
                        <a
                            href="/admin/users/{{ $user->id }}/edit"
                            class="edit-button">
                            Edit
                        </a>

                        <!-- DELETE -->
                        <form
                            action="/admin/users/{{ $user->id }}"
                            method="POST"
                            style="display:inline;">

                            @csrf

                            @method('DELETE')

                            <button
                                type="submit"
                                class="delete-button"
                                onclick="return confirm('Are you sure you want to delete this user?');">
                                Delete
                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="7">
                        No users available yet.
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

</div>

</body>
</html>