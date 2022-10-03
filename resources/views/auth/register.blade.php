@extends('layouts.app')
@section('title')
    Register an DevStagram
@endsection
@section('content')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{ asset('img/register.jpg') }}" alt="User registration image">
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{ route('register') }}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">Your Name</label>
                    <input id="name" name="name" type="text" placeholder="Your Name"
                           class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                           value="{{ old('name') }}"/>
                    @error('name')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">username</label>
                    <input id="username" name="username" type="text" placeholder="Your user name"
                           class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror"
                           value="{{ old('username') }}"/>
                    @error('username')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">email</label>
                    <input id="email" name="email" type="email" placeholder="Your registration email"
                           class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror"
                           value="{{ old('email') }}"/>
                    @error('email')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">password</label>
                    <input id="password" name="password" type="password" placeholder="Your registration password"
                           class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror"/>
                    @error('password')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">Repeat
                        password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password"
                           placeholder="Repeat password"
                           class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror"/>
                    @error('password_confirmation')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <input type="submit" value="create Account"
                       class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg "/>
            </form>
        </div>
    </div>
@endsection
