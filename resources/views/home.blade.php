<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taisei Holdings Co.,Ltd.</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            padding-top: 80px; /* Adjust this value based on your nav height */
        }
        .bg-white.shadow-md.fixed {
        z-index: 1000; /* Ensure this is higher than other elements */
        }

        #mobile-menu {
        z-index: 2000; /* Higher than the fixed nav */
    }

    #mobile-menu .flex {
        padding-top: 80px; /* Adjust this to match your nav height */
    }


        @media (max-width: 1023px) {
            #nav-menu {
                position: fixed;
                top: 20px; /* Adjust this value to match your nav height */
                left: 0;
                right: 0;
                background-color: white;
                padding: 1rem;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                z-index: 999; /* Just below the main nav */
            }

            #nav-menu a {
                display: block;
                padding: 0.5rem 0;
            }
        }



            /* Add this to ensure content doesn't overlap */
    .container {
        position: relative;
        z-index: 1;
    }
    </style>
</head>

<body class="bg-gray-100 pt-32">
    <canvas id="backgroundCanvas" class="fixed top-0 left-0 w-full h-full -z-10"></canvas>
    <div class="bg-white shadow-md z-50 fixed top-0 left-0 right-0 w-full">

        <nav class="container mx-auto px-4 py-2 flex flex-col sm:flex-row items-center justify-between">
            <div class="flex items-center mb-4 sm:mb-0">
                <img src="{{ asset('logo22.png') }}" alt="Taisei Holdings Logo" class="h-16 sm:h-20 mr-3 sm:mr-5">

                <span class="text-lg sm:text-xl font-serif font-medium text-sky-600">Taisei Holdings Co.,Ltd.</span>
            </div>

            <button id="menu-toggle"
            class="text-3xl focus:outline-none absolute right-4 top-4 text-black lg:hidden z-[1001]">☰</button>

            {{-- <div id="nav-menu" class="hidden lg:flex flex-col lg:flex-row items-center w-full lg:w-auto"> --}}
            <div class="hidden lg:flex space-x-10">

                <a href="{{ route('home') }}" class="text-gray-800 hover:text-gray-900 relative group">
                    <span>ホーム</span>
                    <span
                        class="absolute left-0 -bottom-2 w-full h-0.5 bg-blue-300 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></span>
                </a>
                <a href="{{ route('dashboard') }}" class="text-gray-800 hover:text-gray-900 relative group">
                    <span>社内システム</span>
                    <span
                        class="absolute left-0 -bottom-2 w-full h-0.5 bg-blue-300 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></span>
                </a>
                <a href="https://app.metalife.co.jp/spaces"
                      class="text-gray-800 hover:text-gray-900 relative group"
                      target="_blank"
                      rel="noopener noreferrer">
                    <span>メタライフ</span>
                    <span
                        class="absolute left-0 -bottom-2 w-full h-0.5 bg-blue-300 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></span>
                </a>
                <a href="{{ route('suggestion.index') }}" class="text-gray-800 hover:text-gray-900 relative group">
                    <span>投書箱</span>
                    <span
                        class="absolute left-0 -bottom-2 w-full h-0.5 bg-blue-300 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></span>
                </a>




                <form method="POST" action="{{ route('logout') }}" class="relative group">
                    @csrf
                    <button type="submit" class="text-gray-800 hover:text-gray-900 relative group">
                        <span>{{ __('ログアウト') }}</span>
                        <span
                            class="absolute left-0 -bottom-2 w-full h-0.5 bg-red-300 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></span>
                    </button>
                </form>

                <a href="{{ route('notifications.index') }}" class="relative flex items-center"> <!-- Modified this line -->
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                         d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                        </path>
                    </svg>
                    @if(auth()->user()->unreadNotifications->count() > 0)
                        <span class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full px-2 py-1 text-xs">
                            {{ auth()->user()->unreadNotifications->count() }}
                        </span>
                    @endif
                </a>
            </div>
        </nav>
    </div>
    <!--screen for mobile-->

    <div id="mobile-menu"
         class="fixed inset-0 w-full bg-black z-[2000] transform translate-x-full transition-transform duration-300 ease-in-out lg:hidden">
         <div class="flex flex-col h-full justify-start items-center pt-20">
            <button id="close-menu" class="absolute top-4 right-4 text-3xl text-white focus:outline-none">
                ✖
            </button>
            <a href="{{ route('home') }}" class="text-white text-m my-4 border-b border-gray-400">ホーム</a>
            <a href="{{ route('dashboard') }}" class="text-white text-m my-4 border-b border-gray-400">社内システム</a>
            <a href="https://app.metalife.co.jp/spaces"
                class="text-white text-m my-4 border-b border-gray-400"
                target="_blank"
                rel="noopener noreferrer">
                メタライフ
            </a>
            <a href="{{ route('suggestion.index') }}" class="text-white text-m my-4 border-b border-gray-400">投書箱</a>
            <form method="POST" action="{{ route('logout') }}" class="relative group">
                @csrf
                <button type="submit" class="text-white text-m my-4 border-b border-gray-400">
                    <span>{{ __('ログアウト') }}</span>
                </button>
            </form>

        </div>

    </div>


<!--notifications-->


        {{-- @foreach(auth()->user()->unreadNotifications as $notification)
            <div class="alert alert-info">
                {{ $notification->data['message'] }}
                <a href="{{ route('posts.show', $notification->data['post_id']) }}">View Post</a>
            </div>
            @php
                $notification->markAsRead();
            @endphp
        @endforeach
 --}}


    <div class="flex justify-center items-center p-4 sm:p-6">


                <div class="grid grid-cols-2 sm:grid-cols-3  lg:grid-cols-3 gap-4 sm:gap-6 lg:gap-10 w-full max-w-6xl">



                    <!--first card-->
                <div class="col-span-1 h-24 sm:h-28 lg:h-32 flex items-center justify-center text-white font-bold text-center rounded-lg cursor-pointer bg-teal-400 hover:bg-teal-500 transition-all"
                    onclick="window.location.href='{{ route('dashboard') }}'">
                   <svg class="w-10 h-10 sm:w-12 sm:h-12 lg:w-14 lg:h-14 fill-white transition-transform duration-300 transform group-hover:-translate-y-1 mr-3"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                       <path d="M0 0h48v48h-48z" fill="none" />
                       <path d="M44 11.44l-9.19-7.71-2.57 3.06 9.19 7.71 2.57-3.06zm-28.24-4.66l-2.57-3.06-9.19 7.71 2.57 3.06 9.19-7.71zm9.24 9.22h-3v12l9.49 5.71 1.51-2.47-8-4.74v-10.5zm-1.01-8c-9.95 0-17.99 8.06-17.99 18s8.04 18 17.99 18 18.01-8.06 18.01-18-8.06-18-18.01-18zm.01 32c-7.73 0-14-6.27-14-14s6.27-14 14-14 14 6.27 14 14-6.26 14-14 14z" />
                   </svg>
                   <span class="text-lg sm:text-xl lg:text-2xl">勤怠入力</span>
               </div>







            <div class="col-span-1 h-24 sm:h-28 lg:h-32 flex items-center justify-center text-white font-bold text-center rounded-lg cursor-pointer bg-yellow-500 hover:bg-yellow-600 transition-all"
                 onclick="window.location.href='{{ route('forms.index') }}'">
                <svg class="w-10 h-10 sm:w-12 sm:h-12 lg:w-14 lg:h-14  transition-transform duration-300 transform group-hover:-translate-y-1 mr-3"
                     fill="none" height="40" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                     viewBox="0 0 24 24" width="40" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                    <polyline points="14 2 14 8 20 8"/><line x1="16" x2="8" y1="13" y2="13"/><line x1="16" x2="8" y1="17" y2="17"/><polyline points="10 9 9 9 8 9"/>
                </svg>
                <span class="text-lg sm:text-xl lg:text-2xl">各種申請</span>
            </div>

            <div class="col-span-1 h-24 sm:h-28 lg:h-32 flex items-center justify-center text-white font-bold text-center rounded-lg cursor-pointer bg-red-500 hover:bg-red-600 transition-all"
                onclick="window.location.href='{{ route('myPage.index') }}'">


            <svg height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
            class="w-10 h-10 sm:w-12 sm:h-12 lg:w-14 lg:h-14 transition-transform duration-300 transform group-hover:-translate-y-1 mr-3"
                fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#fafafa"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M4 21C4 17.4735 6.60771 14.5561 10 14.0709M19.8726 15.2038C19.8044 15.2079 19.7357 15.21 19.6667 15.21C18.6422 15.21 17.7077 14.7524 17 14C16.2923 14.7524 15.3578 15.2099 14.3333 15.2099C14.2643 15.2099 14.1956 15.2078 14.1274 15.2037C14.0442 15.5853 14 15.9855 14 16.3979C14 18.6121 15.2748 20.4725 17 21C18.7252 20.4725 20 18.6121 20 16.3979C20 15.9855 19.9558 15.5853 19.8726 15.2038ZM15 7C15 9.20914 13.2091 11 11 11C8.79086 11 7 9.20914 7 7C7 4.79086 8.79086 3 11 3C13.2091 3 15 4.79086 15 7Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g>
                </svg>

                <span class="text-lg sm:text-xl lg:text-2xl">マイページ</span>

            </div>


            <div class="relative col-span-1">
                <div id="scheduleButton" class="h-24 sm:h-28 lg:h-32 flex items-center justify-center text-white font-bold text-center rounded-lg cursor-pointer bg-blue-500 hover:bg-blue-600 transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                        class="w-10 h-10 sm:w-12 sm:h-12 lg:w-14 lg:h-14 transition-transform duration-300 transform group-hover:-translate-y-1 mr-3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 2.994v2.25m10.5-2.25v2.25m-14.252 13.5V7.491a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v11.251m-18 0a2.25 2.25 0 0 0 2.25 2.25h13.5a2.25 2.25 0 0 0 2.25-2.25m-18 0v-7.5a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v7.5m-6.75-6h2.25m-9 2.25h4.5m.002-2.25h.005v.006H12v-.006Zm-.001 4.5h.006v.006h-.006v-.005Zm-2.25.001h.005v.006H9.75v-.006Zm-2.25 0h.005v.005h-.006v-.005Zm6.75-2.247h.005v.005h-.005v-.005Zm0 2.247h.006v.006h-.006v-.006Zm2.25-2.248h.006V15H16.5v-.005Z" />
                    </svg>
                    <span class="text-lg sm:text-xl lg:text-2xl">予定表</span>
                </div>

                <div id="buttonContainer" class="hidden absolute top-full left-0 right-0 mt-2 space-y-2 bg-white font-semibold p-2 rounded-lg shadow-lg z-10">
                    <button onclick="navigateTo('{{ route('room.index') }}')" class="w-full py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition duration-300">会議室</button>
                    <button onclick="navigateTo('{{ route('actionSchedule.index')}}')" class="w-full py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition duration-300">行動予定表</button>
                    <button onclick="navigateTo('{{ route('companySchedule.index')}}')" class="w-full py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition duration-300">会社予定表</button>
                </div>
            </div>


        <div class="col-span-1 h-24 sm:h-28 lg:h-32 flex items-center justify-center text-white font-bold text-center rounded-lg cursor-pointer bg-green-500 hover:bg-green-600 transition-all"
            onclick="window.location.href=''">

                <svg fill="#ffffff" height="60px"  version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                viewBox="0 0 600 600" xml:space="preserve" stroke="#ffffff" stroke-width="15.000"><g id="SVGRepo_bgCarrier" stroke-width=""
                class="w-10 h-10 sm:w-12 sm:h-12 lg:w-14 lg:h-14 transition-transform duration-300 transform group-hover:-translate-y-1 mr-3">
                </g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M157.662,102.614c-4.427,0-8.017,3.589-8.017,8.017c0,9.725-7.912,17.637-17.637,17.637s-17.637-7.912-17.637-17.637 s7.912-17.637,17.637-17.637c4.427,0,8.017-3.589,8.017-8.017s-3.589-8.017-8.017-8.017c-18.566,0-33.67,15.105-33.67,33.67 s15.105,33.67,33.67,33.67s33.67-15.105,33.67-33.67C165.679,106.203,162.089,102.614,157.662,102.614z"></path> </g> </g> <g> <g> <path d="M157.662,196.676c-4.427,0-8.017,3.589-8.017,8.017c0,9.725-7.912,17.637-17.637,17.637s-17.637-7.912-17.637-17.637 s7.912-17.637,17.637-17.637c4.427,0,8.017-3.589,8.017-8.017s-3.589-8.017-8.017-8.017c-18.566,0-33.67,15.105-33.67,33.67 s15.105,33.67,33.67,33.67s33.67-15.105,33.67-33.67C165.679,200.266,162.089,196.676,157.662,196.676z"></path> </g> </g> <g> <g> <path d="M251.724,213.779h-59.858c-4.427,0-8.017,3.589-8.017,8.017s3.589,8.017,8.017,8.017h59.858 c4.427,0,8.017-3.589,8.017-8.017S256.152,213.779,251.724,213.779z"></path> </g> </g> <g> <g> <path d="M251.724,179.574h-59.858c-4.427,0-8.017,3.589-8.017,8.017s3.589,8.017,8.017,8.017h59.858 c4.427,0,8.017-3.589,8.017-8.017S256.152,179.574,251.724,179.574z"></path> </g> </g> <g> <g> <path d="M234.622,307.841h-42.756c-4.427,0-8.017,3.589-8.017,8.017s3.589,8.017,8.017,8.017h42.756 c4.427,0,8.017-3.589,8.017-8.017S239.049,307.841,234.622,307.841z"></path> </g> </g> <g> <g> <path d="M251.724,273.637h-59.858c-4.427,0-8.017,3.589-8.017,8.017s3.589,8.017,8.017,8.017h59.858 c4.427,0,8.017-3.589,8.017-8.017S256.152,273.637,251.724,273.637z"></path> </g> </g> <g> <g> <path d="M328.685,119.716H191.866c-4.427,0-8.017,3.589-8.017,8.017s3.589,8.017,8.017,8.017h136.818 c4.427,0,8.017-3.589,8.017-8.017S333.112,119.716,328.685,119.716z"></path> </g> </g> <g> <g> <path d="M294.48,85.511H191.866c-4.427,0-8.017,3.589-8.017,8.017s3.589,8.017,8.017,8.017H294.48 c4.427,0,8.017-3.589,8.017-8.017S298.908,85.511,294.48,85.511z"></path> </g> </g> <g> <g> <path d="M157.662,290.739c-4.427,0-8.017,3.589-8.017,8.017c0,9.725-7.912,17.637-17.637,17.637s-17.637-7.912-17.637-17.637 s7.912-17.637,17.637-17.637c4.427,0,8.017-3.589,8.017-8.017s-3.589-8.017-8.017-8.017c-18.566,0-33.67,15.105-33.67,33.67 s15.105,33.67,33.67,33.67s33.67-15.105,33.67-33.67C165.679,294.328,162.089,290.739,157.662,290.739z"></path> </g> </g> <g> <g> <path d="M362.889,0H72.15C58.3,0,47.031,11.268,47.031,25.119v359.148c0,13.851,11.268,25.119,25.119,25.119h145.37 c4.427,0,8.017-3.589,8.017-8.017c0-4.427-3.589-8.017-8.017-8.017H72.15c-5.01,0-9.086-4.076-9.086-9.086V25.119 c0-5.01,4.076-9.086,9.086-9.086h290.739c5.01,0,9.086,4.076,9.086,9.086v265.087c0,4.427,3.589,8.017,8.017,8.017 c4.427,0,8.017-3.589,8.017-8.017V25.119C388.008,11.268,376.74,0,362.889,0z"></path> </g> </g> <g> <g> <path d="M438.578,325.094c-7.451-0.743-14.898,1.369-20.792,5.844c-4.695-7.878-12.701-13.467-21.964-14.395 c-7.453-0.742-14.899,1.37-20.792,5.844c-4.695-7.878-12.701-13.467-21.964-14.395c-5.69-0.568-11.372,0.528-16.365,3.069V208.969 c0-8.289-3.526-16.235-9.677-21.8c-6.145-5.56-14.426-8.274-22.721-7.444c-14.799,1.482-26.391,14.863-26.391,30.464v102.35 l-23.566,23.566c-12.523,12.523-17.578,30.291-13.521,47.531l17.891,76.037c7.249,30.811,34.418,52.329,66.07,52.329h72.307 c37.426,0,67.875-30.448,67.875-67.875v-88.567C464.969,339.957,453.377,326.576,438.578,325.094z M448.935,444.125 c0,28.585-23.256,51.841-51.841,51.841h-72.307c-24.175,0-44.927-16.435-50.464-39.968l-17.891-76.037 c-2.776-11.795,0.683-23.953,9.251-32.521l12.229-12.229v27.678c0,4.427,3.589,8.017,8.017,8.017s8.017-3.589,8.017-8.017V210.188 c0-7.465,5.251-13.839,11.956-14.509c3.851-0.387,7.534,0.815,10.366,3.379c2.797,2.531,4.401,6.144,4.401,9.912v141.094 c0,4.427,3.589,8.017,8.017,8.017s8.017-3.589,8.017-8.017v-12.827c0-3.768,1.603-7.381,4.401-9.912 c2.834-2.564,6.515-3.767,10.366-3.379c6.704,0.671,11.956,7.045,11.956,14.51v20.157c0,4.427,3.589,8.017,8.017,8.017 c4.427,0,8.017-3.589,8.017-8.017v-12.827c0-3.768,1.603-7.381,4.401-9.912c2.834-2.564,6.516-3.766,10.366-3.379 c6.704,0.671,11.956,7.045,11.956,14.51v20.158c0,4.427,3.589,8.017,8.017,8.017c4.427,0,8.017-3.589,8.017-8.017v-12.827 c0-3.768,1.603-7.381,4.401-9.912c2.834-2.563,6.513-3.767,10.366-3.378c6.704,0.67,11.956,7.044,11.956,14.509V444.125z"></path> </g> </g> </g></svg>
           <span class="text-lg sm:text-xl lg:text-2xl">社内注文</span>
         </div>

            <div class="col-span-1 h-24 sm:h-28 lg:h-32 flex items-center justify-center text-white font-bold text-center rounded-lg cursor-pointer bg-purple-500 hover:bg-purple-600 transition-all">
                <svg viewBox="0 0 24 24" height="40px" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#ffffff" stroke="#ffffff"
                class="w-10 h-10 sm:w-12 sm:h-12 lg:w-14 lg:h-14 transition-transform duration-300 transform group-hover:-translate-y-1 mr-3">

                <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="layer1"> <path d="M 15 3 L 15 17 L 20 17 L 20 3 L 15 3 z M 0 4 L 0 14 L 5 14 L 5 15 L 3 15 L 3 16 L 11 16 L 11 15 L 9 15 L 9 14 L 14 14 L 14 4 L 0 4 z M 16 4 L 19 4 L 19 6 L 16 6 L 16 4 z M 1 5 L 13 5 L 13 13 L 1 13 L 1 5 z M 16 7 L 19 7 L 19 16 L 16 16 L 16 7 z M 17 8 L 17 9 L 18 9 L 18 8 L 17 8 z M 6 14 L 8 14 L 8 15 L 6 15 L 6 14 z" style="fill:#ffffff; fill-opacity:1;  stroke-width:0.34;"></path> </g> </g>
                </svg>
                <span class="text-lg sm:text-xl lg:text-2xl">パソコン
                    <br>問い合わせ</span>
            </div>
        </div>
    </div>




{{-- <div class="grid grid-cols-2 sm:grid-cols-3  lg:grid-cols-3 gap-6 sm:gap-6 lg:gap-10 w-full max-w-6xl">

    <div class="col-span-1 h-32 sm:h-40 lg:h-48 relative overflow-hidden rounded-lg cursor-pointer group"
        onclick="window.location.href='{{ route('dashboard') }}'">
        <div class="absolute inset-0 bg-opacity-90 bg-cover bg-center transition-transform duration-300 group-hover:scale-110">
            <img src="{{ asset('tsag.jpg') }}" class="object-cover w-full h-full" alt="勤怠入力">
        </div>
        <div class="relative h-full flex items-center justify-center mt-8">
            <span class="text-sm sm:text-base font-bold text-black bg-white bg-opacity-70 px-2 py-1 rounded">勤怠入力</span>
        </div>
    </div>

    <div class="col-span-1 h-32 sm:h-40 lg:h-48 relative overflow-hidden rounded-lg cursor-pointer group"
        onclick="window.location.href='{{  route('forms.index') }}'">
        <div class="absolute inset-0 bg-opacity-90 bg-cover bg-center transition-transform duration-300 group-hover:scale-110">
            <img src="{{ asset('docu.jpg') }}" class="object-cover w-full h-full" alt="社内書式集">
       </div>
       <div class="relative h-full flex items-center justify-center mt-8">
           <span class="text-sm sm:text-base font-bold text-black bg-white bg-opacity-70 px-2 py-1 rounded">社内書式集</span>
       </div>
   </div>




        <div class="col-span-1 h-32 sm:h-40 lg:h-48 relative overflow-hidden rounded-lg cursor-pointer group"
            onclick="window.location.href='{{ route('actionSchedule.index') }}'">
           <div class="absolute inset-0  opacity-90 bg-cover bg-center transition-transform duration-300 group-hover:scale-110">
            <img src="{{ asset('truck.jpg') }}" class="object-cover w-full h-full" alt="行動予定表">


           </div>
           <div class="relative h-full flex items-center justify-center mt-8">
               <span class="text-sm sm:text-base font-bold text-black bg-white bg-opacity-70 px-2 py-1 rounded">行動予定表</span>
           </div>
       </div>

       <div class="col-span-1 h-32 sm:h-40 lg:h-48 relative overflow-hidden rounded-lg cursor-pointer group"
            onclick="window.location.href='{{ route('companySchedule.index') }}'">
           <div class="absolute inset-0 bg-gray-300 opacity-90 bg-cover bg-center transition-transform duration-300 group-hover:scale-110">
            <img src="{{ asset('calendar.jpg') }}" class="object-cover w-full h-full" alt="予定表">
           </div>
           <div class="relative h-full flex items-center justify-center mt-8">
               <span class="text-sm sm:text-base font-bold text-black bg-white bg-opacity-70 px-2 py-1 rounded">予定表</span>
           </div>
       </div>








            <div class="col-span-1 h-32 sm:h-40 lg:h-48 flex items-center justify-center text-white font-bold text-center rounded-lg cursor-pointer bg-green-300">
                <span class="text-sm sm:text-base">出張申請</span>
            </div>
            <div class="col-span-1 h-32 sm:h-40 lg:h-48 flex items-center justify-center text-white font-bold text-center rounded-lg cursor-pointer bg-stone-200">

                <span class="text-sm sm:text-base">FAQ</span>
            </div>
        </div>
</div> --}}

    <div class="items-center justify-center bg-gray-150 relative z-1">
        <div class="container mx-auto px-4 py-5 max-w-3xl">
            <div class="bg-white shadow-lg rounded-lg p-8">
                <h1 class="text-3xl font-bold mb-8 text-center text-gray-800">新着情報</h1>
                <div class="space-y-6">
                    @foreach ($posts as $post)
                        <div
                            class="flex flex-col sm:flex-row items-start group hover:bg-gray-50 p-3 rounded-md transition duration-150 ease-in-out">
                            <span
                                class="text-gray-400 font-normal text-sm mb-1 sm:mb-0 sm:mr-6 w-full sm:w-40 flex-shrink-0">
                                {{ $post->created_at->translatedFormat('Y年n月j日') }}
                            </span>
                            <a href="{{ route('posts.show', $post->id) }}"
                                class="text-gray-700 group-hover:text-black group-hover:underline">
                                {{ $post->title }}
                            </a>
                        </div>
                        @if (!$loop->last)
                            <hr class="border-gray-200">
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>


</body>
<script>
const canvas = document.getElementById('backgroundCanvas');
const ctx = canvas.getContext('2d');

canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

let nodes = [];
const connections = [];
let nodeCount;
let connectionDistance;

// Function to determine node count and connection distance based on screen size
function calculateParameters() {
    const minDimension = Math.min(canvas.width, canvas.height);
    nodeCount = Math.floor(minDimension / 20); // Adjust this divisor to change node density
    connectionDistance = minDimension / 5; // Adjust this divisor to change connection density
}

class Node {
    constructor() {
        this.x = Math.random() * canvas.width;
        this.y = Math.random() * canvas.height;
        this.size = Math.random() * 2 + 2;
        this.speedX = (Math.random() - 0.5) * 0.5;
        this.speedY = (Math.random() - 0.5) * 0.5;
        this.color = '#3498db';
    }

    update() {
        this.x += this.speedX;
        this.y += this.speedY;

        if (this.x < 0 || this.x > canvas.width) this.speedX *= -1;
        if (this.y < 0 || this.y > canvas.height) this.speedY *= -1;
    }

    draw() {
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
        ctx.fillStyle = this.color;
        ctx.fill();
    }
}

function init() {
    calculateParameters();
    nodes = [];
    for (let i = 0; i < nodeCount; i++) {
        nodes.push(new Node());
    }
}

function drawConnections() {
    ctx.strokeStyle = 'rgba(52, 152, 219, 0.1)';
    ctx.lineWidth = 1;

    for (let i = 0; i < nodes.length; i++) {
        for (let j = i + 1; j < nodes.length; j++) {
            const dx = nodes[i].x - nodes[j].x;
            const dy = nodes[i].y - nodes[j].y;
            const distance = Math.sqrt(dx * dx + dy * dy);

            if (distance < connectionDistance) {
                ctx.beginPath();
                ctx.moveTo(nodes[i].x, nodes[i].y);
                ctx.lineTo(nodes[j].x, nodes[j].y);
                ctx.stroke();
            }
        }
    }
}

function animate() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    drawConnections();

    nodes.forEach(node => {
        node.update();
        node.draw();
    });

    requestAnimationFrame(animate);
}

init();
animate();

window.addEventListener('resize', () => {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
    init();
});

    document.addEventListener('DOMContentLoaded', function() {
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        const closeMenu = document.getElementById('close-menu');

        menuToggle.addEventListener('click', function() {
            mobileMenu.classList.remove('translate-x-full');
        });
        closeMenu.addEventListener('click', function() {
            mobileMenu.classList.add('translate-x-full');
        });
    });

    const scheduleButton = document.getElementById('scheduleButton');
    const buttonContainer = document.getElementById('buttonContainer');

    scheduleButton.addEventListener('click', function() {
        buttonContainer.classList.toggle('hidden');
    });

    function navigateTo(route) {
        window.location.href = route;
    }
</script>

<style>

</style>

</html>
