<x-guest-layout>

    <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12">
        <div class="mt-12 flex flex-col items-center">
            <h1 class="text-2xl xl:text-3xl font-extrabold">Регистрация</h1>
            <div class="w-full flex-1 mt-8">
                <div class="my-12 border-b text-center">
                    <div class="leading-none px-2 inline-block text-sm text-gray-300 tracking-wide font-medium bg-white transform translate-y-1/2">
                        Введите необходимые данные
                    </div>
                </div>
                <div class="mx-auto max-w-xs">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div>
                            <x-input-label for="name" :value="__('Введите свое имя')" />
                            <x-text-input id="name" placeholder="Имя" class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-2" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="login" :value="__('Введите свой логин')" />
                            <x-text-input id="login" placeholder="Логин" class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-2" type="text" name="login" :value="old('login')" required autofocus autocomplete="login" />
                            <x-input-error :messages="$errors->get('login')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Введите почту')" />
                            <x-text-input id="email" class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-2" type="email" placeholder="E-mail" name="email" :value="old('email')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Введите пароль')" />
                            <x-text-input id="password" placeholder="Пароль" class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-2"
                                          type="password"
                                          name="password"
                                          required autocomplete="current-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="password_confirmation" :value="__('Повторите пароль')" />

                            <x-text-input id="password_confirmation" class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-2"
                                            type="password"
                                            name="password_confirmation" required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                        <div class="flex justify-between items-center mt-4">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 dark:border-gray-700 focus:outline-none shadow-sm" name="remember">
                                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Запомнить меня') }}</span>
                            </label>
                                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-900 rounded-md focus:outline-none" href="{{ route('login') }}">
                                    {{ __('Есть аккаунт?') }}
                                </a>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="mt-5 tracking-wide font-semibold bg-[#464646] text-gray-100 w-full py-4 rounded-lg hover:bg-[#FF5E14] transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                                <svg class="w-6 h-6 -ml-2" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                                    <circle cx="8.5" cy="7" r="4" />
                                    <path d="M20 8v6M23 11h-6" />
                                </svg>
                                <span class="ml-3">Зарегистрироваться</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="flex-1 bg-indigo-100 text-center hidden lg:flex">
        <div class="m-12 xl:m-16 w-full bg-contain bg-center bg-no-repeat"
             style="background-image: url('https://storage.googleapis.com/devitary-image-host.appspot.com/15848031292911696601-undraw_designer_life_w96d.svg');">
        </div>
    </div>
</x-guest-layout>
