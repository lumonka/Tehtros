@extends('layouts.app')
@section('title')
    {{ 'Техтрос - Профиль' }}
@endsection
@section('content')
    <div class="container max-w-8xl mx-auto mt-5 sm:px-6 lg:px-8 space-y-6">
        <nav class="flex px-5 py-3 text-gray-700 rounded-lg" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="/"
                       class="inline-flex items-center text-sm font-medium text-gray-400 hover:text-orange-400">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                             fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                        </svg>
                        Главная
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="m1 9 4-4-4-4"/>
                        </svg>
                        <a href="#"
                           class="ms-1 text-sm font-medium text-gray-700 hover:text-orange-600 md:ms-2">Профиль</a>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
    <div class="py-12">
        <div class="card bg-white max-h-screen">
            <div class="container mx-auto">
                <div class="user-info flex">
                    <div
                        class="user bg-white w-[350px] p-5 h-full shadow-xl sm:rounded-lg border-t-4 border-orange-500">
                        <div class="w-64 h-64 mx-auto relative">
                            <div class="w-full h-full bg-center bg-cover"
                                 style="background-image: url('/avatars/{{ Auth::user()->avatar }}');">
                                <button data-modal-target="change-avatar" data-modal-toggle="change-avatar"
                                        type="button"
                                        class="absolute inset-0 w-full h-full bg-black bg-opacity-50 opacity-0 hover:opacity-75 transition-opacity rounded-2xl"></button>
                            </div>
                        </div>
                        <div class="text-center font-medium text-xl">{{ Auth::user()->name }}</div>
                        <div class="bg-white mt-2 rounded">
                            <div class="information h-auto p-2 items-center text-gray-600">
                                <div class="flex justify-between items-center p-1">
                                    <span>Статус</span>
                                    @if(Auth::user()->group == 2)
                                        <p class="bg-red-400 text-white font-medium px-2 rounded">Администратор</p>
                                    @else
                                        @if(Auth::user()->group == 1)
                                            <p class="bg-gray-400 text-white font-medium px-2 rounded">Пользователь</p>
                                        @endif
                                    @endif
                                </div>
                                <hr class="py-1">
                                <div class="flex justify-between items-center p-1">
                                    <span>Зарегистрирован</span>
                                    <b>{{ Auth::user()->created_at->format('Y-m-d') }}</b>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-center flex-col items-center mt-6 gap-4">
                            <button data-modal-target="more-information" data-modal-toggle="more-information"
                                    type="button"
                                    class="bg-[#464646] text-white px-12 max-w-fit py-3 rounded hover:bg-[#FF5E14] transition font-medium">
                                Подробнее
                            </button>
                        </div>
                    </div>
                    <div class="mx-auto">
                        <div class="w-[1000px] mt-6 mx-auto sm:px-6 lg:px-8 space-y-6">
                            <div class="p-4 sm:p-8 bg-white shadow-xl sm:rounded-lg border-t-4 border-orange-500">
                                <div>
                                    <div class="title flex items-center pb-2">
                                        <ion-icon name="pricetags" class="text-2xl mr-2"></ion-icon>
                                        <span>История заказов</span>
                                    </div>
                                    <hr class="pt-2">
                                    <div>
                                        @if(count($orders) > 0)
                                            <table
                                                class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                <thead
                                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3">
                                                        # заказа
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Наименование
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Количество
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Статус заказа
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Действие
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($orders as $order)
                                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                        <td class="px-6 py-4">
                                                            {{ $order->number }}
                                                        </td>
                                                        @foreach($order->products as $product)
                                                            <td class="px-6 py-4">
                                                                {{ $product->name }}
                                                            </td>
                                                            <td class="px-6 py-4">
                                                                {{ $order->totalQty }}шт.
                                                            </td>
                                                        @endforeach
                                                        <td class="px-6 py-4">
                                                            {{ $order->status }}
                                                        </td>
                                                        @endforeach
                                                        @if($order->status == 'Новый')
                                                            <form action="/order-delete/{{ $order->number }}"
                                                                  method="post">
                                                                @method('delete')
                                                                @csrf
                                                                <td class="px-6 py-4">
                                                                    <input type="submit" value="Отменить"
                                                                           class="font-medium text-blue-600 dark:text-blue-500 hover:underline cursor-pointer">
                                                                </td>
                                                            </form>
                                                        @else
                                                            <td class="px-6 py-4">
                                                                <span>-</span>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                </tbody>
                                            </table>
                                        @else
                                            <table
                                                class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                <thead
                                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3">
                                                        # заказа
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Наименование
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Количество
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Статус заказа
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Действие
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <td class="px-6 py-4 w-full font-medium">
                                                        Заказов нет..
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="w-[1000px] mt-6 mx-auto sm:px-6 lg:px-8 space-y-6">
                            <div class="p-4 sm:p-8 bg-white shadow-xl sm:rounded-lg border-t-4 border-orange-500">
                                <div>
                                    <div class="title flex items-center pb-2">
                                        <ion-icon name="card" class="text-2xl mr-2"></ion-icon>
                                        <span>История пополнения</span>
                                    </div>
                                    <hr class="pt-2">
                                    <div>
                                        @if(count($transactions) > 0)
                                            <table
                                                class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                <thead
                                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3">
                                                        # ID
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Пополнение
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Статус
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Дата пополнения
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($transactions as $transaction)
                                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                        <td class="px-6 py-4">
                                                            {{ $transaction->id }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{ $transaction->amount }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{ $transaction->status }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{ $transaction->created_at }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        @else
                                            <table
                                                class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                <thead
                                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3">
                                                        # ID
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Пополнение
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Статус
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <td class="px-6 py-4 w-full font-medium">
                                                        Транзакций нет..
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--   CHANGE AVATAR MODAL  --}}
    <div id="change-avatar" tabindex="-1" aria-hidden="true"
         class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Смена аватара
                    </h3>
                    <button data-modal-hide="change-avatar" type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="default-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('profile.edit') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="container mx-auto">
                        <div class="flex justify-center">
                            <div class="py-12 px-6">
                                <input id="avatar" type="file"
                                       class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                       name="avatar" value="{{ old('avatar') }}" required autocomplete="avatar">
                                <img src="/avatars/{{ Auth::user()->avatar }}" style="width:80px;margin-top: 10px;">
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Подтвердить
                        </button>
                        <button data-modal-hide="change-avatar" type="button"
                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                            Закрыть
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{--   MORE INFORMATION MODAL  --}}
    <div id="more-information" tabindex="-1" aria-hidden="true"
         class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Информация о профиле
                    </h3>
                    <button data-modal-hide="more-information" type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="default-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <div class="py-12 px-4">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Имя аккаунта
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Логин
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Почта
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Дата регистрации
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="bg-white">
                            @foreach($usersTable as $user)
                                <td class="px-6 py-4">
                                    {{ $user->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $user->login }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $user->email }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ Auth::user()->created_at->format('Y-m-d') }}
                                </td>
                            @endforeach
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="more-information" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                        Закрыть
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection

