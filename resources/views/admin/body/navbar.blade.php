<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Navbar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>




        .show {
            display: block;
        }

        .nav-menu {
            position: fixed;
            top: 0;
            right: 100%;
            width: 100%;
            height: 100%;
            z-index: 999;
            transform: translateX(-100%);
            transition: transform 0.4s ease;
        }







        .nav-menu.active {
            transform: translateX(0);
        }
        .hover-move {
            transition: transform 0.3s ease;
        }

        .flex:hover .hover-move {
            transform: translateY(-5px);
        }



    </style>


</head>
<body>

    <div class="px-6 bg-sky-200 flex items-center top-0 left-0 z-30">


        <div class="w-11">
            <img src="{{ asset('logo22.png') }}" alt="Logo">
        </div>

        <button id="menu-toggle" class="text-2xl focus:outline-none right-3 fixed text-white lg:hidden">☰</button>

        <div class="hidden lg:flex ml-auto" id="navLinks">
            <ul class="flex flex-col lg:flex-row items-center lg:justify-center">



                <li class="relative group shadow">
                    <div class="flex flex-col items-center justify-center w-24 h-16  bg-sky-200  group-hover:bg-gray-50">
                        <svg class="feather feather-user-plus w-6 h-6 text-gray-800 transition-transform duration-300 transform group-hover:-translate-y-1"
                        fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                            <circle cx="8.5" cy="7" r="4" />
                            <line x1="20" x2="20" y1="8" y2="14" />
                            <line x1="23" x2="17" y1="11" y2="11" />
                        </svg>
                        <a href="#" class="mr-2 text-gray-800 text-xs">社員管理</a>

                    </div>
                    <div class="absolute z-10 hidden bg-white divide-y divide-gray-100 shadow-lg group-hover:block">
                        <a href="{{ route('admin.role-permission.user.index') }}" class="block px-4 py-2 w-48 hover:bg-teal-500 hover:text-white">社員新規登録</a>
                        <a href="{{ route('admin.car.index') }}" class="block px-4 py-2 w-48 hover:bg-teal-500 hover:text-white">会社車管理</a>
                    </div>

                </li>

                <li class="relative group shadow">
                    <div class="flex flex-col items-center justify-center w-24 h-16  bg-sky-200  group-hover:bg-gray-50">

                        <!DOCTYPE svg PUBLIC '-//W3C//DTD SVG 1.1//EN' 'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'>

                        <svg height="8.4666mm" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd" version="1.1" viewBox="0 0 846.66 846.66" width="8.4666mm" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="text-gray-800 group-hover:-translate-y-1 transition-transform duration-300">

                            <defs>
                                <style type="text/css">
                                    <![CDATA[
                                        .fil0 {fill:gray-800;fill-rule:nonzero}
                                    ]]>
                                </style>
                            </defs>
                            <g id="Layer_x0020_1">
                                <path class="fil0" d="M246.64 243.41l155.89 0 0 -16.64c0,-80.13 65.47,-145.61 145.6,-145.61l187.2 0c11.49,0 20.8,9.32 20.8,20.81l0 621.92 62.72 0c27.37,0 27.37,41.61 0,41.61 -263.68,0 -527.36,0 -791.04,0 -27.36,0 -27.36,-41.61 0,-41.61l62.72 0 0 -324.38c0,-85.9 70.21,-156.1 156.11,-156.1zm344.13 480.48l0 -84.1 -22.89 0 0 84.1 22.89 0zm-64.5 0l0 -104.91c0,-11.49 9.32,-20.8 20.81,-20.8l64.5 0c11.49,0 20.8,9.31 20.8,20.8l0 104.91 82.14 0 0 -601.12 -166.39 0c-57.15,0 -104,46.85 -104,104l0 497.12 82.14 0zm-345.8 -240.14l58.26 0c11.48,0 20.8,9.31 20.8,20.8l0 62.42c0,11.49 -9.32,20.8 -20.8,20.8l-58.26 0c-11.49,0 -20.8,-9.31 -20.8,-20.8l0 -62.42c0,-11.49 9.31,-20.8 20.8,-20.8zm37.45 41.61l-16.64 0 0 20.8 16.64 0 0 -20.8zm78.02 -41.61l58.26 0c11.48,0 20.8,9.31 20.8,20.8l0 62.42c0,11.49 -9.32,20.8 -20.8,20.8l-58.26 0c-11.49,0 -20.8,-9.31 -20.8,-20.8l0 -62.42c0,-11.49 9.31,-20.8 20.8,-20.8zm37.45 41.61l-16.64 0 0 20.8 16.64 0 0 -20.8zm-152.92 -169.57l58.26 0c11.48,0 20.8,9.32 20.8,20.81l0 62.42c0,11.48 -9.32,20.8 -20.8,20.8l-58.26 0c-11.49,0 -20.8,-9.32 -20.8,-20.8l0 -62.42c0,-11.49 9.31,-20.81 20.8,-20.81zm37.45 41.61l-16.64 0 0 20.81 16.64 0 0 -20.81zm78.02 -41.61l58.26 0c11.48,0 20.8,9.32 20.8,20.81l0 62.42c0,11.48 -9.32,20.8 -20.8,20.8l-58.26 0c-11.49,0 -20.8,-9.32 -20.8,-20.8l0 -62.42c0,-11.49 9.31,-20.81 20.8,-20.81zm37.45 41.61l-16.64 0 0 20.81 16.64 0 0 -20.81zm157.51 -124.83c-27.36,0 -27.36,-41.61 0,-41.61l176.85 0c27.37,0 27.37,41.61 0,41.61l-176.85 0zm0 228.86c-27.36,0 -27.36,-41.61 0,-41.61l176.85 0c27.37,0 27.37,41.61 0,41.61l-176.85 0zm0 -114.43c-27.36,0 -27.36,-41.61 0,-41.61l176.85 0c27.37,0 27.37,41.61 0,41.61l-176.85 0zm-88.37 -101.98l-155.89 0c-62.93,0 -114.5,51.57 -114.5,114.49l0 324.38 270.39 0 0 -438.87z"/>
                            </g>
                        </svg>
                        <a href="#" class="mr-2 text-gray-800 text-xs">勤怠設定</a>
                    </div>
                    <div class="absolute z-10 hidden bg-white divide-y divide-gray-100 shadow-lg group-hover:block">
                        <a href="{{ route('admin.attendance-type-records.index') }}" class="block px-4 py-2 w-48 hover:bg-teal-500 hover:text-white">勤怠区分</a>
                        <a href="{{ route('admin.time_off.index') }}" class="block px-4 py-2 w-48 hover:bg-teal-500 hover:text-white">勤怠届</a>
                        <a href="{{ route('admin.corp-office.corps.index') }}" class="block px-4 py-2 w-48 hover:bg-teal-500 hover:text-white">会社</a>
                        <a href="{{ route('admin.corp-office.offices.index') }}" class="block px-4 py-2 w-48 hover:bg-teal-500 hover:text-white">所属</a>
                        <a href="{{ route('admin.division.index') }}" class="block px-4 py-2 w-48 hover:bg-teal-500 hover:text-white">課</a>
                    </div>
                </li>

                <li class="relative group shadow">
                    <div class="flex flex-col items-center justify-center w-24 h-16  bg-sky-200  group-hover:bg-gray-50">
                        {{-- <!DOCTYPE svg PUBLIC '-//W3C//DTD SVG 1.1//EN' 'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'> --}}
                        <svg enable-background="new 0 0 32 32" height="32px" id="Layer_1" version="1.1" viewBox="0 0 32 32" width="32px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="fill-gray-800 group-hover:-translate-y-1 transition-transform duration-300">
                            <g id="news">
                                <path clip-rule="evenodd" d="M29,0H7C5.343,0,4,1.342,4,3v2H3C1.343,5,0,6.342,0,8v20 c0,2.209,1.791,4,4,4h24c2.209,0,4-1.791,4-4V3C32,1.342,30.656,0,29,0z M30,28c0,1.102-0.898,2-2,2H4c-1.103,0-2-0.898-2-2V8 c0-0.552,0.448-1,1-1h1v20c0,0.553,0.447,1,1,1s1-0.447,1-1V3c0-0.552,0.448-1,1-1h22c0.551,0,1,0.448,1,1V28z" fill-rule="evenodd"/>
                                <path clip-rule="evenodd" d="M19.498,13.005h8c0.277,0,0.5-0.224,0.5-0.5s-0.223-0.5-0.5-0.5 h-8c-0.275,0-0.5,0.224-0.5,0.5S19.223,13.005,19.498,13.005z" fill-rule="evenodd"/>
                                <path clip-rule="evenodd" d="M19.498,10.005h8c0.277,0,0.5-0.224,0.5-0.5s-0.223-0.5-0.5-0.5 h-8c-0.275,0-0.5,0.224-0.5,0.5S19.223,10.005,19.498,10.005z" fill-rule="evenodd"/>
                                <path clip-rule="evenodd" d="M19.498,7.005h8c0.277,0,0.5-0.224,0.5-0.5s-0.223-0.5-0.5-0.5h-8 c-0.275,0-0.5,0.224-0.5,0.5S19.223,7.005,19.498,7.005z" fill-rule="evenodd"/>
                                <path clip-rule="evenodd" d="M16.5,27.004h-8c-0.276,0-0.5,0.225-0.5,0.5 c0,0.277,0.224,0.5,0.5,0.5h8c0.275,0,0.5-0.223,0.5-0.5C17,27.229,16.776,27.004,16.5,27.004z" fill-rule="evenodd"/>
                                <path clip-rule="evenodd" d="M16.5,24.004h-8c-0.276,0-0.5,0.225-0.5,0.5 c0,0.277,0.224,0.5,0.5,0.5h8c0.275,0,0.5-0.223,0.5-0.5C17,24.229,16.776,24.004,16.5,24.004z" fill-rule="evenodd"/>
                                <path clip-rule="evenodd" d="M16.5,21.004h-8c-0.276,0-0.5,0.225-0.5,0.5 c0,0.277,0.224,0.5,0.5,0.5h8c0.275,0,0.5-0.223,0.5-0.5C17,21.229,16.776,21.004,16.5,21.004z" fill-rule="evenodd"/>
                                <path clip-rule="evenodd" d="M27.5,27.004h-8c-0.277,0-0.5,0.225-0.5,0.5 c0,0.277,0.223,0.5,0.5,0.5h8c0.275,0,0.5-0.223,0.5-0.5C28,27.229,27.775,27.004,27.5,27.004z" fill-rule="evenodd"/>
                                <path clip-rule="evenodd" d="M27.5,24.004h-8c-0.277,0-0.5,0.225-0.5,0.5 c0,0.277,0.223,0.5,0.5,0.5h8c0.275,0,0.5-0.223,0.5-0.5C28,24.229,27.775,24.004,27.5,24.004z" fill-rule="evenodd"/>
                                <path clip-rule="evenodd" d="M27.5,21.004h-8c-0.277,0-0.5,0.225-0.5,0.5 c0,0.277,0.223,0.5,0.5,0.5h8c0.275,0,0.5-0.223,0.5-0.5C28,21.229,27.775,21.004,27.5,21.004z" fill-rule="evenodd"/>
                                <path clip-rule="evenodd" d="M27.5,15.004h-19c-0.276,0-0.5,0.224-0.5,0.5s0.224,0.5,0.5,0.5 h19c0.275,0,0.5-0.224,0.5-0.5S27.775,15.004,27.5,15.004z" fill-rule="evenodd"/>
                                <path clip-rule="evenodd" d="M27.5,18.004h-19c-0.276,0-0.5,0.225-0.5,0.5 c0,0.277,0.224,0.5,0.5,0.5h19c0.275,0,0.5-0.223,0.5-0.5C28,18.229,27.775,18.004,27.5,18.004z" fill-rule="evenodd"/>
                                <path clip-rule="evenodd" d="M9,13h7c0.553,0,1-0.447,1-1V5.004c0-0.553-0.447-1-1-1H9 c-0.553,0-1,0.447-1,1V12C8,12.552,8.447,13,9,13z M10,6h5v5h-5V6z" fill-rule="evenodd"/>
                            </g>
                        </svg>
                      <a href="#" class="mr-2 text-gray-800 text-xs">投稿オプション</a>
                    </div>

                    <div class="absolute z-10 hidden bg-white divide-y divide-gray-100 shadow-lg group-hover:block">

                      <a href="{{ route('tags.index') }}" class="block px-4 py-2 w-48 hover:bg-teal-500 hover:text-white">タグ</a>
                      <a href="{{ route('categories.index') }}" class="block px-4 py-2 w-48 hover:bg-teal-500 hover:text-white">カテゴリー</a>


                    </div>
                </li>

              <li class="relative group shadow">

                       <div class="flex flex-col items-center justify-center w-24 h-16  bg-sky-200  group-hover:bg-gray-50">
                        <!DOCTYPE svg  PUBLIC '-//W3C//DTD SVG 1.1//EN'  'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'>
                        <svg enable-background="new 0 0 32 32" height="32px" id="Layer_1" version="1.1" viewBox="0 0 32 32" width="32px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="fill-gray-800 group-hover:-translate-y-1 transition-transform duration-300">
                            <g id="key">
                                <path d="M23.004,0c-5.523,0-10,4.478-10,10c0,1.285,0.269,2.501,0.713,3.629L1.568,25.777   C1.217,26.129,1,26.463,1,27v3c0,1.07,0.929,2,2,2h3c0.536,0,0.875-0.215,1.226-0.564L8.661,30h2.343c1.104,0,2-0.896,2-2v-2h2   c1.104,0,2-0.896,2-2v-2.344l2.369-2.371C20.502,19.73,21.717,20,23.004,20c5.521,0,10-4.478,10-10S28.525,0,23.004,0z M23.004,18   c-1.48,0-2.852-0.43-4.041-1.132l-0.344,0.343l-1.125,1.125l-1.905,1.906c-0.375,0.375-0.586,0.883-0.586,1.414V24h-2   c-1.104,0-2,0.895-2,2v2H8.661c-0.53,0-1.039,0.211-1.414,0.586l-1.418,1.418L3.003,30L3,27.15l11.665-11.644   c0,0,0,0.001,0.001,0.002l1.469-1.469c-0.702-1.189-1.132-2.56-1.132-4.04c0-4.418,3.583-8,8-8s8,3.582,8,8S27.422,18,23.004,18z" fill-rule="evenodd"/>
                                <path d="M28.82,8.239c-1.121-1.562-2.486-2.925-4.055-4.054C24.51,4,24.18,3.954,23.883,4.058   c-1.389,0.489-2.34,1.439-2.826,2.828c-0.037,0.104-0.055,0.212-0.055,0.319c0,0.199,0.062,0.396,0.182,0.563   c1.125,1.564,2.488,2.928,4.053,4.053c0.256,0.184,0.584,0.231,0.881,0.128c1.391-0.486,2.342-1.438,2.83-2.828   c0.037-0.104,0.055-0.212,0.055-0.319C29.002,8.603,28.939,8.406,28.82,8.239z M25.82,11.01C24.342,9.947,23.055,8.66,22,7.217   c0.387-1.103,1.111-1.827,2.182-2.221c1.479,1.065,2.764,2.349,3.816,3.811C27.607,9.902,26.885,10.622,25.82,11.01z" fill-rule="evenodd"/></g>
                            </svg>
                      <a href="#" class="mr-2 text-gray-800 text-xs">役割オプション</a>
                    </div>

                    <div class="absolute z-10 hidden bg-white divide-y divide-gray-100 shadow-lg group-hover:block">
                      <a href="{{ route('admin.role-permission.role.index') }}" class="block px-4 py-2 w-48 hover:bg-teal-500 hover:text-white">権限</a>
                      <a href="{{ route('admin.role-permission.permission.index') }}" class="block px-4 py-2 w-48 hover:bg-teal-500 hover:text-white">許可</a>

                    </div>
                </li>




                <li class="relative group shadow">
                    <div class="flex flex-col items-center justify-center w-24 h-16  bg-sky-200  group-hover:bg-gray-50">

                        <!DOCTYPE svg  PUBLIC '-//W3C//DTD SVG 1.1//EN'  'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'>
                  <svg enable-background="new 0 0 32 32" height="32px" id="Layer_1" version="1.1" viewBox="0 0 32 32" width="32px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="fill-gray-800 group-hover:-translate-y-1 transition-transform duration-300">
                    <g id="search_1_">
                        <path d="M20,0.005c-6.627,0-12,5.373-12,12c0,2.026,0.507,3.933,1.395,5.608l-8.344,8.342l0.007,0.006   C0.406,26.602,0,27.49,0,28.477c0,1.949,1.58,3.529,3.529,3.529c0.985,0,1.874-0.406,2.515-1.059l-0.002-0.002l8.341-8.34   c1.676,0.891,3.586,1.4,5.617,1.4c6.627,0,12-5.373,12-12C32,5.378,26.627,0.005,20,0.005z M4.795,29.697   c-0.322,0.334-0.768,0.543-1.266,0.543c-0.975,0-1.765-0.789-1.765-1.764c0-0.498,0.21-0.943,0.543-1.266l-0.009-0.008l8.066-8.066   c0.705,0.951,1.545,1.791,2.494,2.498L4.795,29.697z M20,22.006c-5.522,0-10-4.479-10-10c0-5.522,4.478-10,10-10   c5.521,0,10,4.478,10,10C30,17.527,25.521,22.006,20,22.006z" fill-rule="evenodd"/>
                        <path d="M20,5.005c-3.867,0-7,3.134-7,7c0,0.276,0.224,0.5,0.5,0.5s0.5-0.224,0.5-0.5c0-3.313,2.686-6,6-6   c0.275,0,0.5-0.224,0.5-0.5S20.275,5.005,20,5.005z" fill-rule="evenodd"/></g>
                    </svg>


                      <a href="#" class="mr-2 text-gray-800 text-xs">計算オプション</a>
                    </div>

                    <div class="absolute z-10 hidden bg-white divide-y divide-gray-100 shadow-lg group-hover:block">
                        <a href="{{ route('admin.show') }}" class="block px-4 py-2 w-48 hover:bg-teal-500 hover:text-white">フィルター</a>
                        <a href="{{ route('admin.calculated') }}" class="block px-4 py-2 w-48 hover:bg-teal-500 hover:text-white">CSV</a>
                        <a href="{{ route('admin.calendar.index') }}" class="block px-4 py-2 w-48 hover:bg-teal-500 hover:text-white">calendar</a>
                        <a href="{{ route('admin.calendar12.show') }}" class="block px-4 py-2 w-48 hover:bg-teal-500 hover:text-white">year calendar</a>
                      </div>
                </li>


                <li class="relative group shadow">

                    <a href="{{ route('dashboard') }}" class="flex flex-col items-center justify-center w-24 h-16  bg-sky-200  group-hover:bg-gray-50">
                        <svg height="32" viewBox="0 0 48 48" width="32" xmlns="http://www.w3.org/2000/svg" class="fill-gray-800 group-hover:-translate-y-1 transition-transform duration-300">
                            <path d="M0 0h48v48h-48z" fill="none"/>
                            <path d="M44 11.44l-9.19-7.71-2.57 3.06 9.19 7.71 2.57-3.06zm-28.24-4.66l-2.57-3.06-9.19 7.71 2.57 3.06 9.19-7.71zm9.24 9.22h-3v12l9.49 5.71 1.51-2.47-8-4.74v-10.5zm-1.01-8c-9.95 0-17.99 8.06-17.99 18s8.04 18 17.99 18 18.01-8.06 18.01-18-8.06-18-18.01-18zm.01 32c-7.73 0-14-6.27-14-14s6.27-14 14-14 14 6.27 14 14-6.26 14-14 14z"/>
                        </svg>
                        <span class="mr-2 text-gray-800 text-xs">勤怠画面</span>
                    </a>
                </li>
                <li class="relative group shadow">

                    <a href="{{ route('admin.calculations.index') }}"  class="flex flex-col items-center justify-center w-24 h-16  bg-sky-200  group-hover:bg-gray-50">
                        <svg height="32" viewBox="0 0 48 48" width="32" xmlns="http://www.w3.org/2000/svg" class="fill-gray-800 group-hover:-translate-y-1 transition-transform duration-300">
                            <path d="M0 0h48v48h-48z" fill="none"/>
                            <path d="M44 11.44l-9.19-7.71-2.57 3.06 9.19 7.71 2.57-3.06zm-28.24-4.66l-2.57-3.06-9.19 7.71 2.57 3.06 9.19-7.71zm9.24 9.22h-3v12l9.49 5.71 1.51-2.47-8-4.74v-10.5zm-1.01-8c-9.95 0-17.99 8.06-17.99 18s8.04 18 17.99 18 18.01-8.06 18.01-18-8.06-18-18.01-18zm.01 32c-7.73 0-14-6.27-14-14s6.27-14 14-14 14 6.27 14 14-6.26 14-14 14z"/>
                        </svg>
                        <span class="mr-2 text-gray-800 text-xs">Calculations</span>
                    </a>
                </li>


                <li class="relative group shadow">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex flex-col items-center justify-center w-24 h-16  bg-sky-200  group-hover:bg-red-100">
                            <svg height="32" width="32" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="fill-gray-800 group-hover:-translate-y-1 transition-transform duration-300">
                                <g id="info"/>
                                <g id="icons">
                                    <g id="exit2">
                                        <path d="M12,10c1.1,0,2-0.9,2-2V4c0-1.1-0.9-2-2-2s-2,0.9-2,2v4C10,9.1,10.9,10,12,10z"/>
                                        <path d="M19.1,4.9L19.1,4.9c-0.3-0.3-0.6-0.4-1.1-0.4c-0.8,0-1.5,0.7-1.5,1.5c0,0.4,0.2,0.8,0.4,1.1l0,0c0,0,0,0,0,0c0,0,0,0,0,0c1.3,1.3,2,3,2,4.9c0,3.9-3.1,7-7,7s-7-3.1-7-7c0-1.9,0.8-3.7,2.1-4.9l0,0C7.3,6.8,7.5,6.4,7.5,6c0-0.8-0.7-1.5-1.5-1.5c-0.4,0-0.8,0.2-1.1,0.4l0,0C3.1,6.7,2,9.2,2,12c0,5.5,4.5,10,10,10s10-4.5,10-10C22,9.2,20.9,6.7,19.1,4.9z"/>
                                    </g>
                                </g>
                            </svg>
                            <span class="mr-2 text-gray-800 text-xs">{{ __('ログアウト') }}</span>
                        </button>
                    </form>
                </li>


            </ul>
        </div>
    </div>



    <div id="nav-menu" class="z-50 nav-menu fixed inset-0 bg-stone-800  flex justify-center items-center">
        <button id="close-menu" class="absolute top-4 right-4 text-3xl text-white focus:outline-none">✖</button>
        <ul class="flex flex-col items-center">
            <li class="w-full border-b border-gray-400">

                <button onclick="window.location.href='{{ route('admin.attendance-type-records.index') }}'" class="block text-md font text-white w-full py-2 px-4 hover:bg-gray-500">勤怠区分</button>
            </li>
            <li class="w-full border-b border-gray-400">
                <button onclick="window.location.href='{{ route('admin.time_off.index') }}'" class="block text-md font text-white w-full py-2 px-4 hover:bg-gray-500">勤怠届</button>
            </li>
            <li class="w-full border-b border-gray-400">
                <button onclick="window.location.href='{{ route('admin.corp-office.corps.index') }}'" class="block text-md font text-white w-full py-2 px-4 hover:bg-gray-500">会社</button>
            </li>
            <li class="w-full border-b border-gray-400">
                <button onclick="window.location.href='{{ route('admin.corp-office.offices.index') }}'" class="block text-md font text-white w-full py-2 px-4 hover:bg-gray-500">所属</button>
            </li>
            <li class="w-full border-b border-gray-400">
                <button onclick="window.location.href='{{ route('admin.role-permission.role.index') }}'" class="block text-md font text-white w-full py-2 px-4 hover:bg-gray-500">権限</button>
            </li>
            <li class="w-full border-b border-gray-400">
                <button onclick="window.location.href='{{ route('admin.role-permission.permission.index') }}'" class="block text-md font text-white w-full py-2 px-4 hover:bg-gray-500">許可</button>
            </li>
            <li class="w-full border-b border-gray-400">
                <button onclick="window.location.replace('{{ route('admin.show') }}')" class="block text-md font text-white w-full py-2 px-4 hover:bg-gray-500">フィルター</button>
            </li>
            <li class="w-full border-b border-gray-400">
                <button onclick="window.location.href='{{ route('admin.calculated') }}'" class="block text-md font text-white w-full py-2 px-4 hover:bg-gray-500">フィルターCSV</button>
            </li>


            <li class="w-full border-b border-gray-400">
                <button onclick="window.location.href='{{ route('admin.role-permission.user.index') }}'" class="block text-md font text-white w-full py-2 px-4 hover:bg-gray-500">新規登録</button>
            </li>

            <li class="w-full border-b border-gray-400">
                <button onclick="window.location.href='{{ route('admin.car.index') }}'" class="block text-md font text-white w-full py-2 px-4 hover:bg-gray-500">新規車</button>
            </li>
            <li class="w-full border-b border-gray-400">
            <button onclick="window.location.href='{{ route('dashboard') }}'" class="block text-md font text-white w-full py-2 px-4 hover:bg-gray-500">勤怠画面</button>
            </li>
            <li class="w-full border-b border-gray-400">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="block text-md font text-white w-full py-2 px-4 hover:bg-gray-500">{{ __('ログアウト') }}</button>
            </form>
            </li>
            <!-- ... (other navigation links) -->
        </ul>
    </div>


     <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.getElementById('menu-toggle');
            const navMenu = document.getElementById('nav-menu');
            const closeMenu = document.getElementById('close-menu');

            menuToggle.addEventListener('click', function() {
                navMenu.classList.add('active');
            });

            closeMenu.addEventListener('click', function() {
                navMenu.classList.remove('active');
            });
        });
    </script>
    <script>
        const navToggle = document.getElementById('navToggle');
        const dropdownMenu = document.getElementById('dropdownMenu');

        navToggle.addEventListener('click', () => {
            dropdownMenu.classList.toggle('show');
        });
    </script>

    <script>
        const dropdownMenus = document.querySelectorAll('.relative');

        dropdownMenus.forEach((menu) => {
            const dropdownToggle = menu.querySelector('.flex');
            const dropdownMenu = menu.querySelector('div:last-child');
            const arrow = menu.querySelector('svg');

            dropdownToggle.addEventListener('click', () => {
                dropdownMenu.classList.toggle('hidden');
                arrow.classList.toggle('rotate');
            });

            menu.addEventListener('mouseleave', () => {
                dropdownMenu.classList.add('hidden');
                arrow.classList.remove('rotate');
            });
        });

        window.addEventListener('click', (e) => {
            dropdownMenus.forEach((menu) => {
                const dropdownMenu = menu.querySelector('div:last-child');
                const target = e.target;

                if (!menu.contains(target)) {
                    dropdownMenu.classList.add('hidden');
                    menu.querySelector('svg').classList.remove('rotate');
                }
            });
        });
    </script>



</body>
</html>
