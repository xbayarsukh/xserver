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







    <!-- Import Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])



    <!-- Ensure proper character encoding for Japanese characters -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <div class="container mx-auto"></div>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        <footer class="bg-sky-100 py-4">
            <div class="container mx-auto text-center">
                &copy; {{ date('Y') }} Taisei Holdings CO.,LTD.
            </div>
        </footer>
    </div>




</body>
</html>
<!--dood codiig ashiglasanaar niit delgetsee jijigrvvlne-->

{{--
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
    <!--Alphine JS -->




    <!-- Import Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])



    <!-- Ensure proper character encoding for Japanese characters -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <div class="container mx-auto"></div>
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }
        #app-wrapper {
            transform: scale(0.9);
            transform-origin: top left;
            width: 111.11%;
            min-height: 111.11%;
        }
        #scroll-container {
            height: 100vh;
            overflow-y: auto;
        }
    </style>
</head>
<body class="font-sans antialiased">
    <div id="scroll-container">
    <div id="app-wrapper">


    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</div>

        <footer class="bg-sky-100 py-4">
            <div class="container mx-auto text-center">
                &copy; {{ date('Y') }} Taisei Holdings CO.,LTD.
            </div>
        </footer>
    </div>




</body>
</html> --}}
