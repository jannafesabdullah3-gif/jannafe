<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Canteen Ordering System') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body {
                background: #050505;
                color: #ffffff;
            }

            .dark-page {
                min-height: 100vh;
                background: #050505;
                color: #ffffff;
            }

            .dark-header {
                background: #0b0b0b;
                border-bottom: 1px solid #262626;
            }

            .dark-content {
                background: #050505;
                color: #ffffff;
            }

            .dark-card {
                background: #0d0d0d;
                border: 1px solid #292929;
                color: #ffffff;
                border-radius: 12px;
            }

            .orange-button {
                background: #f59e0b;
                color: #000000;
                font-weight: 600;
                border-radius: 8px;
                padding: 10px 18px;
                transition: 0.2s;
            }

            .orange-button:hover {
                background: #fbbf24;
            }

            input,
            select,
            textarea {
                background: #111111 !important;
                color: #ffffff !important;
                border: 1px solid #333333 !important;
            }

            input:focus,
            select:focus,
            textarea:focus {
                border-color: #f59e0b !important;
                outline: none !important;
                box-shadow: 0 0 0 2px rgba(245, 158, 11, 0.15);
            }

            table {
                background: #0d0d0d;
                color: #ffffff;
            }

            th {
                background: #151515 !important;
                color: #f59e0b !important;
            }

            td {
                border-color: #292929 !important;
            }

            a {
                transition: 0.2s;
            }
        </style>
    </head>

    <body class="font-sans antialiased">
        <div class="min-h-screen dark-page">

            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="dark-header shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="dark-content">
                {{ $slot }}
            </main>

        </div>
    </body>
</html>