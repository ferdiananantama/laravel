@extends('dashboard.layout')

@section('content')
    <div class="max-w-screen-xl mx-auto p-4">
        <h1 class="md:text-2xl text-xl font-semibold text-[#353535] md:mb-6 mb-4">Ganti Password</h1>
        <hr class="border border-[#DFDFDF] mb-12">
        <div class="mt-6 max-w-screen-md mx-auto px-12 md:px-0">
            <form class="text-sm" action="{{ route('user-password.update') }}" method="post">
                @csrf
                @method('put')
                <div class="relative z-0 w-full mb-6 group">
                    <input type="password" name="current_password" id="current_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="current_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password lama</label>
                    @if($errors->updatePassword->has('current_password'))
                        <span>{{ $errors->updatePassword->first('current_password') }}</span>
                    @endif
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <input type="password" name="password" id="password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password baru</label>
                    @if($errors->updatePassword->has('password'))
                        <span>{{ $errors->updatePassword->first('password') }}</span>
                    @endif
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="mt-16 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-6 py-3 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
