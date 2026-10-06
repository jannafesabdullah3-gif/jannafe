<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\ConnectionException;

class AdminController extends Controller
{
    public function index()
    {
        $city = 'Arakan';
        $weather = null;
        $weatherError = null;

        try {
            $apiKey = config('services.openweather.key');

            // Check kung may naka-configure na API key
            if (empty($apiKey)) {
                $weatherError = 'Weather API key is not configured.';
            } else {
                // Outbound HTTP request gamit ang Laravel HTTP Client (na may 5-second timeout)
                $response = Http::timeout(5)->get('https://api.openweathermap.org/data/2.5/weather', [
                    'q' => $city,
                    'appid' => $apiKey,
                    'units' => 'metric',
                ]);

                // Check kung nag-fail ang API request
                if ($response->failed()) {
                    $status = $response->status();
                    if ($status == 401) {
                        $weatherError = 'Invalid or inactive Weather API key.';
                    } elseif ($status == 404) {
                        $weatherError = 'Weather location was not found.';
                    } elseif ($status >= 500) {
                        $weatherError = 'Weather service is currently unavailable.';
                    } else {
                        $weatherError = 'Unable to retrieve weather information. API Error: ' . $status;
                    }
                } else {
                    $data = $response->json();

                    // Validation ng JSON data kung kumpleto
                    if (
                        !isset($data['name']) ||
                        !isset($data['main']['temp']) ||
                        !isset($data['weather'][0]['description']) ||
                        !isset($data['main']['humidity']) ||
                        !isset($data['wind']['speed'])
                    ) {
                        $weatherError = 'Weather information is unavailable.';
                    } else {
                        // JSON Data Mapping
                        $weather = [
                            'city' => $data['name'],
                            'temperature' => $data['main']['temp'],
                            'condition' => $data['weather'][0]['description'],
                            'humidity' => $data['main']['humidity'],
                            'wind_speed' => $data['wind']['speed'],
                        ];
                    }
                }
            }
        } catch (ConnectionException $e) {
            // Timeout o Connection failure handling
            $weatherError = 'Connection to the weather service failed. Please try again later.';
        } catch (\Throwable $e) {
            // Catch-all para sa iba pang unexpected errors
            $weatherError = 'Weather service is currently unavailable. Please try again later.';
        }

        // I-pass ang weather data at error message papunta sa view
        return view('admin.dashboard', compact('weather', 'weatherError'));
    }
}