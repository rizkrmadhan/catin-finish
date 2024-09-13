<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Custom Styles -->
        <style>
            .bg-custom {
                position: relative;
                background-image: url('/images/catin.jpg');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                background-attachment: fixed;
                width: 100%;
                height: 100vh;
            }

            .overlay {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(255, 255, 255, 0.664); /* Set the transparency level */
                z-index: 1;
            }

            .content {
                position: relative;
                z-index: 2; /* Keep the content above the overlay */
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="bg-custom">
            <div class="overlay"></div>
            <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 content">
                <div>
                    <a class="w-20 h-20 fill-current text-black text-4xl"><strong>Sistem Pendataan Calon Pengantin</strong></a>
                </div>
                <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>
