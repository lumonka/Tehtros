@extends('layouts.app')
@section('title') {{ 'Техтрос - Наши услуги' }} @endsection
@section('content')
    <div class="container max-w-8xl mx-auto mt-5 sm:px-6 lg:px-8 space-y-6">
        <nav class="flex px-5 py-3 text-gray-700 rounded-lg" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="/" class="inline-flex items-center text-sm font-medium text-gray-400 hover:text-orange-400">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                        </svg>
                        Главная
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <a href="/services" class="ms-1 text-sm font-medium text-gray-700 hover:text-orange-600 md:ms-2">Каталог</a>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

    <div class="filters container mx-auto bg-white mt-4 py-6 px-6 rounded-lg shadow">
        <div class="filter-category flex items-center gap-2">
            <svg class="ml-1 h-5 w-5 fill-current" viewBox="0 0 24 24">
                <path d="M18 21l-4-4h3V7h-3l4-4 4 4h-3v10h3M2 19v-2h10v2M2 13v-2h7v2M2 7V5h4v2H2z"></path>
            </svg>
            <p>Уточнить</p>
            @foreach($categories as $category)
                <div>
                    <a href="{{ $params->has('sort_by') ? '?sort_by=' . $params['sort_by'] . '&' : ($params->has('sort_by_desc') ? ' ? sort_by_desc=' . $params['sort_by_desc'] . '&' : '?') }}filter={{ $category->id }}" class="{{ request()->query('filter') == $category->id ? 'active' : '' }} px-6 py-2 rounded-full border-2 border-gray-300 hover:bg-orange-300 hover:text-black hover:border-orange-300 hover:shadow transition">{{ $category->category }}</a>
                </div>
            @endforeach
            <a href="/services" class="text-red-500 hover:font-medium">Сбросить</a>
        </div>
    </div>
    @if(count($products) > 0)
        <div class="cards pb-14">
            <div class="container mx-auto">
                <div class="grid-cols-1 sm:grid md:grid-cols-4 ">
                    @foreach($products as $product)
                        <div class="mx-3 mt-6 flex flex-col rounded-lg text-surface shadow bg-white dark:bg-surface-dark dark:text-white sm:shrink-0 sm:grow sm:basis-0" >
                            <a href="/product/{{ $product->product_name }}">
                                <img class="rounded-lg p-4" src="{{ Vite::asset('resources/inc/img/products/') . $product->product_image }}" alt="Product Image" />
                                <div class="text-black p-2 text-center text-lg font-bold hover:text-[#FF9261] transition">
                                    <p class="line-clamp-2">{{ $product->product_name }}</p>
                                </div>
                            </a>
                            <div class="mt-auto border-t-2 border-neutral-100 px-6 py-4 rounded-b-lg bg-[#5A5A5A] hover:bg-gray-700 hover:text-white transition text-center text-surface/75 dark:border-white/10 text-neutral-400 font-medium">
                                <a class="text-xl flex items-center justify-end font-medium" href="/product/{{ $product->product_name }}">ПОДРОБНЕЕ <ion-icon class="ml-2 font-medium" name="arrow-forward"></ion-icon></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @else
        <div class="products-is-empty text-center text-2xl font-medium p-2">
            <h1>Список товаров пуст!</h1>
            <hr class="mt-2 container w-72 mx-auto">
        </div>
    @endif
@endsection
