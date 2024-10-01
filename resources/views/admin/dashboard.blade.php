<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Keep your existing head content -->
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }
        #app-wrapper {
            transform: scale(0.9);
            transform-origin: top left;
            width: 111%;
            height: 111%;
            overflow-x: hidden;
            overflow-y: auto;
        }
    </style>
</head>
<body class="text-black font-inter bg-gray-100">
    <div id="app-wrapper">
        <main>
            <!-- navbar -->
            @include('admin.body.navbar')

            <!-- Content -->
            @yield('admin')

            <!-- End Content -->
        </main>
    </div>
</body>
</html>
