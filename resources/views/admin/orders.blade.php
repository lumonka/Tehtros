@extends('layouts.admin')
@section('title') {{ 'Техтрос - Все заказы' }} @endsection
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
            <h2 class="my-4 text-4xl font-semibold dark:text-gray-400">Список заказов</h2>
            <div class="pb-2 flex items-center justify-start text-gray-600 dark:text-gray-400 border-b dark:border-gray-600">
                <div>
                    <span class="mr-4">Всего заказов: <span class="text-orange-500 font-medium">{{ count($allOrders) }}</span></span>
                </div>
            </div>
            <div class="mt-6 flex justify-between text-gray-600 dark:text-gray-400">
                <div class="ml-10 pl-2 flex capitalize">
                    <span class="ml-8 flex items-center"># заказа
                        <a href="?filter=name">
                            <svg class="ml-1 h-5 w-5 fill-current" viewBox="0 0 24 24">
                                <path d="M18 21l-4-4h3V7h-3l4-4 4 4h-3v10h3M2 19v-2h10v2M2 13v-2h7v2M2 7V5h4v2H2z"></path>
                            </svg>
                        </a>
					</span>
                    <span class="ml-24 flex items-center">Наименование
                        <a href="?filter=desc">
                            <svg class="ml-1 h-5 w-5 fill-current" viewBox="0 0 24 24">
							<path d="M18 21l-4-4h3V7h-3l4-4 4 4h-3v10h3M2 19v-2h10v2M2 13v-2h7v2M2 7V5h4v2H2z"></path>
						</svg>
                        </a>
					</span>
                </div>
                <div class="flex">
                    <span class="ml-18 flex items-center">Количество
                        <a href="?filter=category">
                            <svg class="ml-1 h-5 w-5 fill-current" viewBox="0 0 24 24">
							<path d="M18 21l-4-4h3V7h-3l4-4 4 4h-3v10h3M2 19v-2h10v2M2 13v-2h7v2M2 7V5h4v2H2z"></path>
						</svg>
                        </a>
					</span>
                    <span class="ml-24 flex items-center">Статус заказа
                        <a href="?filter=price">
                            <svg class="ml-1 h-5 w-5 fill-current" viewBox="0 0 24 24">
							<path d="M18 21l-4-4h3V7h-3l4-4 4 4h-3v10h3M2 19v-2h10v2M2 13v-2h7v2M2 7V5h4v2H2z"></path>
						</svg>
                        </a>
					</span>
                </div>
            </div>
            @foreach($orders as $order)
                <div class="@if($order->status == 'Новый') border-l-4 border-green-300 @else @if($order->status == 'Закрыт') border-l-4 border-red-500 @endif @endif mt-2 mb-4 flex px-4 py-4 justify-between bg-white dark:bg-gray-600 shadow rounded cursor-pointer hover:shadow-xl hover:rounded-lg hover:scale-105 transition">
                    <div class="flex justify-between">
                        <div class="ml-4 flex flex-col capitalize text-gray-600 dark:text-gray-400">
                            <span># заказа</span>
                            <span class="mt-2 text-black dark:text-gray-200">{{ $order->number }}</span>
                        </div>
                        @foreach($order->products as $product)
                            <div class="ml-12 flex flex-col text-gray-600 dark:text-gray-400">
                                <span>Наименование</span>
                                <span class="mt-2 text-black dark:text-gray-200">{{ $product->name }}</span>
                            </div>
                        @endforeach
                    </div>
                    <div class="flex">
                        <div class="mr-16 flex flex-col capitalize text-gray-600 dark:text-gray-400">
                            <span>Количество</span>
                            <span class="mt-2 text-black dark:text-gray-200">{{ $order->totalQty }}шт.</span>
                        </div>
                        <div class="mr-8 flex flex-col text-gray-600 dark:text-gray-400">
                            <span>Статус заказа</span>
                            <span class="mt-2 @if($order->status == 'Новый') text-green-500 font-medium @else @if($order->status == 'Закрыт') text-red-500 font-medium @endif @endif text-green-500 font-medium">{{ $order->status }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
