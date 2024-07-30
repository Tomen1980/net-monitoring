@extends('layouts.app')
@section('content')
<div class="flex items-center justify-center h-screen bg-gray-100">
    <div class="w-full max-w-md p-8 space-y-8 bg-white rounded-lg shadow-lg">
        <div class='font-Fredoka'>
            <h2 class="text-2xl font-medium text-center text-black ">Selamat Datang</h2>
            <p class="text-sm text-center text-gray-600 ">Silakan Login ke Akun Anda</p>
        </div>
        @if(session()->has('error'))
            <div class="text-sm text-red-600">{{ session('error') }}</div>
        @endif
        @if (session()->has('message'))
        <div class="text-sm text-red-600">{{ session('message') }}</div>
        @endif
        <form class="mt-8 space-y-6" action="/login" method="POST">
            @csrf
            @method('POST')
            <div class="rounded-md shadow-sm bg-[#686868]">
                <div class='font-Fredoka text-[#686868]'>
                    
                    <label for="email" class="sr-only ">Email address</label>
                    <input id="email" name="email" type="email" autocomplete="email" required
                        class="relative block w-full px-3 py-2 border border-gray-300 rounded-t-md placeholder-gray-500 focus:outline-none   focus:z-10 sm:text-sm"
                        placeholder="Email address">
                </div>
                <div class='font-Fredoka'>
                    <label for="password" class="sr-only ">Password</label>
                    <input id="password" name="password" type="password" autocomplete="current-password" required
                        class="relative block w-full px-3 py-2 border border-gray-300 rounded-b-md placeholder-gray-500 focus:outline-none   focus:z-10 sm:text-sm"
                        placeholder="Password">
                </div>
            </div>
            <div class="flex items-center justify-between font-Fredoka">
                <div class="flex items-center">
                    <input id="remember_me" name="remember_me" type="checkbox"
                        class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                    <label for="remember_me" class="block ml-2 text-sm text-gray-900">Remember me</label>
                </div>
                <div class="text-sm">
                    <a href="#" class="font-medium text-[#953030] ">Forgot your password?</a>
                </div>
            </div>
            <div class="font-Fredoka ">
                <button type="submit"
                    class=" relative flex justify-center w-[60%] px-4 py-2 text-sm font-medium text-white bg-[#953030]  border border-transparent rounded-md group mx-16 ">
                    Login
                </button>
            </div>
        </form>
    </div>
</div>
@endsection