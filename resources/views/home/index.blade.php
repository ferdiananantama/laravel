@extends('layouts.layout')

@section('content')
    <div class="max-w-screen-xl mx-auto">
        <div id="default-carousel" class="relative max-w-screen-xl mx-auto" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                @foreach ($banners as $banner)
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ $banner->image_url }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                @endforeach
            </div>
            <!-- Slider indicators -->
            <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                @foreach ($banners as $i => $banner)
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="{{ $i === 0 }}" aria-label="Slide {{ $i + 1 }}" data-carousel-slide-to="{{ $i }}"></button>
                @endforeach
            </div>
            <!-- Slider controls -->
            <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
        <div class="mt-20 md:mb-36 mb-28" id="card-list">
            <div>
                <div class="md:text-3xl text-2xl font-semibold">Rekomendasi Unggulan</div>
                <div class="font-extralight text-gray-400 md:text-sm text-xs mt-1 mb-8">Temukan konser sesuai dengan pilihan anda</div>
                <div id="card" class="grid grid-cols-2 gap-6 md:grid-cols-4 md:gap-4">
                    @foreach ($events as $event)
                        <a href="{{ route('events.detail', $event) }}" class="border border-gray-100 shadow-md rounded-md overflow-hidden ease-in duration-300 hover:scale-105 cursor-pointer">
                            <img src="{{ $event->image_url }}" width="320" alt="">
                            <div id="content-card" class="p-3">
                                <header class="font-semibold md:text-lg text-base mt-2">
                                    {{ $event->name }}
                                </header>
                                <p class="md:text-sm text-xs text-[#A3A3A3] font-extralight mb-4 md:mb-6">{{ $event->date->format('d F Y') }}</p>
                                <div class="flex justify-between mb-3">
                                    <div class="font-medium md:text-sm text-xs">Start From</div>
                                    <div class="md:text-sm text-xs font-semibold text-[#003E29]">Rp {{ number_format($event->ticket_starts_from) }}</div>
                                </div>
                                <hr class="border-[#F0F0F0] mb-3">
                                <div class="flex items-center gap-2">
                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_30_1175)">
                                        <path d="M9.91675 5.38892C9.91675 8.69447 5.66675 11.5278 5.66675 11.5278C5.66675 11.5278 1.41675 8.69447 1.41675 5.38892C1.41675 4.26175 1.86451 3.18074 2.66154 2.38371C3.45857 1.58668 4.53958 1.13892 5.66675 1.13892C6.79392 1.13892 7.87492 1.58668 8.67195 2.38371C9.46898 3.18074 9.91675 4.26175 9.91675 5.38892Z" stroke="#E4BBA1" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M5.66667 6.8055C6.44907 6.8055 7.08333 6.17124 7.08333 5.38883C7.08333 4.60643 6.44907 3.97217 5.66667 3.97217C4.88426 3.97217 4.25 4.60643 4.25 5.38883C4.25 6.17124 4.88426 6.8055 5.66667 6.8055Z" stroke="#E4BBA1" stroke-linecap="round" stroke-linejoin="round"/>
                                        </g>
                                        <defs>
                                        <clipPath id="clip0_30_1175">
                                        <rect width="11.3333" height="12" fill="white"/>
                                        </clipPath>
                                        </defs>
                                    </svg>
                                    <p class="md:text-sm text-xs text-[#B0B0B0] font-extralight">{{ $event->location }}</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="mt-12 flex justify-center">
                    <a href="" class="flex items-center gap-2 px-4 py-2 border-2 rounded-sm md:px-5 md:py-2 md:border-4 md:rounded-md border-[#0A0A0A] font-semibold text-[#0A0A0A] text-sm md:text-base hover:scale-105 hover:bg-slate-100">Jelajahi lainnya
                        <span>
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 17L14 12L9 7" stroke="#040404" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <div class="bg-gradient-to-b from-[#FFE29B] w-full rounded-sm md:h-56 md:mb-48 mb-40">
            <div class="flex flex-col justify-center items-center">
                <div class="text-2xl mt-10 md:text-5xl md:font-medium md:mt-16 text-[#4B4B4B]">Jual Tiket Event Kalian Disini</div>
                <div class="text-base font-extralight md:text-lg text-[#929292] md:mt-4">Chat admin kami</div>
                <div class="md:mt-14 mt-10">
                    <a href="" class="md:text-xl font-extralight px-8 py-4 rounded-full bg-black text-white">Hubungi Kami</a>
                </div>
            </div>
        </div>
    </div>
@endsection


