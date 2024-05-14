<x-guest-layout>
    <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12 bg-gray-100">
        <div class="absolute">
            <a href="{{ route("login") }}">
                <ion-icon name="arrow-back" class="text-2xl hover:bg-white transition p-2 rounded-full"></ion-icon>
            </a>
        </div>
        <div class="mt-12 flex flex-col items-center">
            <h1 class="text-2xl xl:text-3xl font-extrabold">Забыли пароль?</h1>
            <div class="w-full flex-1 mt-8">
                <div class="flex flex-col items-center">
                </div>
                <div class="my-12 border-b text-center">
                    <div class="leading-none px-2 inline-block text-sm text-black tracking-wide bg-gray-100 font-medium transform translate-y-1/2">
                        Введите данные
                    </div>
                </div>
                <div class="mx-auto max-w-xs">
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div>
                            <x-input-label for="email" :value="__('Введите почту')" />
                            <x-text-input id="email" class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-2" type="email" placeholder="E-mail" name="email" :value="old('email')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <x-auth-session-status class="mb-4" :status="session('status')" />
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="mt-5 tracking-wide font-semibold bg-[#464646] text-gray-100 w-full py-4 rounded-lg hover:bg-[#FF5E14] transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                                <span class="ml-3">Восстановить доступ</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="flex-1 text-center justify-center hidden lg:flex">
        <div class="m-12 xl:m-16 w-full bg-contain bg-center bg-no-repeat"
             style="background-image: url({{ Vite::asset('resources/inc/img/3293465.jpg') }});">
        </div>
    </div>
</x-guest-layout>
