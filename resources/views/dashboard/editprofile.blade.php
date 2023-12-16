@extends('dashboard.layout')

@section('content')
    <div class="max-w-screen-xl mx-auto p-4">
        <h1 class="md:text-2xl font-semibold text-[#353535] md:mb-6 mb-4 text-xl">Edit Profile</h1>
        <hr class="border-[#DFDFDF] mb-12">
        <div class="mt-6 max-w-screen-md mx-auto px-12 md:px-0">
            <form class="text-sm" action="{{ route('user-profile-information.update') }}" method="post">
                @csrf
                @method('put')
                <div class="relative z-0 w-full mb-6 group">
                    <input type="email" name="email" id="email" value="{{ old('email', request()->user()->email) }}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Alamat Email</label>
                    @error('email')
                        <span>{{ $errors->first('email') }}</span>
                    @enderror
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <input type="text" name="name" id="name" value="{{ old('name', request()->user()->name) }}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama lengkap</label>
                    @error('name')
                        <span>{{ $errors->first('name') }}</span>
                    @enderror
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <input type="number" name="phone_number" id="phone_number" value="{{ old('phone_number', request()->user()->phone_number) }}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="phone_number" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">No telp</label>
                    @error('phone_number')
                        <span>{{ $errors->first('phone_number') }}</span>
                    @enderror
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <input type="date" name="birthday" id="birthday" value="{{ old('birthday', request()->user()->birthday) }}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="birthday" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Tanggal lahir</label>
                    @error('birthday')
                        <span>{{ $errors->first('birthday') }}</span>
                    @enderror
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <p>Jenis Kelamin</p>
                    <div class="flex space-x-4 mt-2">
                        <div class="flex items-center mb-4">
                            <input id="gender-male" type="radio" name="gender" value="male" @checked(old('gender', request()->user()->gender) == 'male') class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                            <label for="gender-male" class="block ms-2  text-sm font-medium text-gray-900 dark:text-gray-300">
                                Laki-laki
                            </label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="gender-female" type="radio" name="gender" value="female" @checked(old('gender', request()->user()->gender) == 'female') class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                            <label for="gender-female" class="block ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                Perempuan
                            </label>
                        </div>
                    </div>
                    @error('gender')
                        <span>{{ $errors->first('gender') }}</span>
                    @enderror
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="mt-6 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-6 py-3 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
