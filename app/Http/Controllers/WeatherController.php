<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function index()
    {
        $city = 'kidapawan';

        try {

            $apiKey = config('services.openweather.key');

            // Check API key
            if (empty($apiKey)) {
                return view('dashboards.admin', [
                    'weather' => null,
                    'weatherError' => 'Weather API key is not configured.'
                ]);
            }

            // Laravel HTTP Client
            $response = Http::timeout(5)
                ->get(
                    'https://api.openweathermap.org/data/2.5/weather',
                    [
                        'q' => $city,
                        'appid' => $apiKey,
                        'units' => 'metric',
                    ]
                );

            // API error
            if ($response->failed()) {

                $status = $response->status();

                if ($status == 401) {
                    $message = 'Invalid or inactive Weather API key.';
                } elseif ($status == 404) {
                    $message = 'Weather location was not found.';
                } elseif ($status >= 500) {
                    $message = 'Weather service is currently unavailable.';
                } else {
                    $message = 'Unable to retrieve weather information. API Error: ' . $status;
                }

                return view('dashboards.admin', [
                    'weather' => null,
                    'weatherError' => $message
                ]);
            }

            // Convert JSON response
            $data = $response->json();

            // Validate JSON data
            if (
                !isset($data['name']) ||
                !isset($data['main']['temp']) ||
                !isset($data['weather'][0]['description']) ||
                !isset($data['main']['humidity']) ||
                !isset($data['wind']['speed'])
            ) {
                return view('dashboards.admin', [
                    'weather' => null,
                    'weatherError' => 'Weather information is unavailable.'
                ]);
            }

            // JSON DATA MAPPING
            $weather = [
                'city' => $data['name'],
                'temperature' => $data['main']['temp'],
                'condition' => $data['weather'][0]['description'],
                'humidity' => $data['main']['humidity'],
                'wind_speed' => $data['wind']['speed'],
            ];

            return view('dashboards.admin', [
                'weather' => $weather,
                'weatherError' => null
            ]);

        } catch (\Illuminate\Http\Client\ConnectionException $e) {

            return view('dashboards.admin', [
                'weather' => null,
                'weatherError' => 'Connection to the weather service failed. Please try again later.'
            ]);

        } catch (\Throwable $e) {

            return view('dashboards.admin', [
                'weather' => null,
                'weatherError' => 'Weather service is currently unavailable. Please try again later.'
            ]);
        }
    }
}