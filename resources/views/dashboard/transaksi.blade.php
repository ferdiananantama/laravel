@extends('dashboard.layout')

@section('content')
    <div class="max-w-screen-xl mx-auto p-4">
        <h1 class="md:text-2xl text-xl font-semibold text-[#353535] md:mb-6 mb-4">Transaksi</h1>
        <hr class="border border-[#DFDFDF]">
        <div class="mt-6 space-y-4">
            @foreach ($orders as $order)
                <div class="md:flex border shadow-md shadow-[#EBEBEB] py-5 px-6 rounded-lg justify-between space-y-2 sm:space-y-0 text-sm md:text-base">
                    <div class="md:flex gap-8">
                        <div>
                            <img src="{{ $order->event->image_url }}" class="rounded-md w-screen md:w-52" alt="">
                        </div>
                        <div class="space-y-1 flex-col flex justify-between">
                            <div class="space-y-2">
                                <p class="text-[#999999] mt-6 sm:mt-0">Kode Pemesanan</p>
                                <p class="text-[#242222] font-bold ">{{ $order->unique_code }}</p>
                            </div>
                            <a href="/payment">
                                <button class="hidden md:block px-3 py-2 bg-[#0049CC] text-white text-sm rounded-md">Panduan Pembayaran</button>
                            </a>
                        </div>
                    </div>
                    <div class="space-y-2 text-sm md:text-base">
                        <p class="text-[#999999]">Tanggal Pemesanan</p>
                        <p class="text-[#242222] font-bold">{{ $order->created_at->format('l, d F Y') }}</p>
                    </div>
                    <div class="space-y-2 text-sm md:text-base">
                        <p class="text-[#999999]">Total</p>
                        <p class="text-[#242222] font-bold">Rp {{ number_format($order->grand_total) }}</p>
                    </div>
                    <div class="space-y-2 text-sm md:text-base md:text-center me-10">
                        <p class="text-[#999999]">Status</p>
                        <p @class([
                            'font-bold',
                            'text-[#80D983]' => $order->status === 'success',
                            'text-[#ffc436]' => $order->status === 'pending',
                            'text-[#f30000]' => $order->status === 'failed',
                        ])>{{ ucwords($order->status) }}</p>
                    </div>
                    <a href="/payment">
                        <button class="md:hidden flex mx-auto mt-6 px-3 py-2 bg-[#0049CC] text-white text-sm rounded-sm">Panduan Pembayaran</button>
                    </a>
                </div>
            @endforeach
            {{-- <div class="flex border shadow-md shadow-[#EBEBEB] py-5 px-6 rounded-lg justify-between">
                <div class="flex gap-8">
                    <div class="rounded-md overflow-hidden">
                        <img src={{ asset('assets/img/coba.jpg') }} width="200" alt="">
                    </div>
                    <div class="space-y-1 flex-col flex justify-between">
                        <div class="space-y-2">
                            <p class="text-[#999999]">Kode Pemesanan</p>
                            <p class="text-[#242222] font-bold">XYA3486OIO</p>
                        </div>
                        <div>
                            <button class="px-3 py-2 bg-[#0049CC] text-white text-sm rounded-md">Panduan Pembayaran</button>
                        </div>
                    </div>
                </div>
                <div class="space-y-2">
                    <p class="text-[#999999]">Tanggal Pemesanan</p>
                    <p class="text-[#242222] font-bold">Selasa, 12 Desember 2023</p>
                </div>
                <div class="space-y-2">
                    <p class="text-[#999999]">Total</p>
                    <p class="text-[#242222] font-bold">Rp 155,000</p>
                </div>
                <div class="space-y-2 text-center me-10">
                    <p class="text-[#999999]">Status</p>
                    <p class="text-[#F30000] font-bold">Gagal</p>
                </div>
            </div>
            <div class="flex border shadow-md shadow-[#EBEBEB] py-5 px-6 rounded-lg justify-between">
                <div class="flex gap-8">
                    <div class="rounded-md overflow-hidden">
                        <img src={{ asset('assets/img/coba.jpg') }} width="200" alt="">
                    </div>
                    <div class="space-y-1 flex-col flex justify-between">
                        <div class="space-y-2">
                            <p class="text-[#999999]">Kode Pemesanan</p>
                            <p class="text-[#242222] font-bold">XYA3486OIO</p>
                        </div>
                        <div>
                            <button class="px-3 py-2 bg-[#0049CC] text-white text-sm rounded-md">Panduan Pembayaran</button>
                        </div>
                    </div>
                </div>
                <div class="space-y-2">
                    <p class="text-[#999999]">Tanggal Pemesanan</p>
                    <p class="text-[#242222] font-bold">Selasa, 12 Desember 2023</p>
                </div>
                <div class="space-y-2">
                    <p class="text-[#999999]">Total</p>
                    <p class="text-[#242222] font-bold">Rp 155,000</p>
                </div>
                <div class="space-y-2 text-center me-10">
                    <p class="text-[#999999]">Status</p>
                    <p class="text-[#FFC436] font-bold">Pending</p>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
