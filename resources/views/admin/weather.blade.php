<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Weather Dashboard</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 700px;
            margin: auto;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        .weather-card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .weather-item {
            margin: 15px 0;
            font-size: 18px;
        }

        .weather-item strong {
            display: inline-block;
            width: 180px;
        }

        .error {
            background: #ffe0e0;
            color: #b00000;
            padding: 15px;
            border-radius: 10px;
        }

        .back {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 18px;
            background: #333;
            color: white;
            text-decoration: none;
            border-radius: 8px;
        }

        .back:hover {
            background: #555;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>🌤️ Weather Dashboard</h1>

    @if ($error)

        <div class="error">
            {{ $error }}
        </div>

    @elseif ($weather)

        <div class="weather-card">

            <div class="weather-item">
                <strong>📍 City:</strong>
                {{ $weather['name'] }}
            </div>

            <div class="weather-item">
                <strong>🌡️ Temperature:</strong>
                {{ $weather['main']['temp'] }} °C
            </div>

            <div class="weather-item">
                <strong>☁️ Weather:</strong>
                {{ $weather['weather'][0]['description'] }}
            </div>

            <div class="weather-item">
                <strong>💧 Humidity:</strong>
                {{ $weather['main']['humidity'] }}%
            </div>

            <div class="weather-item">
                <strong>💨 Wind Speed:</strong>
                {{ $weather['wind']['speed'] }} m/s
            </div>

        </div>

    @endif

    <a href="{{ route('admin.dashboard') }}" class="back">
        ← Back to Admin Dashboard
    </a>

</div>

</body>
</html>