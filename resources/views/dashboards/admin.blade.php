<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard - Canteen Ordering System</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #eef2f7;
            color: #1f2937;
        }

        /* ================= SIDEBAR ================= */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 260px;
            height: 100vh;
            background: #132238;
            color: white;
            padding: 30px 20px;
            display: flex;
            flex-direction: column;
            z-index: 1000;
        }

        .logo {
            text-align: center;
            font-size: 27px;
            font-weight: bold;
            margin-bottom: 45px;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .menu a {
            color: white;
            text-decoration: none;
            padding: 15px 18px;
            border-radius: 10px;
            font-size: 17px;
            display: block;
            transition: 0.2s;
        }

        .menu a:hover {
            background: #24364f;
        }

        .menu a.active {
            background: #2563a8;
        }

        .logout {
            margin-top: auto;
        }

        .logout button {
            width: 100%;
            padding: 15px;
            background: #ef3027;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        .logout button:hover {
            background: #d9231b;
        }

        /* ================= MAIN ================= */

        .main {
            margin-left: 260px;
            padding: 35px;
            min-height: 100vh;
        }

        .top-header {
            margin-bottom: 30px;
        }

        .top-header h1 {
            margin: 0;
            font-size: 34px;
            color: #172033;
        }

        .top-header p {
            margin-top: 8px;
            color: #64748b;
            font-size: 17px;
        }

        /* ================= SUMMARY CARDS ================= */

        .summary {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .summary-card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.07);
            border-left: 5px solid #22c55e;
        }

        .summary-card:nth-child(2) {
            border-left-color: #3b82f6;
        }

        .summary-card:nth-child(3) {
            border-left-color: #f59e0b;
        }

        .summary-card:nth-child(4) {
            border-left-color: #ef4444;
        }

        .summary-card h3 {
            margin: 0 0 12px;
            color: #64748b;
            font-size: 16px;
        }

        .summary-card .number {
            font-size: 26px;
            font-weight: bold;
            color: #172033;
        }

        /* ================= ADMIN FUNCTIONS ================= */

        .admin-card {
            background: white;
            border-radius: 18px;
            padding: 30px;
            box-shadow: 0 4px 18px rgba(0,0,0,0.07);
            margin-bottom: 30px;
        }

        .admin-card h2 {
            margin-top: 0;
            color: #172033;
            font-size: 25px;
        }

        .admin-buttons {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            margin-top: 20px;
        }

        .admin-button {
            display: block;
            text-decoration: none;
            text-align: center;
            padding: 18px 10px;
            border-radius: 10px;
            background: #22c55e;
            color: white;
            font-weight: bold;
            transition: 0.2s;
        }

        .admin-button:hover {
            background: #15803d;
            transform: translateY(-2px);
        }

        /* ================= WEATHER ================= */

        .weather-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 4px 18px rgba(0,0,0,0.07);
        }

        .weather-title {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 25px;
        }

        .weather-title-icon {
            font-size: 34px;
        }

        .weather-title h2 {
            margin: 0;
            font-size: 27px;
            color: #172033;
        }

        .weather-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 15px;
        }

        .weather-item {
            background: #f4f7fb;
            border-radius: 12px;
            padding: 22px;
            min-height: 145px;
        }

        .weather-label {
            color: #64748b;
            font-weight: bold;
            font-size: 15px;
            margin-bottom: 15px;
        }

        .weather-icon {
            margin-right: 5px;
            font-size: 20px;
        }

        .weather-value {
            color: #172033;
            font-size: 21px;
            font-weight: bold;
            line-height: 1.3;
            word-break: break-word;
        }

        /* ================= ERROR ================= */

        .error {
            background: #fff7ed;
            color: #c2410c;
            padding: 20px;
            border-radius: 12px;
            border-left: 5px solid #f97316;
        }

        /* ================= MOBILE ================= */

        @media (max-width: 1100px) {

            .summary {
                grid-template-columns: repeat(2, 1fr);
            }

            .admin-buttons {
                grid-template-columns: repeat(2, 1fr);
            }

            .weather-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 700px) {

            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }

            .logo {
                margin-bottom: 20px;
            }

            .logout {
                margin-top: 20px;
            }

            .main {
                margin-left: 0;
                padding: 20px;
            }

            .summary {
                grid-template-columns: 1fr;
            }

            .admin-buttons {
                grid-template-columns: 1fr;
            }

            .weather-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <!-- ================= SIDEBAR ================= -->

    <aside class="sidebar">

        <div class="logo">
            CANTEEN ADMIN
        </div>

        <nav class="menu">

            <a href="{{ url('/admin/dashboard') }}" class="active">
                🏠 Dashboard
            </a>

            <a href="{{ route('admin.users.index') }}">
                👥 Manage Users
            </a>

            <a href="{{ route('admin.foods') }}">
                🍔 Manage Foods
            </a>

            <a href="{{ route('admin.orders') }}">
                📦 View Orders
            </a>

            <a href="{{ route('admin.reports') }}">
                📊 Reports
            </a>

        </nav>

        <div class="logout">

            <form method="POST" action="{{ route('logout') }}">

                @csrf

                <button type="submit">
                    🚪 Logout
                </button>

            </form>

        </div>

    </aside>


    <!-- ================= MAIN CONTENT ================= -->

    <main class="main">

        <!-- HEADER -->

        <div class="top-header">

            <h1>Welcome, Admin!</h1>

            <p>Canteen Ordering System</p>

        </div>


        <!-- ================= SUMMARY ================= -->

        <div class="summary">

            <div class="summary-card">

                <h3>👥 Users</h3>

                <div class="number">
                    Manage
                </div>

            </div>


            <div class="summary-card">

                <h3>🍔 Foods</h3>

                <div class="number">
                    Manage
                </div>

            </div>


            <div class="summary-card">

                <h3>📦 Orders</h3>

                <div class="number">
                    View
                </div>

            </div>


            <div class="summary-card">

                <h3>📊 Reports</h3>

                <div class="number">
                    View
                </div>

            </div>

        </div>


        <!-- ================= ADMIN FUNCTIONS ================= -->

        <div class="admin-card">

            <h2>Admin Dashboard</h2>

            <div class="admin-buttons">

                <a href="{{ route('admin.users.index') }}"
                   class="admin-button">
                    👥 Manage Users
                </a>

                <a href="{{ route('admin.foods') }}"
                   class="admin-button">
                    🍔 Manage Foods
                </a>

                <a href="{{ route('admin.orders') }}"
                   class="admin-button">
                    📦 View Orders
                </a>

                <a href="{{ route('admin.reports') }}"
                   class="admin-button">
                    📊 Reports
                </a>

            </div>

        </div>


        <!-- ================= WEATHER DASHBOARD ================= -->

        <div class="weather-card">

            <div class="weather-title">

                <span class="weather-title-icon" >
                    
                </span>

                <h2>
                    Current Weather Dashboard🌤️
                </h2>

            </div>


            @if ($weather)

                <div class="weather-grid">

                    <!-- LOCATION -->

                    <div class="weather-item">

                        <div class="weather-label">

                            <span class="weather-icon">
                                📍
                            </span>

                            Location

                        </div>

                        <div class="weather-value">

                            {{ $weather['city'] }}

                        </div>

                    </div>


                    <!-- TEMPERATURE -->

                    <div class="weather-item">

                        <div class="weather-label">

                            <span class="weather-icon">
                                🌡️
                            </span>

                            Temperature

                        </div>

                        <div class="weather-value">

                            {{ $weather['temperature'] }} °C

                        </div>

                    </div>


                    <!-- CONDITION -->

                    <div class="weather-item">

                        <div class="weather-label">

                            <span class="weather-icon">
                                ☁️
                            </span>

                            Condition

                        </div>

                        <div class="weather-value">

                            {{ ucfirst($weather['condition']) }}

                        </div>

                    </div>


                    <!-- HUMIDITY -->

                    <div class="weather-item">

                        <div class="weather-label">

                            <span class="weather-icon">
                                💧
                            </span>

                            Humidity

                        </div>

                        <div class="weather-value">

                            {{ $weather['humidity'] }}%

                        </div>

                    </div>


                    <!-- WIND SPEED -->

                    <div class="weather-item">

                        <div class="weather-label">

                            <span class="weather-icon">
                                💨
                            </span>

                            Wind Speed

                        </div>

                        <div class="weather-value">

                            {{ $weather['wind_speed'] }} m/s

                        </div>

                    </div>

                </div>


            @else

                <!-- WEATHER ERROR -->

                <div class="error">

                    <strong>
                        ⚠️ Weather Information Unavailable
                    </strong>

                    <br><br>

                    {{ $weatherError }}

                </div>

            @endif

        </div>

    </main>

</body>
</html>