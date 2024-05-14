@php
    $itemCount = app('App\Http\Controllers\CartController')->cartItemCount(); // Получаем количество товаров в корзине
@endphp

<nav class="navbar flex justify-evenly items-center w-full bg-white mx-auto p-3" style="z-index: 999">
    <div>
        <a href="/">
            <img class="w-48" src="{{ Vite::asset('resources/inc/img/logo-dark.png') }}" alt="Logo">
        </a>
    </div>
    <div class="nav-links md:static absolute md:min-h-fit min-h-[60vh] left-0 top-[-100%] md:w-auto bg-white w-full flex items-center px-5">
        <ul class="flex md:flex-row flex-col md:items-center md:gap-[2vw] gap-8">
            <li><a class="{{ Request::is('/') ? 'nav-link--active' : '' }} hover:text-[#FF9261] text-[16px] text-black" href="/">Главная</a></li>
            <li><a class="{{ Request::is('services') ? 'nav-link--active' : '' }} hover:text-[#FF9261] text-[16px] text-black" href="/services">Наши услуги</a></li>
            <li><a class="{{ Request::is('news') ? 'nav-link--active' : '' }} hover:text-[#FF9261] text-[16px] text-black" href="/news">Новости и статьи</a></li>
            <li><a class="{{ Request::is('contacts') ? 'nav-link--active' : '' }} hover:text-[#FF9261] text-[16px] text-black" href="/contacts">Контакты</a></li>
        </ul>
    </div>
    @if(Auth::check())
        <div class="flex items-center text-center gap-6">
            <div class="relative pb-4">
                <div class="t-0 absolute left-3">
                    <p class="flex h-1 w-1 items-center justify-center rounded-full bg-red-500 p-3 text-xs text-white">{{ $itemCount }}</p>
                </div>
                <a href="/cart" class="hover:text-orange-500 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="file: mt-4 h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                    </svg>
                </a>
            </div>

            <div x-data="{show: false}" x-on:click.away="show = false" class="ml-3 relative">
                <div>
                    <button x-on:click="show = !show" type="button" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                        <span class="sr-only">Open user menu</span>
                        <div class="flex items-center hover:text-[#FF9261]">
                            <img src="/avatars/{{ Auth::user()->avatar }}" class="ml-1" style="width: 30px; border-radius: 10%"> <svg class="w-2.5 h-2.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                        </div>
                    </button>
                </div>
                <div x-show="show" class="origin-top-right text-left absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-30" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                    <div class="px-4 py-2 border-b-2 border-gray-100">
                        <span class="block text-sm text-gray-900 dark:text-white">{{ Auth::user()->name }} </span>
                        <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">Баланс: <b>{{ auth()->user()->balance }}₽</b></span>
                        <a href="/payments" class="underline text-[13px] text-gray-500">Пополнить баланс</a>
                    </div>
                    @if(Auth::user() && Auth::user()->group == 2)
                        <div class="py-2 text-sm text-gray-900 border-b-2 border-gray-100">
                            <a href="{{ route('admin.index') }}" class="block w-full px-4 py-2 hover:bg-gray-100 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Админ-панель</a>
                        </div>
                    @endif
                    <div class="py-2">
                        <a href="{{ route('profile.edit') }}" class="block w-full px-4 py-2 hover:bg-gray-100 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Профиль</a>
                        <a href="{{ route('profile.settings') }}" class="block w-full px-4 py-2 hover:bg-gray-100 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Настройки</a>
                    </div>
                    <div class="border-t-2 border-gray-100 py-2">
                        <form method="post" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" href="{{ route("logout") }}" class="block w-full text-left px-4 py-2 hover:bg-gray-100 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Выйти</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @else
        <a href="{{ route('login') }}" class="bg-[#464646] text-white px-12 py-3 rounded hover:bg-[#FF5E14] transition font-medium">Войти</a>
    @endif
        <ion-icon onclick="onToggleMenu(this)" name="menu" class="text-3xl text-black transition-all cursor-pointer md:hidden"></ion-icon>
</nav>

<script>
    const navLinks = document.querySelector('.nav-links')
    function onToggleMenu(e) {
        e.name = e.name === 'menu' ? 'close' : 'menu'
        navLinks.classList.toggle('!top-[16%]')
    }
</script>
