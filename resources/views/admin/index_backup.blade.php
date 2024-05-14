@extends('layouts.admin')
@section('title')
    {{ 'Техтрос - Админ-панель' }}
@endsection
@section('content')
    <!-- component -->
        <section class="h-screen flex-1 flex bg-gray-100 dark:bg-gray-700 transition duration-500 ease-in-out overflow-y-auto">
            <div class="mx-10 my-2 w-full">
                <nav class="flex flex-row justify-between border-b dark:border-gray-600 dark:text-gray-400 transition duration-500 ease-in-out">
                    <div class="flex">
                        <a href="users-dashboard/" class="py-2 block text-green-500 border-green-500 dark:text-green-200 dark:border-green-200 focus:outline-none border-b-2 font-medium capitalize transition duration-500 ease-in-out">users
                        </a>
                        <button class="ml-6 py-2 block border-b-2 border-transparent focus:outline-none font-medium capitalize text-center focus:text-green-500 focus:border-green-500 dark-focus:text-green-200 dark-focus:border-green-200 transition duration-500 ease-in-out">role
                        </button>
                        <button class="ml-6 py-2 block border-b-2 border-transparent focus:outline-none font-medium capitalize text-center focus:text-green-500 focus:border-green-500 dark-focus:text-green-200 dark-focus:border-green-200 transition duration-500 ease-in-out">access rights
                        </button>
                    </div>
                    <div class="flex items-center select-none">
					<span class="hover:text-green-500 dark-hover:text-green-300 cursor-pointer mr-3 transition duration-500 ease-in-out">
						<svg viewBox="0 0 512 512" class="h-5 w-5 fill-current">
							<path d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
						</svg>
					</span>
                        <input class="w-full bg-transparent border-none focus:outline-none" placeholder="Search"/>
                    </div>
                </nav>
                <h2 class="my-4 text-4xl font-semibold dark:text-gray-400">User list</h2>
{{--                <div class="pb-2 flex items-center justify-between text-gray-600 dark:text-gray-400 border-b dark:border-gray-600">--}}
{{--                    <div>--}}
{{--					<span>--}}
{{--						<span class="text-green-500 dark:text-green-200">431</span>users;</span>--}}
{{--                        <span>--}}
{{--						<span class="text-green-500 dark:text-green-200">22</span>--}}
{{--						projects;--}}
{{--					</span>--}}
{{--                        <span>--}}
{{--						<span class="text-green-500 dark:text-green-200">--}}
{{--							33--}}
{{--						</span>--}}
{{--						roles--}}
{{--					</span>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--					<span class="capitalize">--}}
{{--						project--}}
{{--						<span--}}
{{--                            class="text-green-500 dark:text-green-200--}}
{{--							cursor-pointer">--}}
{{--							all--}}
{{--						</span>--}}
{{--					</span>--}}
{{--                        <span class="capitalize ml-12">--}}
{{--						date added--}}
{{--						<span--}}
{{--                            class="text-green-500 dark:text-green-200--}}
{{--							cursor-pointer">--}}
{{--							all time--}}
{{--						</span>--}}
{{--					</span>--}}
{{--                        <span class="capitalize ml-12">--}}
{{--						role--}}
{{--						<span--}}
{{--                            class="text-green-500 dark:text-green-200--}}
{{--							cursor-pointer">--}}
{{--							all--}}
{{--						</span>--}}
{{--					</span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div--}}
{{--                    class="mt-6 flex justify-between text-gray-600 dark:text-gray-400">--}}
{{--                    <div class="ml-10 pl-2 flex capitalize">--}}
{{--                        <span class="ml-8 flex items-center">--}}
{{--						name--}}
{{--						<svg--}}
{{--                            class="ml-1 h-5 w-5 fill-current text-green-500--}}
{{--							dark:text-green-200"--}}
{{--                            viewBox="0 0 24 24">--}}
{{--							<path--}}
{{--                                d="M18 21l-4-4h3V7h-3l4-4 4 4h-3v10h3M2--}}
{{--								19v-2h10v2M2 13v-2h7v2M2 7V5h4v2H2z"></path>--}}
{{--						</svg>--}}
{{--					</span>--}}
{{--                        <span class="ml-24 flex items-center">--}}
{{--						login--}}
{{--						<svg--}}
{{--                            class="ml-1 h-5 w-5 fill-current"--}}
{{--                            viewBox="0 0 24 24">--}}
{{--							<path--}}
{{--                                d="M18 21l-4-4h3V7h-3l4-4 4 4h-3v10h3M2--}}
{{--								19v-2h10v2M2 13v-2h7v2M2 7V5h4v2H2z"></path>--}}
{{--						</svg>--}}
{{--					</span>--}}
{{--                    </div>--}}

{{--                    <div class="mr-12 flex capitalize">--}}
{{--                        <!-- Right side -->--}}

{{--                        <span class="mr-16 pr-1 flex items-center">--}}
{{--						project--}}
{{--						<svg--}}
{{--                            class="ml-1 h-5 w-5 fill-current"--}}
{{--                            viewBox="0 0 24 24">--}}
{{--							<path--}}
{{--                                d="M18 21l-4-4h3V7h-3l4-4 4 4h-3v10h3M2--}}
{{--								19v-2h10v2M2 13v-2h7v2M2 7V5h4v2H2z"></path>--}}
{{--						</svg>--}}
{{--					</span>--}}

{{--                        <span class="mr-16 pr-2 flex items-center">--}}
{{--						role--}}
{{--						<svg--}}
{{--                            class="ml-1 h-5 w-5 fill-current"--}}
{{--                            viewBox="0 0 24 24">--}}
{{--							<path--}}
{{--                                d="M18 21l-4-4h3V7h-3l4-4 4 4h-3v10h3M2--}}
{{--								19v-2h10v2M2 13v-2h7v2M2 7V5h4v2H2z"></path>--}}
{{--						</svg>--}}
{{--					</span>--}}

{{--                        <span class="mr-12 flex items-center">--}}
{{--						status--}}
{{--						<svg--}}
{{--                            class="ml-1 h-5 w-5 fill-current"--}}
{{--                            viewBox="0 0 24 24">--}}
{{--							<path--}}
{{--                                d="M18 21l-4-4h3V7h-3l4-4 4 4h-3v10h3M2--}}
{{--								19v-2h10v2M2 13v-2h7v2M2 7V5h4v2H2z"></path>--}}
{{--						</svg>--}}
{{--					</span>--}}
{{--                        <span class="mr-16 flex items-center">--}}
{{--						date--}}
{{--						<svg--}}
{{--                            class="ml-1 h-5 w-5 fill-current"--}}
{{--                            viewBox="0 0 24 24">--}}
{{--							<path--}}
{{--                                d="M18 21l-4-4h3V7h-3l4-4 4 4h-3v10h3M2--}}
{{--								19v-2h10v2M2 13v-2h7v2M2 7V5h4v2H2z"></path>--}}
{{--						</svg>--}}
{{--					</span>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--                <div--}}
{{--                    class="mt-2 mb-4 flex px-4 py-4 justify-between bg-white--}}
{{--				dark:bg-gray-600 shadow-xl rounded-lg cursor-pointer">--}}
{{--                    <div class="flex justify-between">--}}
{{--                        <img--}}
{{--                            class="h-12 w-12 rounded-full object-cover"--}}
{{--                            src="https://media.contentapi.ea.com/content/dam/gin/images/2017/01/crysis-3-keyart.jpg.adapt.crop1x1.767p.jpg"--}}
{{--                            alt=""/>--}}

{{--                        <div--}}
{{--                            class="ml-4 flex flex-col capitalize text-gray-600--}}
{{--						dark:text-gray-400">--}}
{{--                            <span>name</span>--}}
{{--                            <span class="mt-2 text-black dark:text-gray-200">--}}
{{--							crysis--}}
{{--						</span>--}}
{{--                        </div>--}}

{{--                        <div--}}
{{--                            class="ml-12 flex flex-col capitalize text-gray-600--}}
{{--						dark:text-gray-400">--}}
{{--                            <span>login</span>--}}
{{--                            <span class="mt-2 text-black dark:text-gray-200">--}}
{{--							crysis--}}
{{--						</span>--}}

{{--                        </div>--}}

{{--                    </div>--}}

{{--                    <div class="flex">--}}
{{--                        <!-- Rigt side -->--}}

{{--                        <div--}}
{{--                            class="mr-16 flex flex-col capitalize text-gray-600--}}
{{--						dark:text-gray-400">--}}
{{--                            <span>project</span>--}}
{{--                            <span class="mt-2 text-black dark:text-gray-200">--}}
{{--							Killing--}}
{{--						</span>--}}
{{--                        </div>--}}

{{--                        <div--}}
{{--                            class="mr-16 flex flex-col capitalize text-gray-600--}}
{{--						dark:text-gray-400">--}}
{{--                            <span>role</span>--}}
{{--                            <span class="mt-2 text-black dark:text-gray-200">--}}
{{--							hunter--}}
{{--						</span>--}}
{{--                        </div>--}}

{{--                        <div class="mr-16 flex flex-col capitalize text-gray-600 dark:text-gray-400">--}}
{{--                            <span>status</span>--}}
{{--                            <span class="mt-2 text-yellow-600 dark:text-yellow-400">in work</span>--}}
{{--                        </div>--}}

{{--                        <div class="mr-8 flex flex-col capitalize text-gray-600 dark:text-gray-400">--}}
{{--                            <span>final date</span>--}}
{{--                            <span class="mt-2 text-green-400 dark:text-green-200">--}}
{{--							20.02.2020 11:00--}}
{{--						</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </section>
@endsection
