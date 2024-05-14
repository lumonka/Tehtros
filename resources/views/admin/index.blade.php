@extends('layouts.admin')
@section('title')
    {{ 'Техтрос - Админ-панель' }}
@endsection
@section('content')
        <section class="h-screen flex-1 flex bg-gray-100 dark:bg-gray-700 transition duration-500 ease-in-out overflow-y-auto px-5">
            <div class="mx-10 my-2 w-full">
                <nav class="flex flex-row justify-end border-b dark:border-gray-600 dark:text-gray-400 transition duration-500 ease-in-out">
                    <div class="flex items-center select-none">
					<span class="hover:text-green-500 dark-hover:text-green-300 cursor-pointer mr-3 transition duration-500 ease-in-out">
						<svg viewBox="0 0 512 512" class="h-5 w-5 fill-current">
							<path d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
						</svg>
					</span>
                        <input class="w-full bg-transparent border-none focus:outline-none" placeholder="Введите запрос.."/>
                    </div>
                </nav>
                <h2 class="my-4 text-4xl font-semibold dark:text-gray-400">Главная</h2>
                <div class="pb-2 flex items-center justify-start text-gray-600 dark:text-gray-400 border-b dark:border-gray-600">
                    <div>
					    <span class="mr-4 w-full">Зарегистрированных пользователей: <span class="text-orange-500 font-medium">{{ count($allUsers) }}</span></span>
                    </div>
                    <div>
                        <span class="mr-4">Администраторов: <span class="text-orange-500 font-medium">{{ count($admins) }}</span></span>
                    </div>
                    <div>
                        <span>Пользователей: <span class="text-orange-500 font-medium">{{ count($users) }}</span></span>
                    </div>

                    <div class="w-[57%] flex justify-end">
                        <div>
                            <span class="mr-4">Всего товаров: <span class="text-orange-500 font-medium">{{ count($products) }}</span></span>
                        </div>
                        <div>
                            <span class="mr-4">Тросов: <span class="text-orange-500 font-medium">{{ count($categoryTros) }}</span></span>
                        </div>
                        <div>
                            <span>Насадок: <span class="text-orange-500 font-medium">{{ count($nozzles) }}</span></span>
                        </div>
                    </div>
                </div>
                <div class="mt-6 flex justify-between text-gray-600 dark:text-gray-400">
                    <div class="ml-10 pl-2 flex capitalize">
                        <span class="ml-8 flex items-center">Имя
						<svg class="ml-1 h-5 w-5 fill-current" viewBox="0 0 24 24">
							<path d="M18 21l-4-4h3V7h-3l4-4 4 4h-3v10h3M2 19v-2h10v2M2 13v-2h7v2M2 7V5h4v2H2z"></path>
						</svg>
					</span>
                        <span class="ml-24 flex items-center">Логин
						<svg class="ml-1 h-5 w-5 fill-current" viewBox="0 0 24 24">
							<path d="M18 21l-4-4h3V7h-3l4-4 4 4h-3v10h3M2 19v-2h10v2M2 13v-2h7v2M2 7V5h4v2H2z"></path>
						</svg>
					</span>
                    </div>
                    <div class="mr-12 flex">
                        <span class="mr-16 pr-1 flex items-center">Роль
						<svg class="ml-1 h-5 w-5 fill-current" viewBox="0 0 24 24">
							<path d="M18 21l-4-4h3V7h-3l4-4 4 4h-3v10h3M2 19v-2h10v2M2 13v-2h7v2M2 7V5h4v2H2z"></path>
						</svg>
					</span>
                        <span class="mr-16 flex items-center">Дата регистрации
						<svg class="ml-1 h-5 w-5 fill-current" viewBox="0 0 24 24">
							<path d="M18 21l-4-4h3V7h-3l4-4 4 4h-3v10h3M2 19v-2h10v2M2 13v-2h7v2M2 7V5h4v2H2z"></path>
						</svg>
					</span>
                    </div>
                </div>
                @foreach($allUsers as $user)
                    <div class="mt-2 mb-4 flex px-4 py-4 justify-between bg-white dark:bg-gray-600 shadow rounded cursor-pointer hover:shadow-xl hover:rounded-lg hover:scale-105 transition">
                        <div class="flex justify-between">
                            <img class="h-12 w-12 rounded-full object-cover" src="/avatars/{{ Auth::user()->avatar }}" alt="User Avatar"/>
                            <div class="ml-4 flex flex-col capitalize text-gray-600 dark:text-gray-400">
                                <span>Имя</span>
                                <span class="mt-2 text-black dark:text-gray-200">{{ $user->name }}</span>
                            </div>
                            <div class="ml-12 flex flex-col text-gray-600 dark:text-gray-400">
                                <span>Логин</span>
                                <span class="mt-2 text-black dark:text-gray-200">{{ $user->login }}</span>
                            </div>
                        </div>
                        <div class="flex">
                            <div class="mr-16 flex flex-col capitalize text-gray-600 dark:text-gray-400">
                                <span>Роль</span>
                                @if($user->group == 2)
                                    <span class="mt-2 font-medium text-red-600">Администратор</span>
                                @else
                                    <p class="mt-2 font-medium">Пользователь</p>
                                @endif
                            </div>
                            <div class="mr-8 flex flex-col text-gray-600 dark:text-gray-400">
                                <span>Дата регистрации</span>
                                <span class="mt-2 text-green-400 dark:text-green-200">{{ $user->created_at }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
{{--                <div class="bg-white rounded-lg shadow-xl w-[480px] h-[380px] mt-[60px]">--}}
{{--                    <h2 class="font-medium text-xl text-center py-3">Группы пользователей</h2>--}}
{{--                    <hr class="mx-8">--}}
{{--                    <table class="w-full text-sm mt-5 text-left rtl:text-right text-gray-500 dark:text-gray-400">--}}
{{--                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">--}}
{{--                        <tr>--}}
{{--                            <th scope="col" class="px-6 py-3">--}}
{{--                                # ID--}}
{{--                            </th>--}}
{{--                            <th scope="col" class="px-6 py-3">--}}
{{--                                <div class="flex items-center">--}}
{{--                                    Название--}}
{{--                                    <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">--}}
{{--                                            <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>--}}
{{--                                        </svg></a>--}}
{{--                                </div>--}}
{{--                            </th>--}}
{{--                            <th scope="col" class="px-6 py-3">--}}
{{--                                <span class="sr-only">Edit</span>--}}
{{--                            </th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                        @foreach($groups as $group)--}}
{{--                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">--}}
{{--                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">--}}
{{--                                    {{ $group->id }}--}}
{{--                                </th>--}}
{{--                                <td class="px-6 py-4 capitalize">--}}
{{--                                    {{ $group->role }}--}}
{{--                                </td>--}}
{{--                                <td class="px-6 py-4 text-right">--}}
{{--                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Изменить</a>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                        @endforeach--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </div>--}}
            </div>
        </section>
@endsection
