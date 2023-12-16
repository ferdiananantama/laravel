@extends('login.layout')

@section('content')
<div class="flex justify-center items-center mt-32">
    <div class="w-full max-w-md p-4 bg-[#EEEEEE] border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
        <form class="space-y-6" action="/register" method="post">
            @csrf
            <h5 class="text-2xl text-center font-semibold text-[003E29] dark:text-white">Register</h5>
            <hr class="border-white">
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-[#262626] dark:text-white">Nama Lengkap</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Masukkan nama" required>
                @error('name')
                    <span>{{ $errors->first('name') }}</span>
                @enderror
            </div>
            <div>
                <label for="birthday" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir</label>
                <input type="date" name="birthday" id="birthday" placeholder="Masukkan tanggal lahir" value="{{ old('birthday') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                @error('birthday')
                    <span>{{ $errors->first('birthday') }}</span>
                @enderror
            </div>
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-[#262626] dark:text-white">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Masukkan email" required>
                @error('email')
                    <span>{{ $errors->first('email') }}</span>
                @enderror
            </div>
            <div class="pb-4">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                <input type="password" name="password" id="password" placeholder="Masukkan password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                @error('password')
                    <span>{{ $errors->first('password') }}</span>
                @enderror
            </div>
            <button type="submit" class="w-full text-white bg-gray-950 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</button>
            <div class="text-sm font-medium text-gray-500 dark:text-gray-300 text-center">
                Sudah punya akun? <a href="/login" class="text-blue-700 hover:underline dark:text-blue-500">Login</a>
            </div>
        </form>
    </div>
</div>
@endsection
