@extends('dashboard.layout')

@section('content')
    <div class="max-w-screen-xl mx-auto p-4">
        <h1 class="md:text-2xl text-xl font-semibold text-[#353535] md:mb-6 mb-4">Tiket Saya</h1>
        <hr class="border border-[DFDFDF]">
        <div class="mt-6 space-y-4">
            @foreach ($orders as $order)
                <div class="md:flex border shadow-md shadow-[#EBEBEB] py-5 px-6 rounded-lg justify-between">
                    <div class="flex md:gap-16 gap-6">
                        <div>
                            <img src="{{ $order->event->image_url }}" class="md:w-52 w-32 rounded-sm" alt="">
                        </div>
                        <div class="space-y-2 text-center">
                            <p class="text-[#999999] text-xs md:text-base">Nama Event</p>
                            <p class="text-[#242222] font-bold md:text-base text-sm">{{ $order->event->name }}</p>
                        </div>
                        <div class="space-y-2 text-center">
                            <p class="text-[#999999] text-xs md:text-base ">Tanggal Event</p>
                            <p class="text-[#242222] font-bold md:text-base text-sm">{{ $order->event->date->format('l, d F Y') }}</p>
                            <p class="text-[#242222] font-bold md:text-base text-sm">
                                {{ $order->event->time_start->format('H:i') }} - {{ $order->event->time_end?->format('H:i') ?? 'Selesai' }}
                            </p>
                        </div>
                        <div class="space-y-2 text-center">
                            <p class="text-[#999999] text-xs md:text-base">Jumlah</p>
                            <p class="text-[#242222] font-bold text-sm md:text-base">{{ $order->tickets->sum('ticket.quantity') }}</p>
                        </div>
                    </div>
                    <div class="gap-3 flex md:items-center mt-8 md:mt-0 justify-end">
                        <a href="{{ route('events.detail', $order->event) }}" class="md:text-base bg-[#E4BBA1] hover:bg-[#c28a68] hover:duration-500 px-4 py-2 text-sm md:px-5 md:py-2 rounded-sm text-white font-medium text-center">Event Detail</a>
                        <button class="border-2 rounded-sm md:text-base font-semibold border-[#014B32] text-[#014B32] text-sm px-4 py-1.5 md:px-5 md:py-2 hover:bg-[#014B32] hover:text-white hover:font-light hover:duration-500">Download</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
