@extends('layouts.app')
@section('title') {{ 'Техтрос - Контакты' }} @endsection
@section('content')
    <section class="text-gray-600 body-font relative">
        <div class="absolute inset-0 bg-gray-600">
            <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Ad6cbdaac2b507e4ec9c6f4df42bc63faf7f32d1c504c59c93684465132831b00&amp;source=constructor" width="100%" height="720" frameborder="0"></iframe>
        </div>
        <div class="container px-5 py-24 mx-auto flex">
            <div class="lg:w-1/3 md:w-1/2 bg-white rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0 relative shadow-md">
                <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Обратная связь</h2>
                <p class="leading-relaxed mb-5 text-gray-600">Заполните форму ниже для обратной связи</p>
                <div class="relative mb-4">
                    <label for="email" class="leading-7 text-sm text-gray-600">Ваша почта</label>
                    <input type="email" id="email" name="email" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
                <div class="relative mb-4">
                    <label for="message" class="leading-7 text-sm text-gray-600">Сообщение</label>
                    <textarea id="message" name="message" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                </div>
                <button class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Отправить</button>
            </div>
        </div>
    </section>
@endsection
