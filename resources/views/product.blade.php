@extends('layouts.app')
@section('title') {{ 'Техтрос - Наши услуги' }} @endsection
@section('content')
    <div id="toast-success" class="toast-success shadow-xl"></div>
    <div id="toast-failed" class="toast-failed shadow-xl"></div>

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
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <a href="{{ $product->product_name }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-orange-600 md:ms-2">{{ $product->product_name }}</a>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
    <div class="max-w-8xl p-6 mx-auto sm:px-6 lg:px-8 mt-6 bg-white shadow-xl">
        <div class="flex flex-col md:flex-row -mx-4">
            <div class="md:flex-1 px-4">
                <div>
                    <img class="rounded-lg p-4" src="{{ Vite::asset('resources/inc/img/products/') . $product->product_image }}" alt="Product Image" />
                </div>
            </div>
            <div class="product md:flex-1 px-4">
                <h2 class="product_name mb-2 leading-tight tracking-tight font-bold text-gray-800 text-2xl md:text-3xl">{{ $product->product_name }}</h2>
                <p class="text-gray-500">{{ $product->product_desc }}</p>
                <hr class="mt-2">
                <div class="flex py-4 space-x-4 justify-between items-center">
                    <div class="flex">
                        <?php echo $product->code ?>
{{--                        <div class="flex flex-col p-1">--}}
{{--                            <span>Количество</span>--}}
{{--                            <div class="relative flex items-center max-w-[8rem]">--}}
{{--                                <button type="button" id="decrement-button" data-input-counter-decrement="quantity-input" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">--}}
{{--                                    <svg class="w-3 h-2 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">--}}
{{--                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>--}}
{{--                                    </svg>--}}
{{--                                </button>--}}
{{--                                <input type="text" id="quantity-input" data-input-counter data-input-counter-min="1" data-input-counter-max="50" aria-describedby="helper-text-explanation" class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="999" value="5" required />--}}
{{--                                <button type="button" id="increment-button" data-input-counter-increment="quantity-input" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">--}}
{{--                                    <svg class="w-3 h-2 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">--}}
{{--                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>--}}
{{--                                    </svg>--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                    <div class="flex flex-col">
                        <div class="flex items-center justify-end text-xl">
                            Стоимость: <span class="price ml-2 font-bold">{{ $product->product_price }}р</span>
                        </div>
                        <div class="flex justify-end">
                            @if(Auth::check())
                                <button type="button" @click="addToCart" class="product__add-to-cart h-14 px-6 py-2 mt-2 font-semibold rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white">
                                    Добавить в корзину
                                </button>
                            @else
                                <button type="button" class="disabled h-14 px-6 py-2 mt-2 font-semibold rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white">
                                    Добавить в корзину
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function showToast(message) {
            const toast = document.getElementById('toast-success');
            toast.innerText = message;
            toast.style.display = 'block';
            setTimeout(() => {
                toast.style.display = 'none';
            }, 3000);
        }

        function addToCart() {
            // Добавьте свою логику добавления в корзину здесь
            showToast('Товар успешно добавлен в корзину!');
        }

        const pid = {{ $product->id }};
        const button = document.querySelector('.product__add-to-cart')
        button.addEventListener('click', () => {
            let status = 0
            fetch(`/add-to-cart/${pid}`)
                .then(response => status = response.status)
                .then(() => {
                    if (status > 100) {
                        addToCart()
                        setTimeout(() => {
                            window.location.href = "/cart"
                        }, 2000)
                    } else {
                        addToCart('Товара нет в наличии!')
                    }
                })
        })
    </script>

@endsection

