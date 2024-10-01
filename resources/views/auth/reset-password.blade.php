
        <script src="https://cdn.tailwindcss.com"></script>

        <div class="bg-sky-100 min-h-screen flex items-center justify-center p-4">
            <div class="bg-white w-full max-w-screen-sm shadow-xl rounded-lg p-4 sm:p-8 md:p-12">

                <div class="flex justify-center items-center h-24 mb-8">
                    <div class="w-14">
                        <img src="{{ asset('logo22.png') }}" alt="Logo" class="w-full h-auto">
                    </div>
                </div>

                <form method="POST" action="{{ route('password.store') }}" class="w-full">
                    @csrf




                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('メール')" />
                    <x-text-input id="email" class="border border-gray-300 block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" readonly/>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('新しいパスワード')" />
                    <x-text-input id="password" class="border border-gray-300 block mt-1 w-full" type="password" name="password" required autocomplete="new-password" aria-placeholder="新しいパスワード入力"/>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('パスワード(確認用)')" />

                    <x-text-input id="password_confirmation" class="border border-gray-300 block mt-1 w-full"
                                        type="password"
                                        name="password_confirmation" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    {{-- <x-primary-button>
                        {{ __('パスワードを再設定する') }}
                    </x-primary-button> --}}
                    <x-button purpose="search" type="submit">
                        パスワードを再設定する
                    </x-button>
                </div>
            </form>
            </div>
        </div>


