@extends('layouts.app')
@section('title') {{ 'Техтрос - Новости' }} @endsection
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
                        <a href="#" class="ms-1 text-sm font-medium text-gray-700 hover:text-orange-600 md:ms-2">Новости</a>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
    <section class="lg:pt-10 pb-10 lg:pb-20">
        <div class="container mx-auto">
            <div class="flex flex-wrap justify-center -mx-4">
                <div class="w-full px-4">
                    <div class="text-center mx-auto mb-[60px] lg:mb-20 max-w-[510px]">
                        <h2 class="font-bold text-3xl sm:text-4xl md:text-[40px] text-dark mb-4">
                            Актуальные новости
                        </h2>
                        <hr class="mt-2 container w-72 mx-auto">
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap gap-6 justify-center">
                @foreach($news as $new)
                    <div class="w-full md:w-1/2 lg:w-1/4 px-4 py-4 bg-white shadow-xl rounded-lg border-t-4 border-orange-500">
                        <div class="max-w-[320px] mx-auto mb-10">
                            <div class="rounded overflow-hidden mb-8">
                                <img src="{{ Vite::asset('resources/inc/img/') . $new->image }}" alt="image" class="w-full h-64 bg-cover"/>
                            </div>
                            <div class="line-clamp-4">
                                <span class="bg-orange-400 rounded inline-block text-center py-1 px-4 text-xs leading-loose font-semibold text-white mb-5">{{ $new->created_at }}</span>
                                <h3>
                                    <a href="javascript:void(0)" class="font-semibold text-xl sm:text-2xl lg:text-xl xl:text-2xl mb-4 inline-block text-dark hover:text-gray-600">
                                        {{ $new->name }}
                                    </a>
                                </h3>
                                <p class="text-base text-body-color">
                                    {{ $new->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
