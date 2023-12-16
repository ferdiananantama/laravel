@extends('dashboard.layout')

@section('content')
    <div class="max-w-screen-sm h-[1200px] mx-auto md:px-4 px-8">
        <div class="text-center space-y-1 mb-12 md:mb-16">
            <p class="md:text-lg text--base font-semibold">Selesaikan Pembayaran Dalam</p>
            <p class="md:text-lg text--base font-bold text-[#F30000]">23:59:59</p>
            <p class="md:text-sm text-xs font-light text-[#919191]">Batas akhir pembayaran</p>
            <p class="md:text-lg text--base font-semibold">Kamis, 6 Juni 2023 10:23</p>
        </div>
        <div class="border-2 rounded-lg">
            <div class="flex items-center justify-between py-2 px-4">
                <p class="md:text-base text-sm font-semibold">BCA Virtual Account</p>
                <img src={{ asset('assets/img/bca.png') }} width="60" alt="">
            </div>
            <hr >
            <div class="px-4 py-5 space-y-5"> 
                <div class="space-y-1">
                    <p class="md:text-sm text-xs font-light text-[#545454]">Kode Pesanan</p>
                    <p class="font-bold md:text-base text-sm">XYA3486OIO</p>
                </div>
                <div class="flex items-end justify-between">
                    <div class="space-y-1">
                        <p class="md:text-sm text-xs font-light text-[#545454]">
                            Nomor Virtual Account
                        </p>
                        <p class="font-bold md:text-base text-sm">
                            8011097013308313114144
                        </p>
                    </div>
                    <div class="flex space-x-2 items-center cursor-pointer">
                        <p class="font-bold md:text-base text-sm text-[#1450A3]">Salin</p>
                        <svg width="14" height="16" viewBox="0 0 11 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.10526 0H1.15789C0.518158 0 0 0.528864 0 1.18182V9.45455H1.15789V1.18182H8.10526V0ZM9.8421 2.36364H3.47368C2.83395 2.36364 2.31579 2.8925 2.31579 3.54545V11.8182C2.31579 12.4711 2.83395 13 3.47368 13H9.8421C10.4818 13 11 12.4711 11 11.8182V3.54545C11 2.8925 10.4818 2.36364 9.8421 2.36364ZM9.8421 11.8182H3.47368V3.54545H9.8421V11.8182Z" fill="#1450A3"/>
                        </svg>    
                    </div>
                </div>
                <div class="space-y-1">
                    <p class="md:text-sm text-xs font-light text-[#545454]">
                        Total Pembayaran
                    </p>
                    <p class="font-bold md:text-base text-sm">
                        Rp 201,000
                    </p>
                </div>
            </div>
        </div>
        <div class="flex md:gap-4 md:my-4 gap-2 my-3">
            <a href="/transaksi" class="w-1/2 text-sm md:text-base py-2 border-2 justify-center flex items-center hover:bg-[#014B32] hover:text-white transition-all duration-500 border-[#014B32] rounded-lg text-[#014B32] font-semibold">
                <button>Cek Status Pembayaran</button>
            </a>
            <a href="" class="w-1/2 text-sm md:text-base py-2 bg-[#F30000] hover:bg-[#DC0000] duration-200 rounded-lg text-white font-semibold justify-center flex items-center">
                <button>Batalkan Transaksi</button>
            </a>
        </div>
        <div class="md:mt-24 mt-20">
            <div class="font-bold md:text-lg text-base">Cara Pembayaran</div>
            <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
                <h2 id="accordion-flush-heading-1">
                <button type="button" class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 gap-3" data-accordion-target="#accordion-flush-body-1" aria-expanded="true" aria-controls="accordion-flush-body-1">
                    <span class="font-bold md:text-base text-sm">ATM BCA</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                    </svg>
                </button>
                </h2>
                <div id="accordion-flush-body-1" class="hidden" aria-labelledby="accordion-flush-heading-1">
                    <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                        <ol class="ms-4 mb-2 md:text-sm text-xs space-y-1 text-gray-500 dark:text-gray-400">
                            <li type="1">Pastikan Anda memiliki rekening di Bank BCA dan sudah terdaftar sebagai pengguna layanan BCA Virtual Account.</li>
                            <li type="1">Masukkan kartu ATM BCA kamu ke mesin ATM.</li>
                            <li type="1">Masukkan PIN ATM BCA kamu</li>
                            <li type="1">Pilih menu Transaksi Lainnya</li>
                            <li type="1">Pilih Transfer</li>
                            <li type="1">Pilih BCA Virtual Account.</li>
                            <li type="1">Masukkan nomor Virtual Account pembayaran (8011097013308313114144).</li>
                            <li type="1">Masukkan nominal saldo yang ingin kamu isi di transfer.</li>
                            <li type="1">Jika sudah benar, klik tombol benar untuk mengirimkan dana
                            </li>
                        </ol>
                        <p class="md:text-sm text-xs mb-2 text-gray-500 text-justify">
                            Penting untuk diingat bahwa langkah-langkah ini mungkin dapat berbeda sedikit tergantung pada antarmuka atau versi aplikasi BCA Mobile atau internet banking BCA yang Anda gunakan. Jika Anda mengalami kesulitan, disarankan untuk menghubungi layanan pelanggan Bank BCA untuk mendapatkan bantuan lebih lanjut.
                        </p>
                    </div>
                </div>
                <h2 id="accordion-flush-heading-2">
                <button type="button" class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 gap-3" data-accordion-target="#accordion-flush-body-2" aria-expanded="false" aria-controls="accordion-flush-body-2">
                    <span class="font-bold md:text-base text-sm">M-BANKING BCA</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                    </svg>
                </button>
                </h2>
                <div id="accordion-flush-body-2" class="hidden" aria-labelledby="accordion-flush-heading-2">
                <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                    <p class="mb-2 text-gray-500 dark:text-gray-400">Flowbite is first conceptualized and designed using the Figma software so everything you see in the library has a design equivalent in our Figma file.</p>
                    <p class="text-gray-500 dark:text-gray-400">Check out the <a href="https://flowbite.com/figma/" class="text-blue-600 dark:text-blue-500 hover:underline">Figma design system</a> based on the utility classes from Tailwind CSS and components from Flowbite.</p>
                </div>
            </div>
        </div> 
        
    </div>
@endsection