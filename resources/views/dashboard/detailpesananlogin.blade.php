@extends('dashboard.layout')

@section('content')
<div class="relative max-w-screen-xl mx-auto mb-28 px-4">
    <div class="flex items-center gap-2 mb-6">
        <a href="/homelogin" class="text-xs font-extralight text-[#003E29] cursor-pointer">Home</a>
        <div>
            <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6 11.25L10 7.5L6 3.75" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                
        </div>
        <p class="text-xs font-extralight text-[#A4A4A4]">Nama Event</p>
    </div>
    <div class="md:flex md:space-x-16">
        <div class="md:w-8/12">
            <div class="w-full h-80 bg-gray-500 rounded-md" id="Gambar">

            </div>
            <div id="title-event" class="md:mt-10 mt-8">
                <div class="md:text-3xl text-2xl font-semibold text-[#2B2B2B]">
                    Nama Event
                </div>
                <div class="mt-3 flex gap-4">
                    <div class="flex items-center gap-1">
                        <svg width="14" height="14" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.5 2H2.5C1.94772 2 1.5 2.44772 1.5 3V10C1.5 10.5523 1.94772 11 2.5 11H9.5C10.0523 11 10.5 10.5523 10.5 10V3C10.5 2.44772 10.0523 2 9.5 2Z" stroke="#E4BBA1" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M8 1V3" stroke="#E4BBA1" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M4 1V3" stroke="#E4BBA1" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M1.5 5H10.5" stroke="#E4BBA1" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <p class="md:text-sm text-xs text-[#B0B0B0]">Selasa, 31 Januari 2023</p>
                    </div>
                    <div class="flex items-center gap-1">
                        <svg width="14" height="14" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_35_1422)">
                            <path d="M9.91675 5.38892C9.91675 8.69447 5.66675 11.5278 5.66675 11.5278C5.66675 11.5278 1.41675 8.69447 1.41675 5.38892C1.41675 4.26175 1.86451 3.18074 2.66154 2.38371C3.45857 1.58668 4.53958 1.13892 5.66675 1.13892C6.79392 1.13892 7.87492 1.58668 8.67195 2.38371C9.46898 3.18074 9.91675 4.26175 9.91675 5.38892Z" stroke="#E4BBA1" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M5.66667 6.80556C6.44907 6.80556 7.08333 6.1713 7.08333 5.3889C7.08333 4.60649 6.44907 3.97223 5.66667 3.97223C4.88426 3.97223 4.25 4.60649 4.25 5.3889C4.25 6.1713 4.88426 6.80556 5.66667 6.80556Z" stroke="#E4BBA1" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                            <defs>
                            <clipPath id="clip0_35_1422">
                            <rect width="11.3333" height="12" fill="white"/>
                            </clipPath>
                            </defs>
                        </svg>
                        <p class="md:text-sm text-xs text-[#B0B0B0]">Stadion GBK, Jakarta Selatan</p>
                    </div>
                </div>
            </div>
            <hr class="md:border-2 rounded border-gray-100 my-6">
            <div id="detail-event" class="pb-6">
                <p class="md:text-xl text-lg font-semibold text-[#353535]">
                    Tentang Event Ini
                </p>
                <p class="text-justify text-[#6C6C6C] font-extralight mt-4 md:text-base text-sm">Lorem ipsum dolor sit amet consectetur. Eget lobortis feugiat at est consectetur sit arcu. Semper sit gravida sagittis interdum vestibulum magna. Purus volutpat quis ut sed ipsum porta eget sed morbi. Massa pretium nisi libero luctus consectetur tortor non nunc. Est sit et erat egestas vulputate est nibh tincidunt. Tortor orci id quis sit in porttitor at interdum etiam. Id pretium bibendum at tellus non eu eget. Faucibus in elementum sapien sed tortor ultricies in.
                    <br>
                    <br>
                    Enim amet elementum amet posuere est etiam quisque tellus faucibus. Posuere volutpat dapibus pharetra massa. Amet morbi rutrum est pharetra non sed sit donec integer. Egestas ipsum amet donec quam. Habitasse hac laoreet magna aliquam et mi non nam. Vitae nam ornare mi auctor. Sit tempor dolor tellus lacus. Dignissim est mollis maecenas nec ac ipsum lectus. Enim pulvinar sed pulvinar quisque facilisis. Pellentesque consectetur turpis morbi leo turpis dictum consectetur vulputate.
                </p>
            </div>
            <hr class="md:my-6 my-4 border-gray-100">
            <div id="line-up" class="pb-6">
                <p class="md:text-xl text-lg font-semibold text-[#353535]">
                    Line Up
                </p>
                <ul class="md:text-base text-sm ms-4 text-[#6C6C6C] font-normal mt-4">
                    <li type="circle" class="mb-1">Dewa19</li>
                    <li type="circle" class="mb-1">Virgoun</li>
                    <li type="circle" class="mb-1">BlackPink</li>
                </ul>
            </div>
            <hr class="md:my-6 my-4 border-gray-100">
            <div id="about-ticket" class="pb-6">
                <p class="md:text-xl text-lg font-semibold text-[#353535]">
                    Tentang Tiket
                </p>
                <ul class="text-[#6c6c6c] md:text-base text-sm ms-4 mt-4">
                    <li type="1" class="mb-1">Lorem ipsum dolor sit amet consectetur.</li>
                    <li type="1" class="mb-1">Eget lobortis feugiat at est consectetur sit arcu. </li>
                    <li type="1" class="mb-1">Semper sit gravida sagittis interdum vestibulum magna.</li>
                    <li type="1" class="mb-1">Purus volutpat quis ut sed ipsum porta eget sed morbi.</li>
                    <li type="1" class="mb-1">Massa pretium nisi libero luctus consectetur tortor non nunc.</li>
                    <li type="1" class="mb-1">Est sit et erat egestas vulputate est nibh tincidunt.</li>
                </ul>
            </div>
            <hr class="md:my-6 my-4 border-gray-100">
            <div id="about-ticket" class="pb-6">
                <p class="md:text-xl text-lg font-semibold text-[#353535]">
                    Petunjuk Penukaran Tiket
                </p>
                <ul class="text-[#6c6c6c] md:text-base text-sm ms-4 mt-4">
                    <li type="1" class="mb-1">Lorem ipsum dolor sit amet consectetur.</li>
                    <li type="1" class="mb-1">Eget lobortis feugiat at est consectetur sit arcu. </li>
                    <li type="1" class="mb-1">Semper sit gravida sagittis interdum vestibulum magna.</li>
                    <li type="1" class="mb-1">Purus volutpat quis ut sed ipsum porta eget sed morbi.</li>
                </ul>
            </div>
        </div>
        <div class="md:w-4/12 mt-8 md:mt-0">
            <div class="w-full md:bg-[#E7E7E7] bg-[#003E29] rounded-lg overflow-hidden sticky top-8">
                <h1 class="text-center py-3 md:bg-black text-white text-xl font-medium hidden md:block">Pilihan Tiket</h1>
                <div class="my-6">
                    <div class="flex justify-between border border-[#E3E3E3] bg-white rounded-md mx-4 my-2 px-4 py-2">
                        <div>
                            <p class="text-base font-light text-[#393939]">VIP</p>
                            <p class="text-base font-semibold">Rp 150,000</p>
                        </div>
                        <div class="flex flex-col justify-center">
                            <div class="flex gap-3 items-center">
                                <svg width="24" height="24" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="cursor-pointer">
                                    <g clip-path="url(#clip0_35_1530)">
                                    <path d="M7.99992 14.6667C11.6818 14.6667 14.6666 11.6819 14.6666 8.00004C14.6666 4.31814 11.6818 1.33337 7.99992 1.33337C4.31802 1.33337 1.33325 4.31814 1.33325 8.00004C1.33325 11.6819 4.31802 14.6667 7.99992 14.6667Z" fill="#FFC436" stroke="#FFC436" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M8 5.33337V10.6667" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M5.33325 8H10.6666" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_35_1530">
                                    <rect width="24" height="24" fill="white"/>
                                    </clipPath>
                                    </defs>
                                </svg>
                                <p class="text-lg font-semibold">1</p>
                                <svg width="24" height="24" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="cursor-pointer">
                                    <g clip-path="url(#clip0_35_1534)">
                                    <path d="M7.99992 14.6667C11.6818 14.6667 14.6666 11.6819 14.6666 8.00004C14.6666 4.31814 11.6818 1.33337 7.99992 1.33337C4.31802 1.33337 1.33325 4.31814 1.33325 8.00004C1.33325 11.6819 4.31802 14.6667 7.99992 14.6667Z" fill="#FFC436" stroke="#FFC436" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M5.33325 8H10.6666" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_35_1534">
                                    <rect width="24" height="24" fill="white"/>
                                    </clipPath>
                                    </defs>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-between border border-[#E3E3E3] bg-white rounded-md mx-4 my-2 px-4 py-2">
                        <div>
                            <p class="text-base font-light text-[#393939]">Festival</p>
                            <p class="text-base font-semibold">Rp 150,000</p>
                        </div>
                        <div class="flex flex-col justify-center">
                            <div class="flex gap-3 items-center">
                                <svg width="24" height="24" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="cursor-pointer">
                                    <g clip-path="url(#clip0_35_1530)">
                                    <path d="M7.99992 14.6667C11.6818 14.6667 14.6666 11.6819 14.6666 8.00004C14.6666 4.31814 11.6818 1.33337 7.99992 1.33337C4.31802 1.33337 1.33325 4.31814 1.33325 8.00004C1.33325 11.6819 4.31802 14.6667 7.99992 14.6667Z" fill="#FFC436" stroke="#FFC436" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M8 5.33337V10.6667" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M5.33325 8H10.6666" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_35_1530">
                                    <rect width="24" height="24" fill="white"/>
                                    </clipPath>
                                    </defs>
                                </svg>
                                <p class="text-lg font-semibold">1</p>
                                <svg width="24" height="24" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="cursor-pointer">
                                    <g clip-path="url(#clip0_35_1534)">
                                    <path d="M7.99992 14.6667C11.6818 14.6667 14.6666 11.6819 14.6666 8.00004C14.6666 4.31814 11.6818 1.33337 7.99992 1.33337C4.31802 1.33337 1.33325 4.31814 1.33325 8.00004C1.33325 11.6819 4.31802 14.6667 7.99992 14.6667Z" fill="#FFC436" stroke="#FFC436" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M5.33325 8H10.6666" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_35_1534">
                                    <rect width="24" height="24" fill="white"/>
                                    </clipPath>
                                    </defs>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-between border border-[#E3E3E3] bg-white rounded-md mx-4 my-2 px-4 py-2">
                        <div>
                            <p class="text-base font-light text-[#393939]">Presale 1</p>
                            <p class="text-base font-semibold">Rp 100,000</p>
                        </div>
                        <div class="flex flex-col justify-center">
                            <div class="flex gap-3 items-center">
                                <svg width="24" height="24" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="cursor-pointer">
                                    <g clip-path="url(#clip0_35_1530)">
                                    <path d="M7.99992 14.6667C11.6818 14.6667 14.6666 11.6819 14.6666 8.00004C14.6666 4.31814 11.6818 1.33337 7.99992 1.33337C4.31802 1.33337 1.33325 4.31814 1.33325 8.00004C1.33325 11.6819 4.31802 14.6667 7.99992 14.6667Z" fill="#FFC436" stroke="#FFC436" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M8 5.33337V10.6667" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M5.33325 8H10.6666" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_35_1530">
                                    <rect width="24" height="24" fill="white"/>
                                    </clipPath>
                                    </defs>
                                </svg>
                                <p class="text-lg font-semibold">1</p>
                                <svg width="24" height="24" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="cursor-pointer">
                                    <g clip-path="url(#clip0_35_1534)">
                                    <path d="M7.99992 14.6667C11.6818 14.6667 14.6666 11.6819 14.6666 8.00004C14.6666 4.31814 11.6818 1.33337 7.99992 1.33337C4.31802 1.33337 1.33325 4.31814 1.33325 8.00004C1.33325 11.6819 4.31802 14.6667 7.99992 14.6667Z" fill="#FFC436" stroke="#FFC436" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M5.33325 8H10.6666" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_35_1534">
                                    <rect width="24" height="24" fill="white"/>
                                    </clipPath>
                                    </defs>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-between border border-[#E3E3E3] bg-white rounded-md mx-4 my-2 px-4 py-2">
                        <div>
                            <p class="text-base font-light text-[#393939]">Presale 2</p>
                            <p class="text-base font-semibold">Rp 100,000</p>
                        </div>
                        <div class="flex flex-col justify-center">
                            <div class="flex gap-3 items-center">
                                <svg width="24" height="24" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="cursor-pointer">
                                    <g clip-path="url(#clip0_35_1530)">
                                    <path d="M7.99992 14.6667C11.6818 14.6667 14.6666 11.6819 14.6666 8.00004C14.6666 4.31814 11.6818 1.33337 7.99992 1.33337C4.31802 1.33337 1.33325 4.31814 1.33325 8.00004C1.33325 11.6819 4.31802 14.6667 7.99992 14.6667Z" fill="#FFC436" stroke="#FFC436" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M8 5.33337V10.6667" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M5.33325 8H10.6666" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_35_1530">
                                    <rect width="24" height="24" fill="white"/>
                                    </clipPath>
                                    </defs>
                                </svg>
                                <p class="text-lg font-semibold">1</p>
                                <svg width="24" height="24" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="cursor-pointer">
                                    <g clip-path="url(#clip0_35_1534)">
                                    <path d="M7.99992 14.6667C11.6818 14.6667 14.6666 11.6819 14.6666 8.00004C14.6666 4.31814 11.6818 1.33337 7.99992 1.33337C4.31802 1.33337 1.33325 4.31814 1.33325 8.00004C1.33325 11.6819 4.31802 14.6667 7.99992 14.6667Z" fill="#FFC436" stroke="#FFC436" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M5.33325 8H10.6666" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_35_1534">
                                    <rect width="24" height="24" fill="white"/>
                                    </clipPath>
                                    </defs>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="justify-between items-center bg-black px-4 py-4 hidden md:flex">
                    <div>
                        <p class="text-[#BBBBBB]">Subtotal</p>
                        <p class="text-white text-xl font-semibold">Rp 180,000</p>
                    </div>
                    <a href="/detail-pesanan">
                        <button class="px-4 py-2 bg-[#FFC436] hover:bg-[#ffcb51e8] hover:duration-300 rounded-md text-white">Checkout</button>
                    </a>
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
            <p class="text-xl font-bold">Rp 150,000</p>
        </div>
        <a href="/detail-pesanan">
            <button class="px-4 py-2 bg-[#FFC436] hover:bg-[#ffcb51e8] hover:duration-300 rounded-lg">Checkout</button>
        </a>
    </div>
</div>

<div class="bg-gradient-to-b from-[#FFE29B] w-full rounded-sm md:h-56 md:mb-48 mb-40 max-w-screen-xl mx-auto">
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

