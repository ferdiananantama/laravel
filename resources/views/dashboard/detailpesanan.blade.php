@extends('dashboard.layout')

@section('content')
    <div class="relative max-w-screen-xl mx-auto px-4">
        <div class="items-center text-xl font-semibold text-[#353535] mb-6">
            Detail pesanan
        </div>
        <div class="md:flex md:space-x-16 w-full">
            <div class="md:w-8/12">
                <div class="border border-[#EBEBEB] rounded-md" id="Gambar">
                    <img src="{{ $event->image_url }}" class="w-full h-auto p-6 " alt="">
                    <div>
                        <div class="text-3xl font-semibold text-[#2B2B2B] ps-6">
                            {{ $event->name }}
                        </div>
                        <div class="mt-3 flex gap-4 ps-6 pb-6">
                            <div class="flex items-center gap-1">
                                <svg width="14" height="14" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.5 2H2.5C1.94772 2 1.5 2.44772 1.5 3V10C1.5 10.5523 1.94772 11 2.5 11H9.5C10.0523 11 10.5 10.5523 10.5 10V3C10.5 2.44772 10.0523 2 9.5 2Z" stroke="#0049CC" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M8 1V3" stroke="#0049CC" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M4 1V3" stroke="#0049CC" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M1.5 5H10.5" stroke="#0049CC" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <p class="text-sm text-[#B0B0B0]">{{ $event->date->format('l, d F Y') }}</p>
                            </div>
                            <div class="flex items-center gap-1">
                                <svg width="14" height="14" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_35_1422)">
                                    <path d="M9.91675 5.38892C9.91675 8.69447 5.66675 11.5278 5.66675 11.5278C5.66675 11.5278 1.41675 8.69447 1.41675 5.38892C1.41675 4.26175 1.86451 3.18074 2.66154 2.38371C3.45857 1.58668 4.53958 1.13892 5.66675 1.13892C6.79392 1.13892 7.87492 1.58668 8.67195 2.38371C9.46898 3.18074 9.91675 4.26175 9.91675 5.38892Z" stroke="#0049CC" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M5.66667 6.80556C6.44907 6.80556 7.08333 6.1713 7.08333 5.3889C7.08333 4.60649 6.44907 3.97223 5.66667 3.97223C4.88426 3.97223 4.25 4.60649 4.25 5.3889C4.25 6.1713 4.88426 6.80556 5.66667 6.80556Z" stroke="#0049CC" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_35_1422">
                                    <rect width="11.3333" height="12" fill="white"/>
                                    </clipPath>
                                    </defs>
                                </svg>
                                <p class="text-sm text-[#B0B0B0]">{{ $event->location }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="detail-event" class="my-10">
                    <p class="text-xl font-semibold text-[#353535] mb-6">
                        Detail Tiket
                    </p>
                    <div>
                        <div class="relative overflow-x-auto border border-[#EBEBEB] sm:rounded-lg">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="text-base text-[#3B3B3B] bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Jenis Tiket
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Jumlah
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Harga
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tickets as $ticket)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $ticket->name }}
                                            </th>
                                            <td class="px-6 py-4">
                                                x{{ $ticket->quantity }}
                                            </td>
                                            <td class="px-6 py-4">
                                                Rp {{ number_format($ticket->total_price) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div id="line-up" class="pb-6">
                    <p class="mb-6 text-xl font-semibold text-[#353535]">
                        Metode Pembayaran
                    </p>
                    <div class="grid md:grid-cols-4 md:gap-6 grid-cols-3 gap-4">
                        <div class="md:w-48 md:h-20 w-36 h-16 border rounded-md flex">
                            <img src={{ asset('assets/img/gopay.png') }} class="m-auto" alt="">
                        </div>
                        <div class="md:w-48 md:h-20 w-36 h-16 border rounded-md flex">
                            <img src={{ asset('assets/img/bca.png') }} class="m-auto" alt="">
                        </div>
                        <div class="md:w-48 md:h-20 w-36 h-16 border rounded-md flex">
                            <img src={{ asset('assets/img/banktranfer.png') }} class="m-auto" alt="">
                        </div>
                        <div class="md:w-48 md:h-20 w-36 h-16 border rounded-md flex">
                            <img src={{ asset('assets/img/linkaja.png') }} class="m-auto" alt="">
                        </div>
                        <div class="md:w-48 md:h-20 w-36 h-16 border rounded-md flex">
                            <img src={{ asset('assets/img/indomart.png') }} class="m-auto" alt="">
                        </div>
                        <div class="md:w-48 md:h-20 w-36 h-16 border rounded-md flex">
                            <img src={{ asset('assets/img/qris.png') }} class="m-auto" alt="">
                        </div>
                        <div class="md:w-48 md:h-20 w-36 h-16 border rounded-md flex">
                            <img src={{ asset('assets/img/shoopepay.png') }} class="m-auto" alt="">
                        </div>
                        <div class="md:w-48 md:h-20 w-36 h-16 border rounded-md flex">
                            <img src={{ asset('assets/img/visa.png') }} class="m-auto" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="md:w-4/12 w-full mt-20 md:mt-0">
                <div class="w-full pt-6 pb-1 bg-[#E7E7E7] px-8 rounded-lg sticky top-8">
                    <div class="flex gap-1">
                        <input type="text" class="w-9/12 rounded-md ps-3 text-[#BCBCBC] border-[#DDDDDD] text-sm bg-white" placeholder="masukkan voucher">
                        <button class="w-3/12 text-sm bg-[#014B32] rounded-md text-white">Gunakan</button>
                    </div>
                    <div class="md:my-5 my-8">
                        <p class="text-xl font-semibold">Detail Harga</p>
                        <div class="mt-4 flex justify-between">
                            <p class="text-[#333333]">Total harga tiket</p>
                            <p class="text-[#333333]">Rp {{ number_format($subtotal) }}</p>
                        </div>
                        <div class="mt-2 flex justify-between">
                            <p class="text-[#333333]">biaya layanan</p>
                            <p class="text-[#333333]">Rp {{ number_format($service_fee) }}</p>
                        </div>
                        <hr class="mt-12 border-[#FFFEFE] mb-3">
                        <div class="flex justify-between">
                            <p class="font-medium">Total bayar</p>
                            <p class="font-semibold">Rp {{ number_format($grand_total) }}</p>
                        </div>
                        <hr class="my-3 border-[#FFFEFE]">
                        <form action="{{ $payment_url }}" method="post" class="hidden md:block">
                            @csrf
                            <button type="submit" class="w-full py-2 rounded-md bg-black text-white mt-10">Checkout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- botton navbar --}}
    <div class="fixed md:hidden z-50 w-full h-20 max-w-lg -translate-x-1/2 bg-slate-950 border border-yellow-400 rounded-full bottom-4 left-1/2 dark:bg-gray-700 dark:border-gray-600">
        <div class="flex justify-between h-full max-w-lg grid-cols-5 mx-8 items-center text-white">
            <div>
                <p class="text-sm font-light text-gray-300">Total</p>
                <p class="text-xl font-bold">Rp {{ number_format($grand_total) }}</p>
            </div>
            <form action="{{ $payment_url }}" method="post">
                @csrf
                <button type="submit" class="px-4 py-2 bg-[#FFC436] hover:bg-[#ffcb51e8] hover:duration-300 rounded-lg">Checkout</button>
            </form>
        </div>
    </div>
    <div class="mt-48 bg-gradient-to-b from-[#FFE29B] w-full rounded-sm md:h-56 md:mb-48 mb-40 max-w-screen-xl mx-auto">
        <div class="flex flex-col justify-center items-center">
            <div class="text-2xl mt-10 md:text-5xl md:font-medium md:mt-16 text-[#4B4B4B]">Jual Tiket Event Kalian Disini</div>
            <div class="text-base font-extralight md:text-lg text-[#929292] md:mt-4">Chat admin kami</div>
            <div class="md:mt-14 mt-10">
                <a href="" class="md:text-xl font-extralight px-8 py-4 rounded-full bg-black text-white">Hubungi Kami</a>
            </div>
        </div>
    </div>
    @include('dashboard.footer')
@endsection
