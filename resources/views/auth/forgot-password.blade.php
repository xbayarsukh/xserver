

<script src="https://cdn.tailwindcss.com"></script>

<div class="bg-sky-100 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white w-full max-w-screen-sm shadow-xl rounded-lg p-4 sm:p-8 md:p-12">

        <div class="flex justify-center items-center h-24 mb-8">
            <div class="w-14">
                <img src="{{ asset('logo22.png') }}" alt="Logo" class="w-full h-auto">
            </div>
        </div>
        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            {{ __('パスワード忘れの方は、会社社員メールアドレスを入力してください。もしくは本社に連絡してください。。') }}
        </div>
            <!-- Session Status -->

                {{-- <x-auth-session-status class="mb-4" :status="session('status')" /> --}}
                @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                    {{ session('error') }}
                </div>
            @endif



    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('メール')" />
            <x-text-input id="email" class="border border-bg-200" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">

              <x-button purpose="search" type="submit">
                {{ __('メールで送信') }}
              </x-button>

        </div>
    </form>
    </div>
</div>
