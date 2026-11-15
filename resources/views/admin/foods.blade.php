
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Foods - Canteen Admin</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #f1f7f5;
            color: #123c30;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR */
        .sidebar {
            width: 265px;
            background: #063d2e;
            color: white;
            padding: 25px 16px;
            display: flex;
            flex-direction: column;
            flex-shrink: 0;
        }

        .brand {
            font-size: 22px;
            font-weight: 800;
            line-height: 1.3;
            padding: 0 12px;
            margin-bottom: 50px;
        }

        .brand span {
            color: #63dc7c;
        }

        .sidebar-menu {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 14px;
            color: #e6f5ec;
            text-decoration: none;
            border-radius: 9px;
            font-size: 14px;
            transition: .3s;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background: #12834b;
            color: white;
        }

        .menu-icon {
            width: 24px;
            text-align: center;
            font-size: 19px;
        }

        .sidebar-bottom {
            margin-top: auto;
            padding-top: 25px;
        }

        .weather {
            background: rgba(255,255,255,.10);
            padding: 17px;
            border-radius: 12px;
            margin-bottom: 20px;
        }

        .weather small {
            color: #c8e4d5;
        }

        .weather h3 {
            margin: 7px 0;
            font-size: 23px;
        }

        .admin-info {
            border-top: 1px solid rgba(255,255,255,.15);
            padding: 20px 8px 0;
            font-size: 14px;
        }

        .admin-info span {
            display: block;
            color: #b7d5c5;
            font-size: 12px;
        }

        /* MAIN CONTENT */
        .main-content {
            flex: 1;
            min-width: 0;
        }

        .top-header {
            height: 70px;
            background: white;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            padding: 0 35px;
            box-shadow: 0 2px 8px rgba(0,0,0,.04);
        }

        .admin-label {
            font-weight: 600;
            color: #174d3b;
        }

        .content {
            padding: 28px;
            max-width: 1500px;
            margin: auto;
        }

        /* BANNER */
        .banner {
            min-height: 135px;
            border-radius: 14px;
            padding: 28px 32px;
            display: flex;
            align-items: center;
            background:
                linear-gradient(90deg, rgba(239,249,243,.98), rgba(239,249,243,.85), rgba(239,249,243,.12)),
                url('https://images.unsplash.com/photo-1547592180-85f173990554?auto=format&fit=crop&w=1400&q=85');
            background-size: cover;
            background-position: center;
            margin-bottom: 23px;
            box-shadow: 0 3px 12px rgba(0,0,0,.05);
        }

        .banner-icon {
            background: #087d43;
            color: white;
            width: 62px;
            height: 62px;
            display: grid;
            place-items: center;
            border-radius: 14px;
            font-size: 30px;
            margin-right: 20px;
        }

        .banner h2 {
            font-size: 25px;
            color: #064a37;
        }

        .banner p {
            color: #60796e;
            font-size: 14px;
        }

        /* FOOD CARD */
        .food-card {
            background: white;
            padding: 28px;
            border-radius: 15px;
            box-shadow: 0 4px 18px rgba(0,0,0,.05);
        }

        .page-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 25px;
        }

        .heading-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .heading-icon {
            width: 58px;
            height: 58px;
            border-radius: 50%;
            background: #e1f5e8;
            color: #078448;
            display: grid;
            place-items: center;
            font-size: 27px;
        }

        .page-heading h1 {
            font-size: 25px;
            color: #064a37;
        }

        .page-heading p {
            font-size: 13px;
            color: #71847a;
            margin-top: 4px;
        }

        .add-button {
            display: inline-block;
            background: #078448;
            color: white;
            text-decoration: none;
            padding: 12px 21px;
            border-radius: 9px;
            font-weight: 600;
            font-size: 14px;
            transition: .3s;
        }

        .add-button:hover {
            background: #056b3a;
        }

        /* ALERTS */
        .success {
            background: #dcfce7;
            color: #166534;
            padding: 14px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 14px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        /* SEARCH */
        .search-area {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            padding: 18px;
            background: #eff8f3;
            border-radius: 11px;
            margin-bottom: 20px;
        }

        .search-area input,
        .search-area select {
            padding: 13px 15px;
            border: 1px solid #d1ded6;
            border-radius: 8px;
            background: white;
            font-size: 13px;
            outline: none;
        }

        .search-area input {
            flex: 1;
            min-width: 200px;
        }

        .search-area select {
            min-width: 180px;
        }

        .search-area input:focus,
        .search-area select:focus {
            border-color: #078448;
        }

        /* TABLE */
        .table-wrapper {
            overflow-x: auto;
            border: 1px solid #e3ece6;
            border-radius: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 720px;
        }

        th {
            background: #064432;
            color: white;
            text-align: left;
            padding: 17px 15px;
            font-size: 13px;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #e5ece7;
            font-size: 13px;
        }

        tbody tr:hover {
            background: #f5fbf7;
        }

        .food-name {
            font-weight: 600;
            color: #164b39;
        }

        .food-photo {
            width: 65px;
            height: 60px;
            object-fit: cover;
            border-radius: 9px;
            display: block;
        }

        .price {
            font-weight: 700;
            color: #087d43;
        }

        .status {
            display: inline-block;
            padding: 7px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
        }

        .available {
            background: #dcfce7;
            color: #15803d;
        }

        .unavailable {
            background: #fee2e2;
            color: #b91c1c;
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .edit-button,
        .delete-button {
            padding: 9px 13px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            background: white;
        }

        .edit-button {
            color: #078448;
            border: 1px solid #078448;
        }

        .edit-button:hover {
            background: #e8f7ed;
        }

        .delete-button {
            color: #dc2626;
            border: 1px solid #dc2626;
        }

        .delete-button:hover {
            background: #fff0f0;
        }

        .empty {
            text-align: center;
            padding: 35px;
            color: #71847a;
        }

        footer {
            text-align: center;
            padding: 25px;
            color: #71847a;
            font-size: 12px;
        }

        /* MOBILE */
        @media(max-width: 900px) {
            .sidebar {
                width: 210px;
            }

            .content {
                padding: 18px;
            }
        }

        @media(max-width: 650px) {
            .layout {
                display: block;
            }

            .sidebar {
                width: 100%;
                padding: 17px;
            }

            .brand {
                margin-bottom: 18px;
            }

            .sidebar-menu {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
            }

            .sidebar-bottom {
                display: none;
            }

            .top-header {
                height: 55px;
            }

            .content {
                padding: 13px;
            }

            .banner {
                padding: 20px;
                min-height: 110px;
            }

            .banner h2 {
                font-size: 18px;
            }

            .food-card {
                padding: 18px 12px;
            }

            .page-heading h1 {
                font-size: 21px;
            }
        }
    </style>
</head>

<body>

<div class="layout">

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div class="brand">
            🍽️ Canteen<br>
            <span>Ordering System</span>
        </div>

        <nav class="sidebar-menu">
            <a href="{{ route('admin.dashboard') }}">
                <span class="menu-icon">⌂</span>
                Dashboard
            </a>

            <a href="{{ route('admin.foods') }}" class="active">
                <span class="menu-icon">🍴</span>
                Manage Foods
            </a>

            <a href="{{ route('admin.users.index') }}">
                <span class="menu-icon">♟</span>
                Manage Users
            </a>

            <a href="{{ route('admin.orders') }}">
                <span class="menu-icon">🛒</span>
                View Orders
            </a>

            <a href="{{ route('admin.reports') }}">
                <span class="menu-icon">▥</span>
                Reports
            </a>
        </nav>

        <div class="sidebar-bottom">
            <div class="weather">
                <small>📍 Manila, Philippines</small>
                <h3>☁️ Weather</h3>
                <small>Check current weather on Dashboard</small>
            </div>

            <div class="admin-info">
                👤 {{ auth()->user()->name ?? 'Admin' }}
                <span>Administrator</span>
            </div>
        </div>

    </aside>

    <!-- MAIN CONTENT -->
    <main class="main-content">

        <div class="top-header">
            <div class="admin-label">
                👤 {{ auth()->user()->name ?? 'Admin' }}
            </div>
        </div>

        <div class="content">

            <!-- BANNER -->
            <section class="banner">
                <div class="banner-icon">🍴</div>
                <div>
                    <h2>Canteen Ordering System</h2>
                    <p>Good Food • Better Days</p>
                </div>
            </section>

            <!-- FOOD MANAGEMENT -->
            <section class="food-card">

                <div class="page-heading">
                    <div class="heading-left">
                        <div class="heading-icon">♨</div>
                        <div>
                            <h1>Manage Foods</h1>
                            <p>Add, update, and manage food items in the canteen menu.</p>
                        </div>
                    </div>

                    <a href="{{ route('admin.foods.create') }}" class="add-button">
                        ＋ Add Food
                    </a>
                </div>

                @if (session('success'))
                    <div class="success">
                        ✓ {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="error">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <!-- SEARCH AND FILTER -->
                <div class="search-area">
                    <input
                        type="text"
                        id="foodSearch"
                        placeholder="🔍 Search food name..."
                    >

                    <select id="availabilityFilter">
                        <option value="">All Availability</option>
                        <option value="available">Available</option>
                        <option value="unavailable">Unavailable</option>
                    </select>
                </div>

                <!-- FOOD TABLE -->
                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Food Name</th>
                                <th>Price</th>
                                <th>Availability</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody id="foodTable">
                            @forelse ($foods as $food)
                                <tr class="food-row">
                                    <td>{{ $food->id }}</td>

                                    <td>
                                        <img
                                            class="food-photo"
                                            src="https://images.unsplash.com/photo-1547592180-85f173990554?auto=format&fit=crop&w=200&q=80"
                                            alt="Food image"
                                            loading="lazy"
                                        >
                                    </td>

                                    <td class="food-name">
                                        {{ $food->name }}
                                    </td>

                                    <td class="price">
                                        ₱{{ number_format((float) $food->price, 2) }}
                                    </td>

                                    <td>
                                        @if ($food->availability === 'available')
                                            <span class="status available">
                                                ● Available
                                            </span>
                                        @else
                                            <span class="status unavailable">
                                                ● Unavailable
                                            </span>
                                        @endif
                                    </td>

                                    <td>
                                        <div class="actions">

                                            <a
                                                href="{{ route('admin.foods.edit', $food->id) }}"
                                                class="edit-button"
                                            >
                                                ✎ Edit
                                            </a>

                                            <form
                                                method="POST"
                                                action="{{ route('admin.foods.destroy', $food->id) }}"
                                                onsubmit="return confirm('Are you sure you want to delete this food?');"
                                            >
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="delete-button">
                                                    🗑 Delete
                                                </button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="empty">
                                        🍽️ No food items found.
                                        Click Add Food to add your first food item.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <p id="noResults" class="empty" style="display:none;">
                    No matching food items found.
                </p>

            </section>

        </div>

        <footer>
            © {{ date('Y') }} Canteen Ordering System. All rights reserved.
        </footer>

    </main>

</div>

<script>
    const searchInput = document.getElementById('foodSearch');
    const availabilityFilter = document.getElementById('availabilityFilter');
    const foodRows = document.querySelectorAll('.food-row');
    const noResults = document.getElementById('noResults');

    function filterFoods() {
        const searchValue = searchInput.value.toLowerCase().trim();
        const filterValue = availabilityFilter.value;

        let visibleCount = 0;

        foodRows.forEach(row => {
            const name = row.querySelector('.food-name').textContent.toLowerCase();
            const status = row.querySelector('.status');

            const availability = status.classList.contains('available')
                ? 'available'
                : 'unavailable';

            const matchesName = name.includes(searchValue);
            const matchesStatus = !filterValue || availability === filterValue;

            if (matchesName && matchesStatus) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });

        noResults.style.display = visibleCount === 0 && foodRows.length > 0
            ? 'block'
            : 'none';
    }

    searchInput.addEventListener('input', filterFoods);
    availabilityFilter.addEventListener('change', filterFoods);
</script>

</body>
</html>
