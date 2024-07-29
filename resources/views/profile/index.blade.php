@extends('layouts.app')
@section('content')
    @include('layouts.navbar')


    <div class="bg-gray-100 min-h-screen flex items-center justify-center">
        <div class="w-full max-w-md p-8 space-y-8 bg-white rounded-lg shadow-lg">
            <div>
                <h2 class="text-2xl font-bold text-center text-gray-900">Update Your Profile</h2>
                <p class="text-sm text-center text-gray-600">Please update your details below</p>
            </div>
            @if (session()->has('error'))
                <div class="text-sm text-red-600 ">{{ session('error') }}</div>
            @endif
            @if (session()->has('success'))
                <div class="text-sm text-green-600 ">{{ session('success') }}</div>
            @endif
            <form class="mt-8 space-y-6" action="/update-profile" method="POST">
                @csrf
                @method('PUT')
                <div class="rounded-md shadow-sm">
                    <div>
                        @error('email')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                        <label for="email" class="sr-only">Email address</label>
                        <input id="email" name="email" type="email" autocomplete="email"
                            value="{{ old('email', Auth::user()->email) }}"
                            class="relative block w-full px-3 py-2 border border-gray-300 rounded-t-md placeholder-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Email address">
                    </div>

                    <div>
                        @error('name')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                        <label for="name" class="sr-only">Name</label>
                        <input id="name" name="name" type="text" autocomplete="name"
                            value="{{ old('name', Auth::user()->name) }}"
                            class="relative block w-full px-3 py-2 border border-gray-300 rounded-t-md placeholder-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="name address">
                    </div>
                    <div>
                        @error('old_password')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                        <label for="old-password" class="sr-only">Old Password</label>
                        <input id="old-password" name="old_password" type="password" autocomplete="current-password"
                            class="relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Old Password">
                    </div>
                    <div>
                        @error('new_password')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                        <label for="new-password" class="sr-only">New Password</label>
                        <input id="new-password" name="new_password" type="password" autocomplete="new-password"
                            class="relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="New Password">
                    </div>
                    <div>
                        @error('new_password_confirmation')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                        <label for="new-password-confirm" class="sr-only">Confirm New Password</label>
                        <input id="new-password-confirm" name="new_password_confirmation" type="password"
                            class="relative block w-full px-3 py-2 border border-gray-300 rounded-b-md placeholder-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Confirm New Password">
                    </div>
                </div>
                <div>
                    <button type="submit"
                        class="relative flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md group hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Update Profile
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
