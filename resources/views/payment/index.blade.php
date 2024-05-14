@extends('layouts.app')
@section('title') {{ 'Техтрос - Пополнение баланса' }} @endsection
@section('content')
    <div class="mt-4">
        <form method="post" action="{{ route('payment.create') }}" class="max-w-sm mx-auto">
            @csrf
            <div class="mb-5">
                <label for="amount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Введите сумму</label>
                <input type="number" name="amount" id="amount" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required />
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Пополнить баланс</button>
        </form>
    </div>

@endsection
