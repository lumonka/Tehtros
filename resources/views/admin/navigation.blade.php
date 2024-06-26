<nav class="flex flex-col bg-gray-200 dark:bg-gray-900 w-72 px-12 pt-4 pb-6">
    <div class="flex flex-row border-b items-center justify-between pb-2">
                <span class="text-lg font-semibold capitalize dark:text-gray-300">
				<a href="/" class="text-2xl hover:text-[#FF9261] transition">Техтрос</a>
			</span>
        <span class="relative ">
				<a class="hover:text-green-500 dark-hover:text-green-300text-gray-600 dark:text-gray-300" href="inbox/">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                         stroke-linecap="round" stroke-linejoin="round">
						<path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
						<path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
					</svg>
				</a>
				<div
                    class="absolute w-2 h-2 rounded-full bg-green-500dark-hover:bg-green-300 right-0 mb-5 bottom-0"></div>
			</span>
    </div>
    <div class="mt-8">
        @foreach($userAdmin as $user)
            <img class="h-12 w-12 rounded-full object-cover"
                 src="https://pic.rutubelist.ru/user/2d/08/2d088cd238485842060c392a83d78238.jpg"
                 alt="enoshima profile"/>
            <h2 class="mt-4 text-xl flex flex-col dark:text-gray-300 font-extrabold capitalize">
                {{ $user->name }}
            </h2>
            <span class="text-sm dark:text-gray-300">
                            @if(Auth::user()->group == 2)
                    <span class="font-semibold text-red-600 dark:text-green-300">Администратор</span>
                @endif
			        </span>
        @endforeach
    </div>
    <button
        class="mt-8 w-full flex items-center justify-between py-3 px-4 hover:bg-orange-500 transition text-white dark:text-gray-200 bg-orange-400 dark:bg-green-500 rounded-lg shadow">
        <span>Добавить</span>
        <svg class="h-5 w-5 fill-current" viewBox="0 0 24 24">
            <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"></path>
        </svg>
    </button>
    <ul class="mt-2 text-gray-600">
        <li class="{{ Request::is('admin') ? 'rounded-lg shadow bg-white' : '' }} mt-8 py-2 px-2 rounded-lg hover:translate-x-0.5 transition hover:rounded-lg hover:shadow hover:bg-white">
            <a href="{{ route('admin.index') }}" class="flex">
                <svg class="fill-current h-5 w-5 dark:text-gray-300" viewBox="0 0 24 24">
                    <path
                        d="M16 20h4v-4h-4m0-2h4v-4h-4m-6-2h4V4h-4m6
							4h4V4h-4m-6 10h4v-4h-4m-6 4h4v-4H4m0 10h4v-4H4m6
							4h4v-4h-4M4 8h4V4H4v4z"></path>
                </svg>
                <span class="ml-2 capitalize font-medium text-black dark:text-gray-300">Главная</span>
            </a>
        </li>
        <li class="{{ Request::is('admin/news') ? 'rounded-lg shadow bg-white' : '' }} mt-6 py-2 px-2 rounded-lg hover:translate-x-0.5 transition hover:rounded-lg hover:shadow hover:bg-white">
            <a href="/admin/news" class="flex">
                <svg class="fill-current h-5 w-5 dark:text-gray-300" viewBox="0 0 24 24">
                    <path d="M19 19H5V8h14m-3-7v2H8V1H6v2H5c-1.11 0-2 .89-2 2v14a2 2 0 002 2h14a2 2 0 002-2V5a2 2 0 00-2-2h-1V1m-1 11h-5v5h5v-5z"></path>
                </svg>
                <span class="ml-2 capitalize font-medium text-black dark:text-gray-300">Новости</span>
            </a>
        </li>
        <li class="{{ Request::is('admin/services') ? 'rounded-lg shadow bg-white' : '' }} mt-6 py-2 px-2 rounded-lg hover:translate-x-0.5 transition hover:rounded-lg hover:shadow hover:bg-white">
            <a href="/admin/services" class="flex">
                <svg class="fill-current h-5 w-5 dark:text-gray-300" viewBox="0 0 24 24">
                    <path d="M19 19H5V8h14m-3-7v2H8V1H6v2H5c-1.11 0-2 .89-2 2v14a2 2 0 002 2h14a2 2 0 002-2V5a2 2 0 00-2-2h-1V1m-1 11h-5v5h5v-5z"></path>
                </svg>
                <span class="ml-2 capitalize font-medium text-black dark:text-gray-300">Товары</span>
            </a>
        </li>
        <li class="{{ Request::is('admin/orders') ? 'rounded-lg shadow bg-white' : '' }} mt-6 py-2 px-2 rounded-lg hover:translate-x-0.5 transition hover:rounded-lg hover:shadow hover:bg-white">
            <a href="/admin/orders" class="flex">
                <svg class="fill-current h-5 w-5 dark:text-gray-300" viewBox="0 0 24 24">
                    <path d="M12 13H7v5h5v2H5V10h2v1h5v2M8 4v2H4V4h4m2-2H2v6h8V2m10 9v2h-4v-2h4m2-2h-8v6h8V9m-2 9v2h-4v-2h4m2-2h-8v6h8v-6z"></path>
                </svg>
                <span class="ml-2 capitalize font-medium text-black dark:text-gray-300">Заказы</span>
            </a>
        </li>
        <li class="mt-6 py-2 px-2 rounded-lg hover:translate-x-0.5 transition hover:rounded-lg hover:shadow hover:bg-white">
            <a href="#home" class="flex">
                <svg class="fill-current h-5 w-5 dark:text-gray-300" viewBox="0 0 24 24">
                    <path d="M12 4a4 4 0 014 4 4 4 0 01-4 4 4 4 0 01-4-4 4 4 0 014-4m0 10c4.42 0 8 1.79 8 4v2H4v-2c0-2.21 3.58-4 8-4z"></path>
                </svg>
                <span class="ml-2 capitalize font-medium text-black dark:text-gray-300">Пользователи</span>
            </a>
        </li>
        <li class="mt-6 py-2 px-2 rounded-lg hover:translate-x-0.5 transition hover:rounded-lg hover:shadow hover:bg-white">
            <a href="#home" class="flex">
                <svg class="fill-current h-5 w-5 dark:text-gray-300" viewBox="0 0 24 24">
                    <path d="M12 4a4 4 0 014 4 4 4 0 01-4 4 4 4 0 01-4-4 4 4 0 014-4m0 10c4.42 0 8 1.79 8 4v2H4v-2c0-2.21 3.58-4 8-4z"></path>
                </svg>
                <span class="ml-2 capitalize font-medium text-black dark:text-gray-300">Группы</span>
            </a>
        </li>
    </ul>
    <div class="mt-auto flex items-center text-red-700 dark:text-red-400">
        <a href="#home" class="flex items-center">
            <svg class="fill-current h-5 w-5" viewBox="0 0 24 24">
                <path d="M16 17v-3H9v-4h7V7l5 5-5 5M14 2a2 2 0 012 2v2h-2V4H5v16h9v-2h2v2a2 2 0 01-2 2H5a2 2 0 01-2-2V4a2 2 0 012-2h9z"></path>
            </svg>
            <a href="/" class="ml-2 capitalize font-medium">Выход</a>
        </a>
    </div>
</nav>
