@extends('layouts.app')
@section('title') {{ 'Техтрос - Корзина' }} @endsection
@section('content')
    <div id="toast-failed" class="toast-failed shadow-xl"></div>

    <div class="cart h-screen pt-20">
        @if(count($cart) > 0)
            <h1 class="mb-10 text-center text-2xl font-bold">Корзина</h1>
            <div class="mx-auto max-w-5xl justify-center px-6 md:flex md:space-x-6 xl:px-0">
                <div class="cart__raw rounded-lg md:w-2/3">
                    @foreach($cart as $item)
                        <div class="justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
                            <img src="{{ Vite::asset('resources/inc/img/products/') . $item->image }}" alt="product-image" class="w-full rounded-lg sm:w-40" />
                            <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                                <div class="mt-5 sm:mt-0">
                                    <h2 class="text-lg font-bold text-gray-900">{{ $item->name }}</h2>
                                    <p class="text-sm">Стоимость: <span class="font-bold text-orange-500">{{ $item->price * $item->qty }}₽</span></p>
                                </div>
                                <div class="mt-4 flex justify-between sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
                                    <div class="inline-flex items-center px-4 font-semibold text-gray-500 border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-700 ">
                                        <button class="btn {{ $item->qty == $item->limit ? 'disabled' : '' }}" id="increase" cartid="{{ $item->id }}">+</button>
                                        <span class="p-3">{{ $item->qty }}</span>
                                        <button class="btn" id="decrease" cartid="{{ $item->id }}">-</button>
                                    </div>
                                    <div class="flex items-center justify-end space-x-4">
                                        <form action="/removeproduct/{{ $item->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 cursor-pointer duration-150 hover:text-red-500">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-6 h-full rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-1/3">
                    <div class="flex justify-between">
                        <p class="text-lg font-bold">Итоговая сумма</p>
                        <div class="total_price">
                            <p class="mb-1 text-lg font-bold">{{ $total }}₽</p>
                        </div>
                    </div>
                    <form action="/create-order" method="post">
                        @csrf
                        <button type="submit" @if(Auth::user()->balance < $total) data-tooltip-target="tooltip-default" disabled @endif class="@if(Auth::user()->balance < $total) bg-gray-300 hover:bg-gray-300 @endif mt-6 w-full rounded-md bg-blue-500 py-1.5 font-medium text-blue-50 hover:bg-blue-600">Оформить заказ</button>
                        <div id="tooltip-default" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            Вам не хватает {{ $total }} руб.
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    </form>
                </div>
            </div>
        @else
            <div class="products-is-empty text-center text-2xl font-medium p-2">
                <h1>Корзина пуста!</h1>
                <hr class="mt-2 container w-72 mx-auto">
            </div>
        @endif
    </div>

    <script>
        const increaseButtons = document.querySelectorAll('.btn#increase');
        const decreaseButtons = document.querySelectorAll('.btn#decrease');

        increaseButtons.forEach(button => {
            button.addEventListener('click', () => {
                const productId = button.getAttribute('cartid');
                fetch(`/changeqty/incr/${productId}`)
                    .then(response => response.json())
                    .then(data => {
                        const quantityElement = button.parentElement.querySelector('span');
                        quantityElement.textContent = data.qty;
                    })
                    .finally(() => window.location.reload())
                    .catch(error => console.error('Error:', error));
            });
        });

        decreaseButtons.forEach(button => {
            button.addEventListener('click', () => {
                const productId = button.getAttribute('cartid');
                fetch(`/changeqty/decr/${productId}`)
                    .then(response => response.json())
                    .then(data => {
                        const quantityElement = button.parentElement.querySelector('span');
                        quantityElement.textContent = data.qty;
                    })
                    .finally(() => window.location.reload())
                    .catch(error => console.error('Error:', error));
            });
        });
    </script>

    <script>
        // JavaScript код для отображения всплывающего уведомления
        function showToast(message) {
            const toast = document.getElementById('toast-failed');
            toast.innerText = message;
            toast.style.display = 'block';
            setTimeout(() => {
                toast.style.display = 'none';
            }, 3000);
        }

        function enoughMoney() {
            // Добавьте свою логику добавления в корзину здесь
            showToast('У вас недостаточно средств на счету!');
        }
    </script>
@endsection
